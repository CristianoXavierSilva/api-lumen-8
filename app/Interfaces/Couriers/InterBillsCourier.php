<?php

namespace App\Interfaces\Couriers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

interface InterBillsCourier
{
    public static function deliveryList(object $bills): JsonResponse;
    public static function deliveryExaminingStandard(): JsonResponse;
}
