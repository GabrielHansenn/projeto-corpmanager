<?php

namespace Tests\Feature\Funcionarios;

use Tests\TestCase;
use App\Models\Funcionarios;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;


class AtualizarFuncionarioTest extends TestCase
{
    use RefreshDatabase;

    public function test_atualizar_funcionario()
    {
        $user = User::factory()->create(); // autenticação fake
        $this->actingAs($user);

        $func = Funcionarios::factory()->create();

        $response = $this->put("/funcionarios/{$func->id}", [
            'nome' => 'Nome Atualizado',
            'cpf' => $func->cpf,
            'telefone' => $func->telefone,
            'email' => $func->email,
            'cargo' => $func->cargo,
            'salario' => $func->salario,
            'data_admissao' => $func->data_admissao,
        ]);

        $response->assertRedirect('/funcionarios');

        $this->assertDatabaseHas('funcionarios', [
            'id' => $func->id,
            'nome' => 'Nome Atualizado',
        ]);
    }

}
