<?php

namespace App\Interfaces\Couriers;

use App\Models\Entities\Contas;
use App\Models\Queries\sqlContas;
use Illuminate\Http\JsonResponse;

interface InterBillsCourier
{
    public static function deliveryValidating($validation): JsonResponse;
    public static function deliveryList(object $bills): JsonResponse;
    public static function deliveryExaminingCreate(Contas $newRecord): JsonResponse;
    public static function deliveryExaminingRead(sqlContas $bill = null): JsonResponse;
    public static function deliveryExaminingUpdate(Contas $bill): JsonResponse;
    public static function deliveryExaminingDelete(bool $status): JsonResponse;
    public static function deliveryExaminingStandard(): JsonResponse;
}
