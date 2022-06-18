<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Examiners\AccessExaminerController;
use App\Http\Controllers\Receivers\AccessReceiverController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    public function login(Request $request): JsonResponse {

        $validation = new AccessReceiverController();
        $result = $validation->validating($request);

        if ($result->status() == 201) {
            $examination = new AccessExaminerController();
            $result = $examination->examining($request);
        }
        return $result;
    }

    public function logout(): JsonResponse {

        $user = AccessReceiverController::user();
        $examination = new AccessExaminerController();

        return $examination->dismiss($user);
    }
}
