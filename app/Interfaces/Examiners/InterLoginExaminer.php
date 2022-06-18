<?php

namespace App\Interfaces\Examiners;

use App\Models\Entities\Acessos;
use Illuminate\Http\JsonResponse;
use Illuminate\http\Request;

interface InterLoginExaminer
{
    public function examining(Request $request): JsonResponse;
    public function dismiss(Acessos $user): JsonResponse;
}
