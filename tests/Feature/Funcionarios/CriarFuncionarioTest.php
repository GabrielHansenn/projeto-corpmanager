<?php

namespace Tests\Feature\Funcionarios;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CriarFuncionarioTest extends TestCase
{
    use RefreshDatabase;

    public function test_criar_funcionario_com_dados_validos()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/funcionarios', [
            'nome' => 'Funcionário Teste',
            'cpf' => '101.496.289-78',
            'telefone' => '(11) 91234-5678',
            'email' => 'teste.func@example.com',
            'cargo' => 'Analista',
            'salario' => 3500.00,
            'data_admissao' => '2023-05-01',
        ]);

        $response->assertRedirect('/funcionarios');
        $this->assertDatabaseHas('funcionarios', [
            'email' => 'teste.func@example.com',
        ]);
    }

    public function test_nao_criar_funcionario_com_dados_invalidos()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('funcionarios.store'), [
            'nome' => '',
            'cpf' => '',
            'telefone' => '',
            'email' => 'email-invalido',
            'cargo' => '',
            'salario' => -10,
            'data_admissao' => '3000-01-01',
        ]);

        $response->assertSessionHasErrors([
            'nome',
            'cpf',
            'telefone',
            'email',
            'cargo',
            'salario',
            'data_admissao',
        ]);
    }
}
