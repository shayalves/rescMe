<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\ContactEmailController;
use App\Http\Controllers\Api\ContactPhoneController;
use App\Http\Controllers\Api\DeviceLocationController;
use App\Http\Controllers\Api\MessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Authentication endpoints grouped under /user prefix
Route::prefix('user')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    Route::get('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');
});

// Contact management endpoints
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('contacts', ContactController::class);
    Route::apiResource('contacts.emails', ContactEmailController::class)->only(['store', 'update', 'destroy'])->scoped();
    Route::apiResource('contacts.phones', ContactPhoneController::class)->only(['store', 'update', 'destroy'])->scoped();
    Route::post('messages/{message}/cancel', [MessageController::class, 'cancel']);
    Route::apiResource('messages', MessageController::class);
    Route::post('device/locations', [DeviceLocationController::class, 'store']);
});
