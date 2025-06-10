<?php

namespace Database\Factories;

use App\Models\Funcionarios;
use Illuminate\Database\Eloquent\Factories\Factory;

class FuncionariosFactory extends Factory
{
    protected $model = Funcionarios::class;

    public function definition(): array
    {
        return [
            'nome' => $this->faker->name,
            'cpf' => $this->faker->numerify('###.###.###-##'),
            'telefone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'cargo' => 'Analista',
            'salario' => $this->faker->randomFloat(2, 2000, 8000),
            'data_admissao' => $this->faker->date('Y-m-d'),
        ];
    }
}
