<?php

namespace App\Http\Controllers\Receivers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Couriers\AccessCourierController;
use App\Interfaces\Receivers\InterAccessReceiver;
use App\Models\Entities\Acessos;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;

class AccessReceiverController extends Controller implements InterAccessReceiver
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
            return AccessCourierController::deliveringValidation($validation);

        } catch (ValidationException $ex) {
            return AccessCourierController::deliveringValidation($ex);
        }
    }

    public static function user(): Acessos {
        return auth()->user();
    }
}
