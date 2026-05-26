<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Kreait\Firebase\Contract\Messaging;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class SendGoldAlertJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $tokens;
    protected $textAlert;
    public function __construct($tokens,$textAlert)
    {
        $this->tokens = $tokens;
        $this->textAlert=$textAlert;
    }

    public function handle(Messaging $messaging)
    {
        $chunks = array_chunk($this->tokens, 500);

        foreach ($chunks as $chunk) {
            $message = CloudMessage::new()
            ->withNotification(Notification::create(
                'Gold Alert',
                $this->textAlert
            ))
            ->withAndroidConfig([
                'priority' => 'high',
                'notification' => [
                    'sound' => 'default',
                    'channel_id' => 'high_importance_channel',
                ],
            ]);

            $messaging->sendMulticast($message, $chunk);
        }
    }
}
