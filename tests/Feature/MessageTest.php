<?php

namespace Tests\Feature;

use App\Models\Message;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class MessageTest extends TestCase
{
    use RefreshDatabase;

    public function test_message_routes_require_authentication(): void
    {
        $message = Message::factory()->create();

        $this->getJson('/api/messages')->assertUnauthorized();
        $this->postJson('/api/messages', [])->assertUnauthorized();
        $this->getJson("/api/messages/{$message->id}")->assertUnauthorized();
        $this->patchJson("/api/messages/{$message->id}", [])->assertUnauthorized();
        $this->deleteJson("/api/messages/{$message->id}")->assertUnauthorized();
        $this->postJson("/api/messages/{$message->id}/cancel")->assertUnauthorized();
    }

    public function test_user_can_list_only_their_messages(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $message = Message::factory()->create(['user_id' => $user->id]);
        Message::factory()->create(['user_id' => $otherUser->id]);

        Sanctum::actingAs($user);

        $response = $this->getJson('/api/messages');

        $response->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('data.0.id', $message->id);
    }

    public function test_user_can_create_a_message(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $response = $this->postJson('/api/messages', [
            'title' => 'Found dog',
            'content' => 'A dog was found near the park.',
        ]);

        $response->assertCreated()
            ->assertJsonPath('data.title', 'Found dog')
            ->assertJsonPath('data.content', 'A dog was found near the park.')
            ->assertJsonPath('data.user_id', $user->id);

        $this->assertDatabaseHas('messages', [
            'id' => $response->json('data.id'),
            'user_id' => $user->id,
            'title' => 'Found dog',
        ]);
    }

    public function test_message_creation_requires_title_and_content(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $response = $this->postJson('/api/messages', []);

        $response->assertUnprocessable()
            ->assertJsonValidationErrors(['title', 'content']);
        $this->assertDatabaseCount('messages', 0);
    }

    public function test_user_can_view_and_update_their_message(): void
    {
        $user = User::factory()->create();
        $message = Message::factory()->create(['user_id' => $user->id]);
        Sanctum::actingAs($user);

        $this->getJson("/api/messages/{$message->id}")
            ->assertOk()
            ->assertJsonPath('data.id', $message->id);

        $this->patchJson("/api/messages/{$message->id}", [
            'title' => 'Updated title',
        ])->assertOk()
            ->assertJsonPath('data.title', 'Updated title');

        $this->assertDatabaseHas('messages', [
            'id' => $message->id,
            'title' => 'Updated title',
        ]);
    }

    public function test_user_can_cancel_their_message(): void
    {
        $user = User::factory()->create();
        $message = Message::factory()->for($user)->create();
        Sanctum::actingAs($user);

        $response = $this->postJson("/api/messages/{$message->id}/cancel");

        $response->assertOk()
            ->assertJsonPath('data.id', $message->id)
            ->assertJsonPath('data.status', Message::STATUS_CANCELED);
        $this->assertDatabaseHas('messages', [
            'id' => $message->id,
            'status' => Message::STATUS_CANCELED,
        ]);
        $this->assertNotNull($response->json('data.canceled_at'));
        $this->assertNotNull($message->fresh()->canceled_at);
    }

    public function test_user_cannot_edit_cancelled_message(): void
    {
        $user = User::factory()->create();
        $message = Message::factory()->for($user)->create(['status' => Message::STATUS_CANCELED]);
        Sanctum::actingAs($user);

        $response = $this->patchJson("/api/messages/{$message->id}", [
            'title' => 'Should not change',
        ]);

        $response->assertForbidden();
        $this->assertDatabaseHas('messages', [
            'id' => $message->id,
            'title' => $message->title,
            'status' => Message::STATUS_CANCELED,
        ]);
    }

    public function test_user_can_delete_their_message(): void
    {
        $user = User::factory()->create();
        $message = Message::factory()->create(['user_id' => $user->id]);
        Sanctum::actingAs($user);

        $this->deleteJson("/api/messages/{$message->id}")
            ->assertOk()
            ->assertJson(['message' => 'Message deleted successfully']);

        $this->assertSoftDeleted($message);
    }
}
