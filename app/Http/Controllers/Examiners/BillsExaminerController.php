<?php

namespace App\Http\Controllers\Examiners;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Couriers\BillsCourierController;
use App\Interfaces\Examiners\InterBillsExaminer;
use App\Models\Entities\Contas;
use Illuminate\Http\JsonResponse;

class BillsExaminerController extends Controller implements InterBillsExaminer
{
    public function examiningList(string $paginate = null): JsonResponse {

        if (!is_null($paginate)) {
            $bills = Contas::paginate($paginate);
        } else {
            $bills = Contas::all();
        }
        return BillsCourierController::deliveryList($bills);
    }
}
