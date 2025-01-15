<?php

namespace App\Services\Interfaces;

use Illuminate\Http\JsonResponse;

interface NotificationInterface
{
    public function success(string $message, array $data = []): JsonResponse;

    public function error(string $message, int $statusCode = 400): JsonResponse;

    public function warning(string $message, array $data = []): JsonResponse;
}