<?php

namespace App\Interfaces\Examiners;

use Illuminate\Http\JsonResponse;

interface InterBillsExaminer
{
    public function examiningList(string $paginate = null): JsonResponse;
    public function examiningCreate($validatedData): JsonResponse;
    public function examiningRead(int $id): JsonResponse;
    public function examiningUpdate($validatedData, int $id): JsonResponse;
    public function examiningDelete(int $id): JsonResponse;
    public function examiningRestore(int $id): JsonResponse;
}
