<?php

namespace App\Interfaces\Couriers;

use App\Models\Entities\Contas;
use Illuminate\Http\JsonResponse;

interface InterBillsCourier
{
    public static function deliveryValidating($validation): JsonResponse;
    public static function deliveryList(object $bills): JsonResponse;
    public static function deliveryExaminingCreate(Contas $newRecord): JsonResponse;
    public static function deliveryExaminingStandard(): JsonResponse;
}
