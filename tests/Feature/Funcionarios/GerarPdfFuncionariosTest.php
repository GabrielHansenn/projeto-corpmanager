<?php

namespace Tests\Feature\Funcionarios;

use Tests\TestCase;
use App\Models\User; // ✅ Import necessário
use Illuminate\Foundation\Testing\RefreshDatabase;

class GerarPdfFuncionariosTest extends TestCase
{
    use RefreshDatabase;

    public function test_gerar_pdf_funcionarios()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('funcionarios.gerar-pdf'));



        $response->assertStatus(200);
        $response->assertHeader('content-type', 'application/pdf');
    }
}
