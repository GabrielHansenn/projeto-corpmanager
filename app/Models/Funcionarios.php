<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Modelo que representa a tabela de funcionários no banco de dados
class Funcionarios extends Model
{
    use HasFactory;

    // Campos que podem ser preenchidos em massa (mass assignment)
    protected $fillable = [
        'nome',
        'cpf',
        'telefone',
        'email',
        'cargo',
        'salario',
        'data_admissao',
    ];


    // Acessor para formatar o CPF ao exibir (ex: 123.456.789-00)
    public function getCpfFormatadoAttribute()
    {
        // Remove qualquer caractere que não seja número
        $cpf = preg_replace('/\D/', '', $this->cpf);

        // Se o CPF não tiver 11 dígitos, retorna o valor original
        if (strlen($cpf) !== 11) {
            return $this->cpf;
        }

        // Formata o CPF no padrão brasileiro
        return substr($cpf, 0, 3) . '.' .
            substr($cpf, 3, 3) . '.' .
            substr($cpf, 6, 3) . '-' .
            substr($cpf, 9, 2);
    }

    // Acessor para formatar o telefone ao exibir
    public function getTelefoneFormatadoAttribute()
    {
        // Remove qualquer caractere que não seja número
        $telefone = preg_replace('/\D/', '', $this->telefone);
        $length = strlen($telefone);

        // Formato para telefone fixo: (xx) xxxx-xxxx
        if ($length === 10) {
            return '(' . substr($telefone, 0, 2) . ') ' .
                substr($telefone, 2, 4) . '-' .
                substr($telefone, 6, 4);
        }
        // Formato para celular: (xx) xxxxx-xxxx
        elseif ($length === 11) {
            return '(' . substr($telefone, 0, 2) . ') ' .
                substr($telefone, 2, 5) . '-' .
                substr($telefone, 7, 4);
        }

        // Se não for 10 nem 11 dígitos, retorna o valor original
        return $this->telefone;
    }
}
