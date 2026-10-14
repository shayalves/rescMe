<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmergencyRequest;
use App\Http\Resources\EmergencyResource;
use App\Models\Emergency;
use Illuminate\Http\JsonResponse;

class EmergencyController extends Controller
{
    /**
     * Register a new emergency for the authenticated user.
     */
    public function store(StoreEmergencyRequest $request): JsonResponse
    {
        $emergency = $request->user()->emergencies()->create([
            ...$request->validated(),
            'status' => Emergency::STATUS_ACTIVE,
        ]);

        return (new EmergencyResource($emergency))
            ->response()
            ->setStatusCode(201);
    }
}
