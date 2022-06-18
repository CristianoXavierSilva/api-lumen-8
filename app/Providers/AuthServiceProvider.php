<?php

namespace App\Providers;

use App\Models\Entities\Acessos;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Registre qualquer serviço do aplicativo.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Inicialize os serviços de autenticação para o aplicativo.
     *
     * @return void
     */
    public function boot() {
        /**
         * Aqui você pode definir como deseja que os usuários sejam autenticados para seu aplicativo Lumen.
         * O retorno de chamada que recebe a instância de solicitação de entrada deve retornar uma instância de usuário ou nula.
         * Você pode obter a instância de usuário por meio de um token de API ou qualquer outro método necessário.
         */
        $this->app['auth']->viaRequest('api', function ($request) {

            if ($request->header('Authorization')) {

                $key = explode(' ',$request->header('Authorization')); //capturando token vindo do cabeçalho
                $user = Acessos::where('remember_token', $key[1])->first(); //buscando usuário no banco através do token

                if (!empty($user)) {
                    return $user; //Retorando dados do usuário para posteriormente serem utilizados sempre que necessário
                }
            }
        });
    }
}
