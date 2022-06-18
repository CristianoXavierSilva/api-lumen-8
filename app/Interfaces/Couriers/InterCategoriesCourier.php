<?php

namespace App\Interfaces\Couriers;

use Illuminate\Http\JsonResponse;

interface InterCategoriesCourier
{
    public static function deliveryValidatingCreate($validation): JsonResponse;
    //public static function deliveryValidatingRead(int $id): JsonResponse;
    //public static function deliveryValidatingUpdate($validation): JsonResponse;
    //public static function deliveryValidatingDelete(int $id): JsonResponse;
}
