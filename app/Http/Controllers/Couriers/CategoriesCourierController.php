<?php

namespace App\Http\Controllers\Couriers;

use App\Http\Controllers\Controller;
use App\Interfaces\Couriers\InterCategoriesCourier;
use App\Models\Entities\Categorias;
use Illuminate\Database\Eloquent\Collection;
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

        if (!empty($newRecord)) {
            return response()->json([
                'message' => 'Categoria cadastrada com sucesso!',
                'delivery' => $newRecord
            ]);
        } else {
            return response()->json([
                'message' => 'Erro ao tentar efetuar o cadastro!',
                'delivery' => null
            ], 500);
        }
    }

    public static function deliveryExaminingUpdate(Categorias $category): JsonResponse {

        if (isset($category->id_categoria)) {
            return response()->json([
                'message' => 'Categoria atualizada com sucesso!',
                'delivery' => $category
            ]);
        } else {
            return response()->json([
                'message' => 'Erro ao tentar efetuar a atualização! Nenhum registro com esse ID encontrado',
                'delivery' => null
            ], 422);
        }
    }

    public static function deliveryExaminingList(object $categories): JsonResponse {
        return response()->json([
            'message' => 'Lista de categorias',
            'delivery' => $categories
        ]);
    }
}
