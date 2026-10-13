<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactEmailRequest;
use App\Http\Requests\UpdateContactEmailRequest;
use App\Http\Resources\ContactEmailResource;
use App\Models\Contact;
use App\Models\ContactEmail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ContactEmailController extends Controller
{
    /**
     * Store a newly created email for the contact.
     */
    public function store(StoreContactEmailRequest $request, Contact $contact): JsonResponse
    {
        Gate::authorize('update', $contact);

        $email = $contact->emails()->create([
            'email' => $request->validated('email'),
            'main' => (bool) $request->validated('main', false),
        ]);

        return (new ContactEmailResource($email))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Update the specified email for the contact.
     */
    public function update(UpdateContactEmailRequest $request, Contact $contact, ContactEmail $email): ContactEmailResource
    {
        Gate::authorize('update', $contact);

        $email->update($request->validated());

        return new ContactEmailResource($email);
    }

    /**
     * Remove the specified email from the contact.
     */
    public function destroy(Request $request, Contact $contact, ContactEmail $email): JsonResponse
    {
        Gate::authorize('update', $contact);

        $email->delete();

        return response()->json([
            'message' => 'Contact email deleted successfully',
        ]);
    }
}
