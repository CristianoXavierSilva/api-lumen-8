<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Examiners\LoginExaminerController;
use App\Http\Controllers\Receivers\LoginReceiverController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    public function login(Request $request): JsonResponse {

        $validation = new LoginReceiverController();
        $result = $validation->validating($request);

        if ($result->status() == 201) {
            $examination = new LoginExaminerController();
            $result = $examination->examining($request);
        }
        return $result;
    }
}
