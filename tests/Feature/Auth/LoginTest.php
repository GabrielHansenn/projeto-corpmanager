<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_usuario_pode_logar_com_credenciais_validas()
    {
        $user = User::factory()->create([
            'email' => 'user@example.com',
            'password' => bcrypt('senha123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'user@example.com',
            'password' => 'senha123',
        ]);

        $response->assertRedirect('/'); // ajuste conforme sua rota pós-login
        $this->assertAuthenticatedAs($user);
    }

    public function test_usuario_nao_pode_logar_com_credenciais_invalidas()
    {
        $response = $this->post('/login', [
            'email' => 'invalido@example.com',
            'password' => 'senhaerrada',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }
}
