<?php

namespace App\Http\Controllers\Receivers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Couriers\CategoriesCourierController;
use App\Interfaces\Couriers\InterCategoriesCourier;
use App\Interfaces\Receivers\InterCategoriesReceiver;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CategoriesReceiverController extends Controller implements InterCategoriesReceiver
{
    public function validating(Request $request): JsonResponse {
        try {
            $validation = $this->validate($request, [
                'titulo' => 'string|required|max:255|min:3'
            ], [
                'titulo.required' => 'O campo <b>Título</b> é obrigatório',
                'titulo.string' => 'O campo <b>Título</b> deve ser um valor do tipo STRING',
                'titulo.max' => 'O tamanho do campo <b>Título</b> está acima do limite de 255 caracteres',
                'titulo.min' => 'O campo <b>Título</b> deve ter no mínimo 3 caracteres'
            ]);
            return CategoriesCourierController::deliveryValidatingCreate($validation);

        } catch (ValidationException $ex) {
            return CategoriesCourierController::deliveryValidatingCreate($ex);
        }
    }
}
