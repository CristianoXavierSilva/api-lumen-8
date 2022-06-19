<?php

namespace App\Http\Controllers\Examiners;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Couriers\BillsCourierController;
use App\Interfaces\Examiners\InterBillsExaminer;
use App\Models\Entities\Contas;
use App\Models\Queries\sqlContas;
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

    public function examiningCreate($validatedData): JsonResponse {

        $datas = array(
            'id_categoria' => $validatedData->categoria,
            'con_titulo' => $validatedData->titulo,
            'con_valor' => $validatedData->valor,
            'con_status' => $validatedData->status
        );
        $newRecord = Contas::create($datas);

        return BillsCourierController::deliveryExaminingCreate($newRecord);
    }

    public function examiningRead(int $id): JsonResponse {
        try {
            $bill = sqlContas::fullOrFind('id_conta', $id);
            return BillsCourierController::deliveryExaminingRead($bill);

        } catch (\Exception $ex) {
            return BillsCourierController::deliveryExaminingRead(new sqlContas());
        }
    }

    public function examiningUpdate($validatedData, int $id): JsonResponse
    {
        try {
            $bill = Contas::findOrFail($id);
            $bill->id_categoria = $validatedData->categoria;
            $bill->con_titulo = $validatedData->titulo;
            $bill->con_valor = $validatedData->valor;
            $bill->con_status = $validatedData->status;
            $bill->update();
            return BillsCourierController::deliveryExaminingUpdate($bill);

        } catch (\Exception $ex) {
            return BillsCourierController::deliveryExaminingUpdate(new Contas());
        }
    }

    public function examiningDelete(int $id): JsonResponse
    {
        return new JsonResponse();
    }

    public function examiningRestore(int $id): JsonResponse
    {
        return new JsonResponse();
    }
}
