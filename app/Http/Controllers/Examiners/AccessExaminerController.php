<?php

namespace App\Http\Controllers\Examiners;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Couriers\AccessCourierController;
use App\Interfaces\Examiners\InterAccessExaminer;
use App\Models\Entities\Acessos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;

class AccessExaminerController extends Controller implements InterAccessExaminer
{
    protected $user;
    protected $pass;

    public function __construct() {
        $this->user = 'tester';
        $this->pass = bcrypt('teste123');
    }
    public function examining(Request $request): JsonResponse {

        $user = Acessos::where('usuario', $request->input('usuario'))->first();
        $token = null;

        if (Hash::check($request->input('senha'), $user->senha)) {

            $token = base64_encode(Str::random(270));
            $user->remember_token = $token;
            $user->update();
        }
        return AccessCourierController::deliveryExamination($token);
    }

    public function examiningBack(Request $request): JsonResponse {

        $token = null;

        if (Hash::check($request->input('senha'), $this->pass) &&
            $request->input('usuario') == $this->user) {

            $token = base64_encode(Str::random(270));
        }
        return AccessCourierController::deliveryExamination($token);
    }

    public function dismiss(Acessos $user): JsonResponse {

        $user->remember_token = null;
        $user->update();
        return AccessCourierController::deliveryDismiss();
    }
}
