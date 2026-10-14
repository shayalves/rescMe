<?php

namespace Tests\Feature;

use App\Jobs\SendMessageNotification;
use App\Models\Contact;
use App\Models\ContactEmail;
use App\Models\ContactPhone;
use App\Models\Message;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class ExpiredMessagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_expired_active_messages_are_queued_per_phone_and_email(): void
    {
        Queue::fake();
        $user = User::factory()->create();
        $contact = Contact::create(['user_id' => $user->id, 'name' => 'A']);
        ContactPhone::create(['contact_id' => $contact->id, 'international_code' => '55', 'phone_number' => '111', 'main' => true]);
        ContactEmail::create(['contact_id' => $contact->id, 'email' => 'a@b.com', 'main' => true]);

        $expired = Message::create(['user_id' => $user->id, 'title' => 't', 'content' => 'help', 'status' => 1, 'expires_at' => now()->subSecond()]);
        $future = Message::create(['user_id' => $user->id, 'title' => 't', 'content' => 'x', 'status' => 1, 'expires_at' => now()->addHour()]);
        $expired->contacts()->attach($contact);
        $future->contacts()->attach($contact);

        $this->artisan('messages:dispatch-expired')->assertSuccessful();
        $this->artisan('messages:dispatch-expired')->assertSuccessful();

        $this->assertSame(Message::STATUS_SENDING, $expired->fresh()->status);
        $this->assertSame(Message::STATUS_ACTIVE, $future->fresh()->status);
        Queue::assertPushed(SendMessageNotification::class, 2);
        Queue::assertPushed(fn (SendMessageNotification $job) => $job->payload === ['message' => 'help', 'channel' => 'sms', 'contact' => '111']);
        Queue::assertPushed(fn (SendMessageNotification $job) => $job->payload === ['message' => 'help', 'channel' => 'email', 'contact' => 'a@b.com']);
    }
}
