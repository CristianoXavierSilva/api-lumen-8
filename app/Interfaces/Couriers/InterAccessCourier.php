<?php

namespace App\Interfaces\Couriers;

use Illuminate\Http\JsonResponse;

interface InterAccessCourier
{
    public static function deliveringValidation($validation): JsonResponse;
    public static function deliveryExamination(string $token = null): JsonResponse;
    public static function deliveryDismiss(): JsonResponse;
}
