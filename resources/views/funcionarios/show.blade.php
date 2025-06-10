@extends('layouts.app')

@section('title', 'Detalhes do Funcionário')

@section('contents')
    <hr />

    <a href="{{ route('funcionarios.index') }}" class="btn btn-secondary mb-3">Voltar à Lista de Funcionários</a>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $funcionario->id }}</td>
                </tr>
                <tr>
                    <th>Nome</th>
                    <td>{{ $funcionario->nome }}</td>
                </tr>
                <tr>
                    <th>CPF</th>
                    <td>{{ $funcionario->cpf_formatado }}</td>
                </tr>
                <tr>
                    <th>Telefone</th>
                    <td>{{ $funcionario->telefone_formatado }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $funcionario->email }}</td>
                </tr>
                <tr>
                    <th>Cargo</th>
                    <td>{{ $funcionario->cargo }}</td>
                </tr>
                <tr>
                    <th>Salário</th>
                    <td>R$ {{ number_format($funcionario->salario, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Data de Criação</th>
                    <td>{{ $funcionario->created_at->format('d/m/Y H:i') }}</td>
                </tr>
                <tr>
                    <th>Última Atualização</th>
                    <td>{{ $funcionario->updated_at->format('d/m/Y H:i') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
