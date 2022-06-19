<?php

namespace App\Interfaces\Receivers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface InterCategoriesReceiver
{
    public function validating(Request $request): JsonResponse;
}
