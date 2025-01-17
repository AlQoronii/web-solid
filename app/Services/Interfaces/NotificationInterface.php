<?php

namespace App\Services\Interfaces;

use Illuminate\Http\JsonResponse;

interface NotificationInterface
{
    public static function success(string $message): void;

    public static function error(string $message): void;

    public static function warning(string $message): void;
}