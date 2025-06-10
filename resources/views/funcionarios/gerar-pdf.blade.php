<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Funcionários</title>
    <style>

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            margin: 0 auto;
            font-size: 10px;
            /* reduzido */
        }

        th,
        td {
            border: 1px solid #000;
            padding: 4px 6px;
            /* reduzido */
            white-space: nowrap;
        }

        th {
            background-color: #f0f0f0;
        }
    </style>
</head>

<body>
    <h2>Funcionários</h2>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Cargo</th>
                <th>Salário</th>
                <th>Data de Admissão</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($funcionarios as $funcionario)
                <tr>
                    <td>{{ $funcionario->nome }}</td>
                    <td>{{ $funcionario->cpf_formatado }}</td>
                    <td>{{ $funcionario->telefone_formatado }}</td>
                    <td>{{ $funcionario->email }}</td>
                    <td>{{ $funcionario->cargo }}</td>
                    <td>R$ {{ number_format($funcionario->salario, 2, ',', '.') }}</td>
                    <td>
                        {{ $funcionario->data_admissao ? \Carbon\Carbon::parse($funcionario->data_admissao)->format('d/m/Y') : '-' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>