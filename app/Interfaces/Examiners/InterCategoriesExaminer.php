<?php

namespace App\Interfaces\Examiners;

use Illuminate\Http\JsonResponse;

interface InterCategoriesExaminer
{
    public function examiningCreate($validatedData): JsonResponse;
    public function examiningUpdate($validatedData, int $id): JsonResponse;
}
