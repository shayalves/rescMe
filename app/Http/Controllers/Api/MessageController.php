<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $query = $request->user()->messages()->with('contacts')->latest();

        $messages = $request->has('page') || $request->has('per_page')
            ? $query->paginate($request->integer('per_page', 15))
            : $query->get();

        return MessageResource::collection($messages);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMessageRequest $request): JsonResponse
    {
        $message = $request->user()->messages()->create($request->validated());

        return (new MessageResource($message->load('contacts')))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Message $message): MessageResource
    {
        $message = $request->user()->messages()
            ->with('contacts')
            ->findOrFail($message->getKey());

        return new MessageResource($message);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMessageRequest $request, Message $message): MessageResource
    {
        $message = $request->user()->messages()->findOrFail($message->getKey());
        // Only active messages (status 1) can be edited
        if ($message->status !== Message::STATUS_ACTIVE) {
            abort(403, 'Only active messages can be edited.');
        }
        $message->update($request->validated());

        return new MessageResource($message->load('contacts'));
    }

    /**
     * Cancel the specified message.
     */
    public function cancel(Request $request, Message $message): MessageResource
    {
        $message = $request->user()->messages()->findOrFail($message->getKey());
        $message->update([
            'status' => Message::STATUS_CANCELED,
            'canceled_at' => now(),
        ]);

        return new MessageResource($message->load('contacts'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Message $message): JsonResponse
    {
        $message = $request->user()->messages()->findOrFail($message->getKey());
        $message->delete();

        return response()->json([
            'message' => 'Message deleted successfully',
        ]);
    }
}
