<?php

namespace App\Http\Controllers\Couriers;

use App\Http\Controllers\Controller;
use App\Interfaces\Couriers\InterAccessCourier;
use Illuminate\Http\JsonResponse;

class AccessCourierController extends Controller implements InterAccessCourier
{
    public static function deliveringValidation($validation): JsonResponse {

        if (isset($validation->status)) {
            return response()->json([
                'message' => 'Validação reprovada!',
                'delivery' => $validation->response->original
            ], $validation->status);
        } else {
            return response()->json([
                'message' => 'Validação aprovada!',
                'delivery' => $validation
            ], 100);
        }
    }

    public static function deliveryExamination($token = null): JsonResponse {

        if (is_null($token)) {
            return response()->json([
                'message' => 'Usuário ou senha incorreto!',
                'delivery' => $token
            ], 401);
        }
        return response()->json([
            'message' => 'Login efetuado com sucesso!',
            'delivery' => $token
        ]);
    }

    public static function deliveryDismiss(): JsonResponse {
        return response()->json([
            'message' => 'Logout efetuado com sucesso!',
            'delivery' => null
        ]);
    }
}
