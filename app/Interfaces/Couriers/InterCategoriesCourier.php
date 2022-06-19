<?php

namespace App\Interfaces\Couriers;

use App\Models\Entities\Categorias;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

interface InterCategoriesCourier
{
    public static function deliveryValidatingCreate($validation): JsonResponse;
    //public static function deliveryValidatingRead(int $id): JsonResponse;
    //public static function deliveryValidatingUpdate($validation): JsonResponse;
    //public static function deliveryValidatingDelete(int $id): JsonResponse;

    public static function deliveryExaminingCreate(Categorias $newRecord): JsonResponse;
    public static function deliveryExaminingUpdate(Categorias $category): JsonResponse;
    public static function deliveryExaminingList(Collection $categories): JsonResponse;
}
