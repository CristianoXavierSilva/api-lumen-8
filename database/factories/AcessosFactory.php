<?php

namespace Database\Factories;

use App\Models\Entities\Acessos;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AcessosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Acessos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array {
        return [
            'nome' => 'Usuário Teste',
            'usuario' => 'developer',
            'email' => 'teste@teste.com.br',
            'validacao' => now(),
            'senha' => bcrypt('teste123321'),
            'remember_token' => Str::random(10),
            'data_hora_cadastro' => date('Y-m-d H:i:s'),
            'data_hora_alteracao' => null,
            'data_hora_exclusao' => null
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified(): AcessosFactory {
        return $this->state(function (array $attributes) {
            return [
                'validacao' => null,
            ];
        });
    }
}
