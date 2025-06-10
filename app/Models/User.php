<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// Modelo do usuário, utilizado para autenticação e gerenciamento de dados do usuário
class User extends Authenticatable
{
    /** Usa as traits HasFactory e Notifiable */
    use HasFactory, Notifiable;

    /**
     * Atributos que podem ser atribuídos em massa (mass assignment).
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',      // Nome do usuário
        'email',     // E-mail do usuário
        'password',  // Senha do usuário
    ];

    /**
     * Atributos que devem ser ocultados quando o modelo for convertido em array ou JSON.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',        // Oculta a senha
        'remember_token',  // Oculta o token de "lembrar-me"
    ];

    /**
     * Converte automaticamente os atributos para os tipos especificados.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // Converte data de verificação de e-mail em objeto DateTime
            'password' => 'hashed',            // Aplica hash automaticamente ao atribuir uma senha
        ];
    }
}
