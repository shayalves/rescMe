<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        Gate::authorize('viewAny', Contact::class);

        $query = $request->user()->contacts()->with(['emails', 'phones'])->latest();

        if ($request->has('page') || $request->has('per_page')) {
            $contacts = $query->paginate($request->integer('per_page', 15));
        } else {
            $contacts = $query->get();
        }

        return ContactResource::collection($contacts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request): JsonResponse
    {
        Gate::authorize('create', Contact::class);

        $validated = $request->validated();

        $contact = DB::transaction(function () use ($request, $validated): Contact {
            $contact = $request->user()->contacts()->create([
                'name' => $validated['name'],
            ]);

            if (! empty($validated['emails'])) {
                foreach ($validated['emails'] as $emailData) {
                    $contact->emails()->create([
                        'email' => $emailData['email'],
                        'main' => (bool) ($emailData['main'] ?? false),
                    ]);
                }
            }

            if (! empty($validated['phones'])) {
                foreach ($validated['phones'] as $phoneData) {
                    $contact->phones()->create([
                        'international_code' => $phoneData['international_code'],
                        'phone_number' => $phoneData['phone_number'],
                        'main' => (bool) ($phoneData['main'] ?? false),
                    ]);
                }
            }

            return $contact->load(['emails', 'phones']);
        });

        return (new ContactResource($contact))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Contact $contact): ContactResource
    {
        Gate::authorize('view', $contact);

        $contact->load(['emails', 'phones']);

        return new ContactResource($contact);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact): ContactResource
    {
        Gate::authorize('update', $contact);

        $validated = $request->validated();

        $contact = DB::transaction(function () use ($contact, $validated, $request): Contact {
            if (isset($validated['name'])) {
                $contact->update(['name' => $validated['name']]);
            }

            if ($request->has('emails')) {
                $emailsData = $validated['emails'] ?? [];
                $keptEmailIds = [];

                foreach ($emailsData as $emailData) {
                    if (! empty($emailData['id'])) {
                        $existingEmail = $contact->emails()->find($emailData['id']);
                        if ($existingEmail) {
                            $existingEmail->update([
                                'email' => $emailData['email'],
                                'main' => (bool) ($emailData['main'] ?? false),
                            ]);
                            $keptEmailIds[] = $existingEmail->id;

                            continue;
                        }
                    }

                    $newEmail = $contact->emails()->create([
                        'email' => $emailData['email'],
                        'main' => (bool) ($emailData['main'] ?? false),
                    ]);
                    $keptEmailIds[] = $newEmail->id;
                }

                $contact->emails()->whereNotIn('id', $keptEmailIds)->delete();
            }

            if ($request->has('phones')) {
                $phonesData = $validated['phones'] ?? [];
                $keptPhoneIds = [];

                foreach ($phonesData as $phoneData) {
                    if (! empty($phoneData['id'])) {
                        $existingPhone = $contact->phones()->find($phoneData['id']);
                        if ($existingPhone) {
                            $existingPhone->update([
                                'international_code' => $phoneData['international_code'],
                                'phone_number' => $phoneData['phone_number'],
                                'main' => (bool) ($phoneData['main'] ?? false),
                            ]);
                            $keptPhoneIds[] = $existingPhone->id;

                            continue;
                        }
                    }

                    $newPhone = $contact->phones()->create([
                        'international_code' => $phoneData['international_code'],
                        'phone_number' => $phoneData['phone_number'],
                        'main' => (bool) ($phoneData['main'] ?? false),
                    ]);
                    $keptPhoneIds[] = $newPhone->id;
                }

                $contact->phones()->whereNotIn('id', $keptPhoneIds)->delete();
            }

            return $contact->load(['emails', 'phones']);
        });

        return new ContactResource($contact);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Contact $contact): JsonResponse
    {
        Gate::authorize('delete', $contact);

        DB::transaction(function () use ($contact): void {
            $contact->emails()->delete();
            $contact->phones()->delete();
            $contact->delete();
        });

        return response()->json([
            'message' => 'Contact deleted successfully',
        ]);
    }
}
