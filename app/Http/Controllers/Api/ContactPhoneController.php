<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactPhoneRequest;
use App\Http\Requests\UpdateContactPhoneRequest;
use App\Http\Resources\ContactPhoneResource;
use App\Models\Contact;
use App\Models\ContactPhone;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ContactPhoneController extends Controller
{
    /**
     * Store a newly created phone for the contact.
     */
    public function store(StoreContactPhoneRequest $request, Contact $contact): JsonResponse
    {
        Gate::authorize('update', $contact);

        $phone = $contact->phones()->create([
            'international_code' => $request->validated('international_code'),
            'phone_number' => $request->validated('phone_number'),
            'main' => (bool) $request->validated('main', false),
        ]);

        return (new ContactPhoneResource($phone))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Update the specified phone for the contact.
     */
    public function update(UpdateContactPhoneRequest $request, Contact $contact, ContactPhone $phone): ContactPhoneResource
    {
        Gate::authorize('update', $contact);

        $phone->update($request->validated());

        return new ContactPhoneResource($phone);
    }

    /**
     * Remove the specified phone from the contact.
     */
    public function destroy(Request $request, Contact $contact, ContactPhone $phone): JsonResponse
    {
        Gate::authorize('update', $contact);

        $phone->delete();

        return response()->json([
            'message' => 'Contact phone deleted successfully',
        ]);
    }
}
