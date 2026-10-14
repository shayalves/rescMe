<?php

namespace App\Console\Commands;

use App\Events\QueueMessage;
use App\Models\Message;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('messages:dispatch-expired')]
#[Description('Dispatch the QueueMessage event for active messages that have just expired')]
class WatchExpiredMessages extends Command
{
    public function handle(): int
    {
        Message::query()
            ->where('status', Message::STATUS_ACTIVE)
            ->where('expires_at', '<=', now())
            ->each(fn (Message $message) => QueueMessage::dispatch($message));

        return self::SUCCESS;
    }
}
