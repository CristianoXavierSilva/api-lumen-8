<?php

namespace App\Interfaces\Examiners;

use Illuminate\Http\JsonResponse;

interface InterBillsExaminer
{
    public function examiningList(string $paginate = null): JsonResponse;
}
