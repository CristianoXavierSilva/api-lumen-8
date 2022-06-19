<?php

namespace App\Http\Controllers\Couriers;

use App\Http\Controllers\Controller;
use App\Interfaces\Couriers\InterBillsCourier;
use Illuminate\Http\JsonResponse;

class BillsCourierController extends Controller implements InterBillsCourier
{
    public static function deliveryList(object $bills): JsonResponse {
        return response()->json([
            'message' => 'Lista de contas a pagar',
            'delivery' => $bills
        ]);
    }

    public static function deliveryExaminingStandard(): JsonResponse {
        return response()->json([
            'message' => 'Erro ao tentar efetuar a operação!',
            'delivery' => null
        ], 422);
    }
}
