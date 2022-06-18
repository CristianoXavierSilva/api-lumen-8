<?php

namespace App\Interfaces\Receivers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface InterLoginReceiver
{
    public function validating(Request $request) : JsonResponse;
}
