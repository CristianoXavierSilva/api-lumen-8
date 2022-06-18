<?php

namespace App\Http\Controllers\Couriers;

use App\Http\Controllers\Controller;
use App\Interfaces\Couriers\InterCategoriesCourier;
use Illuminate\Http\JsonResponse;

class CategoriesCourierController extends Controller implements InterCategoriesCourier
{

    public static function deliveryValidatingCreate($validation): JsonResponse {

        if (isset($validation->status)) {
            return response()->json([
                'message' => 'Validação reprovada!',
                'delivery' => $validation->response->original
            ], $validation->status);
        } else {
            return response()->json([
                'message' => 'Validação aprovada!',
                'delivery' => $validation
            ], 201);
        }
    }
}
