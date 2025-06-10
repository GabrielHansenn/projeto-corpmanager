@extends('layouts.app')

@section('title', 'Dados do Funcionário')

@section('contents')
<hr />
<a href="{{ route('funcionarios.index') }}" class="btn btn-secondary mb-3">Voltar à Lista de Funcionários</a>

{{-- Exibe todos os erros em um alerta (opcional) --}}
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

<form action="{{ route('funcionarios.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" placeholder="Nome"
            value="{{ old('nome') }}" required>
        @error('nome')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <input type="text" name="cpf" class="form-control cpf @error('cpf') is-invalid @enderror" placeholder="CPF"
            value="{{ old('cpf') }}" required>
        @error('cpf')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <input type="text" name="telefone" class="form-control telefone @error('telefone') is-invalid @enderror"
            placeholder="Telefone" value="{{ old('telefone') }}" required>
        @error('telefone')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email"
            value="{{ old('email') }}" required>
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <input type="text" name="cargo" class="form-control @error('cargo') is-invalid @enderror" placeholder="Cargo"
            value="{{ old('cargo') }}" required>
        @error('cargo')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <input type="number" name="salario" class="form-control @error('salario') is-invalid @enderror"
            placeholder="Salário" value="{{ old('salario') }}" required>
        @error('salario')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <input type="date" name="data_admissao" class="form-control @error('data_admissao') is-invalid @enderror"
            value="{{ old('data_admissao') }}">
        @error('data_admissao')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="row">
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<!-- jQuery (necessário para a máscara) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- jQuery Mask Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
    $(document).ready(function () {
        $('.cpf').mask('000.000.000-00');
        $('.telefone').mask('(00) 00000-0000');
    });

    $('form').on('submit', function () {
        // Remove máscara do CPF
        let cpf = $('.cpf').val();
        cpf = cpf.replace(/\D/g, '');
        $('.cpf').val(cpf);

        // Remove máscara do telefone
        let telefone = $('.telefone').val();
        telefone = telefone.replace(/\D/g, '');
        $('.telefone').val(telefone);
    });
</script>
@endsection