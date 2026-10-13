<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeviceLocationRequest;
use App\Http\Resources\DeviceLocationResource;
use App\Models\Device;
use Illuminate\Http\JsonResponse;

class DeviceLocationController extends Controller
{
    /**
     * Store the geolocation of the device tied to the current session.
     */
    public function store(StoreDeviceLocationRequest $request): JsonResponse
    {
        $deviceId = $request->user()->currentAccessToken()->device_id;

        $device = Device::where('user_id', $request->user()->getKey())->find($deviceId);

        if (! $device) {
            return response()->json([
                'message' => 'The current session is not linked to a device.',
            ], 422);
        }

        $location = $device->locations()->create([
            ...$request->validated(),
            'recorded_at' => $request->validated('recorded_at') ?? now(),
        ]);

        return (new DeviceLocationResource($location))
            ->response()
            ->setStatusCode(201);
    }
}
