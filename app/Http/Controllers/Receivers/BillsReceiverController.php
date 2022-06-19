<?php

namespace App\Http\Controllers\Receivers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Couriers\BillsCourierController;
use App\Interfaces\Receivers\InterBillsReceiver;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class BillsReceiverController extends Controller implements InterBillsReceiver
{
    public function validating(Request $request): JsonResponse {
        try {
            $validation = $this->validate($request, [
                'categoria' => 'numeric|required',
                'titulo' => 'string|required|max:255|min:3',
                'valor' => 'numeric|required',
                'status' => 'numeric|required'
            ], [
                'titulo.required' => 'O campo <b>Título</b> é obrigatório',
                'titulo.string' => 'O campo <b>Título</b> deve ser um valor do tipo STRING',
                'titulo.max' => 'O tamanho do campo <b>Título</b> está acima do limite de 255 caracteres',
                'titulo.min' => 'O campo <b>Título</b> deve ter no mínimo 3 caracteres',
                'categoria.required' => 'O campo <b>Categoria</b> é obrigatório',
                'categoria.numeric' => 'O campo <b>Categoria</b> deve ser um valor do tipo INT',
                'valor.required' => 'O campo <b>Valor</b> é obrigatório',
                'valor.numeric' => 'O campo <b>Valor</b> deve ser um valor do tipo DOUBLE',
                'status.required' => 'O campo <b>Status</b> é obrigatório',
                'status.numeric' => 'O campo <b>Status</b> deve ser um valor do tipo INT',
            ]);
            return BillsCourierController::deliveryValidating($validation);

        } catch (ValidationException $ex) {
            return BillsCourierController::deliveryValidating($ex);
        }
    }
}
