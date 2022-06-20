<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Examiners\AccessExaminerController;
use App\Http\Controllers\Receivers\AccessReceiverController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    public function __construct() {
        $this->validation = new AccessReceiverController();
        $this->examination = new AccessExaminerController();
    }

    public function login(Request $request): JsonResponse {

        $result = $this->validation->validating($request);

        if ($result->status() == 100) {
            $result = $this->examination->examining($request);
        }
        return $result;
    }

    public function logout(): JsonResponse {

        $user = AccessReceiverController::user();
        return $this->examination->dismiss($user);
    }

    public function backin(Request $request): JsonResponse {

        $result = $this->validation->validating($request);

        if ($result->status() == 100) {
            $result = $this->examination->examiningBack($request);
        }
        return $result;
    }
}
