<?php

namespace App\Http\Controllers\Couriers;

use App\Http\Controllers\Controller;
use App\Interfaces\Couriers\InterCategoriesCourier;
use App\Models\Entities\Categorias;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class CategoriesCourierController extends Controller implements InterCategoriesCourier
{

    public static function deliveryValidating($validation): JsonResponse {

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
        }
        return self::deliveryExaminingStandard();
    }

    public static function deliveryExaminingRead(Categorias $category): JsonResponse {
        if (isset($category->id_categoria)) {
            return response()->json([
                'message' => 'Categoria encontrada!',
                'delivery' => $category
            ]);
        }
        return self::deliveryExaminingStandard();
    }

    public static function deliveryExaminingUpdate(Categorias $category): JsonResponse {

        if (isset($category->id_categoria)) {
            return response()->json([
                'message' => 'Categoria atualizada com sucesso!',
                'delivery' => $category
            ]);
        }
        return self::deliveryExaminingStandard();
    }

    public static function deliveryExaminingDelete(bool $status): JsonResponse {
        if ($status) {
            return response()->json([
                'message' => 'Categoria deletada com sucesso!',
                'delivery' => $status
            ]);
        }
        return self::deliveryExaminingStandard();
    }

    public static function deliveryExaminingRestore(bool $status): JsonResponse {
        if ($status) {
            return response()->json([
                'message' => 'Categoria restaurada com sucesso!',
                'delivery' => $status
            ]);
        }
        return self::deliveryExaminingStandard();
    }

    public static function deliveryExaminingList(object $categories): JsonResponse {
        return response()->json([
            'message' => 'Lista de categorias',
            'delivery' => $categories
        ]);
    }

    public static function deliveryExaminingStandard(): JsonResponse {
        return response()->json([
            'message' => 'Erro ao tentar efetuar a operação!',
            'delivery' => null
        ], 422);
    }
}
