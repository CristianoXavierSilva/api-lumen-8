<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Entities\Acessos;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function logging(Request $request): JsonResponse {

        $this->validate($request, [
            'usuario' => 'required',
            'senha' => 'required'
        ]);
        $user = Acessos::where('usuario', $request->input('usuario'))->first();

        if (Hash::check($request->input('senha'), $user->senha)) {

            $token = base64_encode(Str::random(270));
            $user->remember_token = $token;
            $user->update();

            return response()->json([
                'status' => 'success',
                'message' => 'Login efetuado com sucesso!',
                'token' => $token
            ]);
        }

        return response()->json([
            'status' => 'fail',
            'message' => 'Usuário ou senha incorreto!',
            'token' => null
        ], 401);
    }
}
