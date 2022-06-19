<?php

namespace App\Interfaces\Examiners;

use App\Models\Entities\Categorias;
use Illuminate\Http\JsonResponse;

interface InterCategoriesExaminer
{
    public function examiningList(string $paginate = null): JsonResponse;
    public function examiningCreate($validatedData): JsonResponse;
    public function examiningRead(int $id): JsonResponse;
    public function examiningUpdate($validatedData, int $id): JsonResponse;
}
