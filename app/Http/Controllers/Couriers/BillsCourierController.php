<?php

namespace App\Http\Controllers\Couriers;

use App\Http\Controllers\Controller;
use App\Interfaces\Couriers\InterBillsCourier;
use App\Models\Entities\Contas;
use Illuminate\Http\JsonResponse;

class BillsCourierController extends Controller implements InterBillsCourier
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

    public static function deliveryList(object $bills): JsonResponse {
        return response()->json([
            'message' => 'Lista de contas a pagar',
            'delivery' => $bills
        ]);
    }

    public static function deliveryExaminingCreate(Contas $newRecord): JsonResponse {

        if (!empty($newRecord)) {
            return response()->json([
                'message' => 'Conta cadastrada com sucesso!',
                'delivery' => $newRecord
            ]);
        }
        return self::deliveryExaminingStandard();
    }

    public static function deliveryExaminingStandard(): JsonResponse {
        return response()->json([
            'message' => 'Erro ao tentar efetuar a operação!',
            'delivery' => null
        ], 422);
    }
}
