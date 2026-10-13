<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\ContactEmail;
use App\Models\ContactPhone;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    public function test_unauthenticated_user_cannot_access_contacts_endpoints(): void
    {
        $contact = Contact::factory()->create();

        $this->getJson('/api/contacts')->assertStatus(401);
        $this->postJson('/api/contacts', ['name' => 'John Doe'])->assertStatus(401);
        $this->getJson("/api/contacts/{$contact->id}")->assertStatus(401);
        $this->putJson("/api/contacts/{$contact->id}", ['name' => 'Updated'])->assertStatus(401);
        $this->deleteJson("/api/contacts/{$contact->id}")->assertStatus(401);
    }

    public function test_user_can_list_only_their_own_contacts(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();

        $userContact = Contact::factory()->create(['user_id' => $user->id, 'name' => 'My Contact']);
        ContactEmail::factory()->create(['contact_id' => $userContact->id, 'email' => 'user@example.com']);
        ContactPhone::factory()->create(['contact_id' => $userContact->id, 'phone_number' => '123456789']);

        $otherContact = Contact::factory()->create(['user_id' => $otherUser->id, 'name' => 'Other Contact']);

        Sanctum::actingAs($user);

        $response = $this->getJson('/api/contacts');

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('data.0.id', $userContact->id)
            ->assertJsonPath('data.0.name', 'My Contact')
            ->assertJsonPath('data.0.emails.0.email', 'user@example.com')
            ->assertJsonPath('data.0.phones.0.phone_number', '123456789');
    }

    public function test_user_can_list_contacts_with_pagination(): void
    {
        $user = User::factory()->create();
        Contact::factory()->count(15)->create(['user_id' => $user->id]);

        Sanctum::actingAs($user);

        $response = $this->getJson('/api/contacts?page=1&per_page=5');

        $response->assertStatus(200)
            ->assertJsonCount(5, 'data')
            ->assertJsonStructure([
                'data',
                'links',
                'meta' => ['current_page', 'per_page', 'total'],
            ]);
    }

    public function test_user_can_create_a_contact_without_emails_or_phones(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $response = $this->postJson('/api/contacts', [
            'name' => 'Alice Smith',
        ]);

        $response->assertStatus(201)
            ->assertJsonPath('data.name', 'Alice Smith')
            ->assertJsonPath('data.user_id', $user->id);

        $this->assertDatabaseHas('contacts', [
            'name' => 'Alice Smith',
            'user_id' => $user->id,
        ]);
    }

    public function test_user_can_create_a_contact_with_emails_and_phones(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $payload = [
            'name' => 'Bob Johnson',
            'emails' => [
                ['email' => 'bob@example.com', 'main' => true],
                ['email' => 'bob.work@example.com', 'main' => false],
            ],
            'phones' => [
                ['international_code' => '+1', 'phone_number' => '5551234567', 'main' => true],
            ],
        ];

        $response = $this->postJson('/api/contacts', $payload);

        $response->assertStatus(201)
            ->assertJsonPath('data.name', 'Bob Johnson')
            ->assertJsonCount(2, 'data.emails')
            ->assertJsonCount(1, 'data.phones')
            ->assertJsonPath('data.emails.0.email', 'bob@example.com')
            ->assertJsonPath('data.emails.0.main', true)
            ->assertJsonPath('data.phones.0.phone_number', '5551234567')
            ->assertJsonPath('data.phones.0.main', true);

        $contactId = $response->json('data.id');

        $this->assertDatabaseHas('contacts', [
            'id' => $contactId,
            'name' => 'Bob Johnson',
            'user_id' => $user->id,
        ]);

        $this->assertDatabaseHas('contact_emails', [
            'contact_id' => $contactId,
            'email' => 'bob@example.com',
            'main' => true,
        ]);

        $this->assertDatabaseHas('contact_phones', [
            'contact_id' => $contactId,
            'phone_number' => '5551234567',
            'international_code' => '+1',
            'main' => true,
        ]);
    }

    public function test_contact_creation_validates_required_fields(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $response = $this->postJson('/api/contacts', [
            'emails' => [
                ['email' => 'not-an-email'],
            ],
            'phones' => [
                ['phone_number' => '123'],
            ],
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['name', 'emails.0.email', 'phones.0.international_code']);
    }

    public function test_user_can_view_their_contact(): void
    {
        $user = User::factory()->create();
        $contact = Contact::factory()->create(['user_id' => $user->id, 'name' => 'Carol Danvers']);
        ContactEmail::factory()->create(['contact_id' => $contact->id, 'email' => 'carol@example.com']);
        ContactPhone::factory()->create(['contact_id' => $contact->id, 'phone_number' => '987654321']);

        Sanctum::actingAs($user);

        $response = $this->getJson("/api/contacts/{$contact->id}");

        $response->assertStatus(200)
            ->assertJsonPath('data.id', $contact->id)
            ->assertJsonPath('data.name', 'Carol Danvers')
            ->assertJsonCount(1, 'data.emails')
            ->assertJsonCount(1, 'data.phones');
    }

    public function test_user_cannot_view_another_users_contact(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $otherContact = Contact::factory()->create(['user_id' => $otherUser->id]);

        Sanctum::actingAs($user);

        $response = $this->getJson("/api/contacts/{$otherContact->id}");

        $response->assertStatus(403);
    }

    public function test_user_can_update_contact_name_without_altering_emails_or_phones(): void
    {
        $user = User::factory()->create();
        $contact = Contact::factory()->create(['user_id' => $user->id, 'name' => 'Old Name']);
        $email = ContactEmail::factory()->create(['contact_id' => $contact->id, 'email' => 'keep@example.com']);

        Sanctum::actingAs($user);

        $response = $this->putJson("/api/contacts/{$contact->id}", [
            'name' => 'New Name',
        ]);

        $response->assertStatus(200)
            ->assertJsonPath('data.name', 'New Name')
            ->assertJsonCount(1, 'data.emails')
            ->assertJsonPath('data.emails.0.email', 'keep@example.com');

        $this->assertDatabaseHas('contacts', [
            'id' => $contact->id,
            'name' => 'New Name',
        ]);
        $this->assertDatabaseHas('contact_emails', [
            'id' => $email->id,
            'deleted_at' => null,
        ]);
    }

    public function test_user_can_sync_emails_and_phones_during_contact_update(): void
    {
        $user = User::factory()->create();
        $contact = Contact::factory()->create(['user_id' => $user->id, 'name' => 'Dave']);
        $oldEmail = ContactEmail::factory()->create(['contact_id' => $contact->id, 'email' => 'old@example.com']);
        $emailToUpdate = ContactEmail::factory()->create(['contact_id' => $contact->id, 'email' => 'before@example.com']);

        Sanctum::actingAs($user);

        $payload = [
            'name' => 'Dave Updated',
            'emails' => [
                ['id' => $emailToUpdate->id, 'email' => 'after@example.com', 'main' => true],
                ['email' => 'brandnew@example.com', 'main' => false],
            ],
            'phones' => [
                ['international_code' => '+55', 'phone_number' => '11988887777', 'main' => true],
            ],
        ];

        $response = $this->putJson("/api/contacts/{$contact->id}", $payload);

        $response->assertStatus(200)
            ->assertJsonPath('data.name', 'Dave Updated')
            ->assertJsonCount(2, 'data.emails')
            ->assertJsonCount(1, 'data.phones');

        // Existing updated
        $this->assertDatabaseHas('contact_emails', [
            'id' => $emailToUpdate->id,
            'email' => 'after@example.com',
            'main' => true,
        ]);

        // New created
        $this->assertDatabaseHas('contact_emails', [
            'contact_id' => $contact->id,
            'email' => 'brandnew@example.com',
        ]);

        // Omitted email soft-deleted
        $this->assertSoftDeleted('contact_emails', [
            'id' => $oldEmail->id,
        ]);
    }

    public function test_user_cannot_update_another_users_contact(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $otherContact = Contact::factory()->create(['user_id' => $otherUser->id]);

        Sanctum::actingAs($user);

        $response = $this->putJson("/api/contacts/{$otherContact->id}", [
            'name' => 'Hacked Name',
        ]);

        $response->assertStatus(403);
    }

    public function test_user_can_delete_their_contact(): void
    {
        $user = User::factory()->create();
        $contact = Contact::factory()->create(['user_id' => $user->id]);
        $email = ContactEmail::factory()->create(['contact_id' => $contact->id]);
        $phone = ContactPhone::factory()->create(['contact_id' => $contact->id]);

        Sanctum::actingAs($user);

        $response = $this->deleteJson("/api/contacts/{$contact->id}");

        $response->assertStatus(200)
            ->assertJson(['message' => 'Contact deleted successfully']);

        $this->assertSoftDeleted('contacts', ['id' => $contact->id]);
        $this->assertSoftDeleted('contact_emails', ['id' => $email->id]);
        $this->assertSoftDeleted('contact_phones', ['id' => $phone->id]);
    }

    public function test_user_cannot_delete_another_users_contact(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $otherContact = Contact::factory()->create(['user_id' => $otherUser->id]);

        Sanctum::actingAs($user);

        $response = $this->deleteJson("/api/contacts/{$otherContact->id}");

        $response->assertStatus(403);
        $this->assertDatabaseHas('contacts', ['id' => $otherContact->id, 'deleted_at' => null]);
    }

    public function test_user_can_manage_nested_contact_emails(): void
    {
        $user = User::factory()->create();
        $contact = Contact::factory()->create(['user_id' => $user->id]);

        Sanctum::actingAs($user);

        // Store email
        $storeResponse = $this->postJson("/api/contacts/{$contact->id}/emails", [
            'email' => 'test@example.com',
            'main' => true,
        ]);

        $storeResponse->assertStatus(201)
            ->assertJsonPath('data.email', 'test@example.com')
            ->assertJsonPath('data.main', true);

        $emailId = $storeResponse->json('data.id');

        // Update email
        $updateResponse = $this->putJson("/api/contacts/{$contact->id}/emails/{$emailId}", [
            'email' => 'updated@example.com',
            'main' => false,
        ]);

        $updateResponse->assertStatus(200)
            ->assertJsonPath('data.email', 'updated@example.com')
            ->assertJsonPath('data.main', false);

        // Delete email
        $deleteResponse = $this->deleteJson("/api/contacts/{$contact->id}/emails/{$emailId}");

        $deleteResponse->assertStatus(200)
            ->assertJson(['message' => 'Contact email deleted successfully']);

        $this->assertSoftDeleted('contact_emails', ['id' => $emailId]);
    }

    public function test_user_can_manage_nested_contact_phones(): void
    {
        $user = User::factory()->create();
        $contact = Contact::factory()->create(['user_id' => $user->id]);

        Sanctum::actingAs($user);

        // Store phone
        $storeResponse = $this->postJson("/api/contacts/{$contact->id}/phones", [
            'international_code' => '+1',
            'phone_number' => '1234567890',
            'main' => true,
        ]);

        $storeResponse->assertStatus(201)
            ->assertJsonPath('data.phone_number', '1234567890')
            ->assertJsonPath('data.international_code', '+1')
            ->assertJsonPath('data.main', true);

        $phoneId = $storeResponse->json('data.id');

        // Update phone
        $updateResponse = $this->putJson("/api/contacts/{$contact->id}/phones/{$phoneId}", [
            'phone_number' => '9876543210',
            'main' => false,
        ]);

        $updateResponse->assertStatus(200)
            ->assertJsonPath('data.phone_number', '9876543210')
            ->assertJsonPath('data.main', false);

        // Delete phone
        $deleteResponse = $this->deleteJson("/api/contacts/{$contact->id}/phones/{$phoneId}");

        $deleteResponse->assertStatus(200)
            ->assertJson(['message' => 'Contact phone deleted successfully']);

        $this->assertSoftDeleted('contact_phones', ['id' => $phoneId]);
    }

    public function test_user_cannot_manage_nested_emails_or_phones_of_another_users_contact(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $otherContact = Contact::factory()->create(['user_id' => $otherUser->id]);
        $otherEmail = ContactEmail::factory()->create(['contact_id' => $otherContact->id]);
        $otherPhone = ContactPhone::factory()->create(['contact_id' => $otherContact->id]);

        Sanctum::actingAs($user);

        $this->postJson("/api/contacts/{$otherContact->id}/emails", [
            'email' => 'hack@example.com',
        ])->assertStatus(403);

        $this->putJson("/api/contacts/{$otherContact->id}/emails/{$otherEmail->id}", [
            'email' => 'hack@example.com',
        ])->assertStatus(403);

        $this->deleteJson("/api/contacts/{$otherContact->id}/emails/{$otherEmail->id}")
            ->assertStatus(403);

        $this->postJson("/api/contacts/{$otherContact->id}/phones", [
            'international_code' => '+1',
            'phone_number' => '0000000',
        ])->assertStatus(403);

        $this->putJson("/api/contacts/{$otherContact->id}/phones/{$otherPhone->id}", [
            'phone_number' => '0000000',
        ])->assertStatus(403);

        $this->deleteJson("/api/contacts/{$otherContact->id}/phones/{$otherPhone->id}")
            ->assertStatus(403);
    }
}
