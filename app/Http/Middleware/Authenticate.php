<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Http\Request;

class Authenticate
{
    /**
     * The authentication guard factory instance.
     *
     * @var Auth
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param Auth $auth
     * @return void
     */
    public function __construct(Auth $auth) {
        $this->auth = $auth;
    }

    /**
     * Lidar com uma solicitação recebida. Caso não exista um usuário
     * autenticado, o guarda impedirá que o processamento da requisição
     * continue e retornará uma mensagem de erro
     *
     * @param Request $request
     * @param Closure $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $guard = null) {

        if ($this->auth->guard($guard)->guest()) {
            return response([
                'status' => 'fail',
                'message' => 'Acesso não autorizado!',
            ], 401);
        }
        return $next($request);
    }
}
