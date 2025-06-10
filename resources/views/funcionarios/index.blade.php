@extends('layouts.app')

@section('title', 'Gerenciar Funcionários')

@section('contents')
    <hr />

    <a href="{{ route('funcionarios.create') }}" class="btn btn-success mb-3">Adicionar Funcionário</a>

    <form method="GET" action="{{ route('funcionarios.index') }}" class="row gy-2 gx-3 align-items-center mb-3">
        <div class="col-12 col-md-10">
            <input type="text" name="search" class="form-control" placeholder="Buscar por nome, CPF ou email"
                value="{{ request('search') }}">
        </div>
        <div class="col-12 col-md-2">
            <button type="submit" class="btn btn-primary w-100">Buscar</button>
        </div>
    </form>


    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($funcionarios as $funcionario)
                    <tr>
                        <td class="no-wrap">{{ $funcionario->id }}</td>
                        <td class="no-wrap">{{ $funcionario->nome }}</td>
                        <td class="no-wrap">{{ $funcionario->cpf_formatado }}</td>
                        <td class="no-wrap">{{ $funcionario->telefone_formatado }}</td>
                        <td class="no-wrap">{{ $funcionario->email }}</td>


                        <td class="no-wrap">
                            <a href="{{ route('funcionarios.show', $funcionario->id) }}" class="btn btn-info btn-sm">Mais
                                Detalhes</a>
                            <a href="{{ route('funcionarios.edit', $funcionario->id) }}"
                                class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('funcionarios.destroy', $funcionario->id) }}" method="POST"
                                style="display:inline-block" onsubmit="return confirm('Tem certeza que deseja apagar?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Apagar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">Nenhum funcionário encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection


<style>
    /* Evita quebra de linha */
    .no-wrap {
        white-space: nowrap;
    }

    /* Para os botões na coluna ações */
    td .d-flex>* {
        white-space: nowrap;
    }
</style>