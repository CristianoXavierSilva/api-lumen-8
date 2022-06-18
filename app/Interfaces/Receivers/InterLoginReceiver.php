<?php

namespace App\Interfaces\Receivers;

use App\Models\Entities\Acessos;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface InterLoginReceiver
{
    public function validating(Request $request) : JsonResponse;
    public static function user() : Acessos;
}
