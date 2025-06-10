<?php

namespace Tests\Feature\Funcionarios;

use Tests\TestCase;
use App\Models\Funcionarios;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;


class DeletarFuncionarioTest extends TestCase
{
    use RefreshDatabase;

    public function test_deletar_funcionario()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $func = Funcionarios::factory()->create();

        $response = $this->delete("/funcionarios/{$func->id}");

        $response->assertRedirect('/funcionarios');

        $this->assertDatabaseMissing('funcionarios', [
            'id' => $func->id,
        ]);
    }

}
