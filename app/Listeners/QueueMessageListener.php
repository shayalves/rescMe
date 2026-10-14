<?php

namespace App\Listeners;

use App\Events\QueueMessage;
use App\Jobs\SendMessageNotification;
use App\Models\Message;

class QueueMessageListener
{
    public function handle(QueueMessage $event): void
    {
        $message = $event->message;

        // Atomic claim so concurrent workers never queue the same message twice.
        $claimed = Message::query()
            ->whereKey($message->getKey())
            ->where('status', Message::STATUS_ACTIVE)
            ->update(['status' => Message::STATUS_SENDING]);

        if ($claimed === 0) {
            return;
        }

        $message->load('contacts.phones', 'contacts.emails');

        foreach ($message->contacts as $contact) {
            foreach ($contact->phones as $phone) {
                SendMessageNotification::dispatch([
                    'message' => $message->content,
                    'channel' => 'sms',
                    'contact' => $phone->phone_number,
                ]);
            }

            foreach ($contact->emails as $email) {
                SendMessageNotification::dispatch([
                    'message' => $message->content,
                    'channel' => 'email',
                    'contact' => $email->email,
                ]);
            }
        }
    }
}
