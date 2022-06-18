<?php

namespace App\Http\Controllers\Examiners;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Couriers\LoginCourierController;
use App\Interfaces\Examiners\InterLoginExaminer;
use App\Models\Entities\Acessos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;

class LoginExaminerController extends Controller implements InterLoginExaminer
{
    public function examining(Request $request): JsonResponse {

        $user = Acessos::where('usuario', $request->input('usuario'))->first();
        $token = null;

        if (Hash::check($request->input('senha'), $user->senha)) {

            $token = base64_encode(Str::random(270));
            $user->remember_token = $token;
            $user->update();
        }
        return LoginCourierController::deliveryExamination($token);
    }
}
