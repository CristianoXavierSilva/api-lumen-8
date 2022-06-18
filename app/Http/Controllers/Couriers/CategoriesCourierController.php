<?php

namespace App\Http\Controllers\Couriers;

use App\Http\Controllers\Controller;
use App\Interfaces\Couriers\InterCategoriesCourier;
use App\Models\Entities\Categorias;
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
            ], 100);
        }
    }

    public static function deliveryExaminingCreate(Categorias $newRecord): JsonResponse {

        if (isset($newRecord)) {
            return response()->json([
                'message' => 'Categoria cadastrada com sucesso!',
                'delivery' => $newRecord
            ]);
        } else {
            return response()->json([
                'message' => 'Erro ao tentar efetuar cadastro!',
                'delivery' => null
            ], 500);
        }
    }
}
