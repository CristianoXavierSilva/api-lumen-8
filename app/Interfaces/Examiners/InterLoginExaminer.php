<?php

namespace App\Interfaces\Examiners;

use Illuminate\Http\JsonResponse;
use Illuminate\http\Request;

interface InterLoginExaminer
{
    public function examining(Request $request): JsonResponse;
}
