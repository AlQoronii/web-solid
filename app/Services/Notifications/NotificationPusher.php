<?php

namespace App\Services\Notifications;

use App\Services\Interfaces\NotificationInterface;
use Illuminate\Http\JsonResponse;

class NotificationPusher implements NotificationInterface
{
    public function warning(string $message, array $data = []): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ], 200);
    }

    public function success(string $message, array $data = []): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ], 201);
    }

    public function error(string $message, int $statusCode = 400): JsonResponse
    {
        return response()->json([
            'message' => $message,
        ], $statusCode);
    }
}