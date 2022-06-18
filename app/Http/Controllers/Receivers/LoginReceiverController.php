<?php

namespace App\Http\Controllers\Receivers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Couriers\LoginCourierController;
use App\Interfaces\Receivers\InterLoginReceiver;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;

class LoginReceiverController extends Controller implements InterLoginReceiver
{
    public function validating(Request $request): JsonResponse {
        try {
            $validation = $this->validate($request, [
                'usuario' => 'required',
                'senha' => 'required'
            ], [
                'usuario.required' => 'O campo <b>Usuário</b> é obrigatório',
                'senha.required' => 'O campo <b>Senha</b> é obrigatório'
            ]);
            return LoginCourierController::deliveringValidation($validation);

        } catch (ValidationException $ex) {
            return LoginCourierController::deliveringValidation($ex);
        }
    }
}
