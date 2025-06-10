@extends('layouts.app')

@section('title', 'Editar Funcionário')

@section('contents')
    <hr />
    <a href="{{ route('funcionarios.index') }}" class="btn btn-secondary mb-3">Voltar à Lista de Funcionários</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Erros encontrados:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('funcionarios.update', $funcionarios->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror"
                    value="{{ old('nome', $funcionarios->nome) }}" placeholder="Nome">
                @error('nome')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col mb-3">
                <label class="form-label">CPF</label>
                <input type="text" name="cpf" class="form-control @error('cpf') is-invalid @enderror"
                    value="{{ old('cpf', $funcionarios->cpf) }}" placeholder="CPF">
                @error('cpf')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Telefone</label>
                <input type="text" name="telefone" class="form-control @error('telefone') is-invalid @enderror"
                    value="{{ old('telefone', $funcionarios->telefone) }}" placeholder="Telefone">
                @error('telefone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email', $funcionarios->email) }}" placeholder="Email">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Cargo</label>
                <input type="text" name="cargo" class="form-control @error('cargo') is-invalid @enderror"
                    value="{{ old('cargo', $funcionarios->cargo) }}" placeholder="Cargo">
                @error('cargo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col mb-3">
                <label class="form-label">Salário</label>
                <input type="number" name="salario" step="0.01" min="0"
                    class="form-control @error('salario') is-invalid @enderror"
                    value="{{ old('salario', $funcionarios->salario) }}" placeholder="Salário">
                @error('salario')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col mb-3">
                <label class="form-label">Data de Admissão</label>
                <input type="date" name="data_admissao" class="form-control @error('data_admissao') is-invalid @enderror"
                    value="{{ old('data_admissao', $funcionarios->data_admissao ? \Carbon\Carbon::parse($funcionarios->data_admissao)->format('Y-m-d') : '') }}">
                @error('data_admissao')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-warning">Atualizar</button>
        </div>
    </form>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function () {
            $('input[name="cpf"]').mask('000.000.000-00');
            $('input[name="telefone"]').mask('(00) 00000-0000');
        });
    </script>
@endpush