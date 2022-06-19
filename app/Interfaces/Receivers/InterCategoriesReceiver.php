<?php

namespace App\Interfaces\Receivers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface InterCategoriesReceiver
{
    public function validatingCreate(Request $request): JsonResponse;
    //public function validatingRead(int $id): JsonResponse;
    public function validatingUpdate(Request $request): JsonResponse;
    //public function validatingDelete(int $id): JsonResponse;
}
