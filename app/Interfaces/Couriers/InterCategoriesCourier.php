<?php

namespace App\Interfaces\Couriers;

use App\Models\Entities\Categorias;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

interface InterCategoriesCourier
{
    public static function deliveryValidating($validation): JsonResponse;

    public static function deliveryExaminingList(object $categories): JsonResponse;
    public static function deliveryExaminingCreate(Categorias $newRecord): JsonResponse;
    public static function deliveryExaminingRead(Categorias $category): JsonResponse;
    public static function deliveryExaminingUpdate(Categorias $category): JsonResponse;
    public static function deliveryExaminingDelete(bool $status): JsonResponse;
    public static function deliveryExaminingRestore(bool $status): JsonResponse;
    public static function deliveryExaminingStandard(): JsonResponse;
}
