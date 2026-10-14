<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Foundation\Events\Dispatchable;

class QueueMessage
{
    use Dispatchable;

    public function __construct(public Message $message) {}
}
