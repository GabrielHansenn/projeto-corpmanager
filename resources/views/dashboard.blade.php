@extends('layouts.app')

@section('title', 'Lista Funcionários')

@section('contents')

    <!-- Campo de busca responsivo -->
    <form method="GET" action="{{ route('dashboard') }}" class="row gy-2 gx-3 align-items-center mb-3">
        <div class="col-12 col-md-10">
            <input type="text" name="search" class="form-control" placeholder="Buscar por nome, CPF ou cargo"
                value="{{ request('search') }}">
        </div>
        <div class="col-12 col-md-2">
            <button type="submit" class="btn btn-primary w-100">Buscar</button>
        </div>
    </form>

    <!-- Botão gerar PDF -->
    <form action="{{ route('funcionarios.gerar-pdf') }}" method="GET">
        <div class="mb-4">
            <button type="submit" class="btn btn-danger">
                Gerar PDF
            </button>
        </div>

        <!-- Lista de funcionários responsiva -->
        <div class="table-responsive" style="overflow-x: auto;">
            <table class="table table-bordered align-middle table-hover" style="white-space: nowrap;">
                <thead class="table-light">
                    <tr>
                        <th class="text-nowrap">Nome</th>
                        <th class="text-nowrap">CPF</th>
                        <th class="text-nowrap">Telefone</th>
                        <th class="text-nowrap">Email</th>
                        <th class="text-nowrap">Cargo</th>
                        <th class="text-nowrap">Salário</th>
                        <th class="text-nowrap">Data de Admissão</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($funcionarios as $funcionario)
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
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Nenhum funcionário encontrado.</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    @endsection
