<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SendMessageNotification implements ShouldQueue
{
    use Queueable;

    /**
     * @param  array{message: string, channel: 'sms'|'email', contact: string}  $payload
     */
    public function __construct(public array $payload) {}

    public function handle(): void
    {
        // Delivery per channel is implemented by the notification provider.
    }
}
