<?php

namespace App\Services\Notifications;

use App\Services\Interfaces\NotificationInterface;
use Illuminate\Http\JsonResponse;

class NotificationPusher implements NotificationInterface
{
    public static function success(string $message): void
    {
        session()->flash('message',
            [
                'type' => 'success',
                'message' => $message
            ]
        );
    }

    public static function error(string $message): void
    {
        session()->flash('message',
            [
                'type' => 'error',
                'message' => $message
            ]
        );
    }

    public static function warning(string $message): void
    {
        session()->flash('message',
            [
                'type' => 'warning',
                'message' => $message
            ]
        );
    }
}