<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use App\Models\Funcionarios;
use Illuminate\Validation\Rule;

class FuncionariosController extends Controller
{
    /**
     * Exibe uma lista dos funcionários.
     */
    // Removido método index duplicado para evitar erro de redeclaração.

    /**
     * Exibe o formulário para criar um funcionário .
     */
    public function create()
    {
        $funcionarios = Funcionarios::all();
        return view('funcionarios.create', compact('funcionarios'));
    }

    /**
     * Armazena um novo funcionário no armazenamento.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:funcionarios,cpf',
            'telefone' => 'required|string|max:15|unique:funcionarios,telefone',
            'email' => 'required|email|unique:funcionarios,email',
            'cargo' => 'required|string|max:55',
            'salario' => [
                'required',
                'numeric',
                'min:0',
                'regex:/^\d{1,8}(\.\d{1,2})?$/'
            ],
            'data_admissao' => 'required|date|before_or_equal:today',


        ], [
            'nome.required' => 'O nome é obrigatório.',
            'nome.string' => 'O nome deve ser um texto.',
            'nome.max' => 'O nome não pode ter mais que 255 caracteres.',

            'cpf.required' => 'O CPF é obrigatório.',
            'cpf.string' => 'O CPF deve ser um texto.',
            'cpf.max' => 'O CPF não pode ter mais que 14 caracteres.',
            'cpf.unique' => 'Este CPF já está cadastrado.',
            'cpf.regex' => 'O CPF deve estar no formato 000.000.000-00.',

            'telefone.required' => 'O telefone é obrigatório.',
            'telefone.string' => 'O telefone deve ser um texto.',
            'telefone.max' => 'O telefone não pode ter mais que 15 caracteres.',
            'telefone.unique' => 'Este telefone já está em uso.',

            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'O e-mail deve ser válido.',
            'email.unique' => 'Este e-mail já está em uso.',

            'cargo.required' => 'O cargo é obrigatório.',
            'cargo.string' => 'O cargo deve ser um texto.',
            'cargo.max' => 'O cargo não pode ter mais que 55 caracteres.',

            'salario.required' => 'O salário é obrigatório.',
            'salario.numeric' => 'O salário deve ser um número.',
            'salario.min' => 'O salário não pode ser negativo.',
            'salario.regex' => 'O salário deve conter no máximo 8 dígitos antes da vírgula e até 2 casas decimais.',

            'data_admissao.required' => 'A data de admissão é obrigatória.',
            'data_admissao.date' => 'A data de admissão deve ser uma data válida.',
            'data_admissao.before_or_equal' => 'A data de admissão não pode ser uma data futura.',

        ]);

        Funcionarios::create($request->all());

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário cadastrado com sucesso.');
    }


    /**
     * Exibe o funcionário especificado.
     */
    public function show(string $id)
    {
        $funcionario = Funcionarios::findOrFail($id);
        return view('funcionarios.show', compact('funcionario'));
    }

    /**
     * Exibe o formulário para editar o funcionário especificado.
     */
    public function edit(string $id)
    {
        $funcionarios = Funcionarios::findOrFail($id);

        return view('funcionarios.edit', compact('funcionarios'));
    }

    /**
     * Atualiza o funcionário especificado no armazenamento.
     */
    public function update(Request $request, string $id)
    {
        $funcionarios = Funcionarios::findOrFail($id);

        // Remover máscara (somente números) de CPF e telefone para validação consistente
        $request->merge([
            'cpf' => preg_replace('/\D/', '', $request->cpf),
            'telefone' => preg_replace('/\D/', '', $request->telefone),
        ]);

        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => [
                'required',
                'string',
                'max:14',
                Rule::unique('funcionarios', 'cpf')->ignore($funcionarios->id),
            ],
            'telefone' => [
                'required',
                'string',
                'max:15',
                Rule::unique('funcionarios', 'telefone')->ignore($funcionarios->id),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('funcionarios', 'email')->ignore($funcionarios->id),
            ],
            'cargo' => 'required|string|max:55',
            'salario' => [
                'required',
                'numeric',
                'min:0',
                'regex:/^\d{1,8}(\.\d{1,2})?$/'
            ],
            'data_admissao' => 'required|date|before_or_equal:today',



        ], [
            'nome.required' => 'O nome é obrigatório.',
            'nome.string' => 'O nome deve ser um texto.',
            'nome.max' => 'O nome não pode ter mais que 255 caracteres.',

            'cpf.required' => 'O CPF é obrigatório.',
            'cpf.string' => 'O CPF deve ser um texto.',
            'cpf.max' => 'O CPF não pode ter mais que 14 caracteres.',
            'cpf.unique' => 'Este CPF já está cadastrado.',

            'telefone.required' => 'O telefone é obrigatório.',
            'telefone.string' => 'O telefone deve ser um texto.',
            'telefone.max' => 'O telefone não pode ter mais que 15 caracteres.',
            'telefone.unique' => 'Este telefone já está em uso.',

            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'O e-mail deve ser válido.',
            'email.unique' => 'Este e-mail já está em uso.',

            'cargo.required' => 'O cargo é obrigatório.',
            'cargo.string' => 'O cargo deve ser um texto.',
            'cargo.max' => 'O cargo não pode ter mais que 55 caracteres.',

            'salario.required' => 'O salário é obrigatório.',
            'salario.numeric' => 'O salário deve ser um número.',
            'salario.min' => 'O salário não pode ser negativo.',
            'salario.regex' => 'O salário deve ter no máximo 8 dígitos antes da vírgula e até 2 casas decimais.',


            'data_admissao.required' => 'A data de admissão é obrigatória.',
            'data_admissao.date' => 'A data de admissão deve ser uma data válida.',
            'data_admissao.before_or_equal' => 'A data de admissão não pode ser uma data futura.',


        ]);

        // Atualiza os dados do funcionário
        $funcionarios->update($request->all());

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário atualizado com sucesso');
    }

    /**
     * Remove o funcionário especificado do armazenamento.
     */
    public function destroy(string $id)
    {
        $funcionarios = Funcionarios::findOrFail($id);

        $funcionarios->delete();

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário deletado com sucesso');
    }

    public function dashboard(Request $request)
    {
        $search = $request->input('search');

        $query = Funcionarios::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nome', 'like', "%$search%")
                    ->orWhere('cpf', 'like', "%$search%")
                    ->orWhere('cargo', 'like', "%$search%");
            });
        }

        $funcionarios = $query->orderBy('nome')->get();

        return view('dashboard', compact('funcionarios'));
    }




    public function gerarPdf(Request $request)
    {
        $query = Funcionarios::query();
        $funcionarios = $query->orderByDesc('created_at')->get();

        $pdf = PDF::loadView('funcionarios.gerar-pdf', ['funcionarios' => $funcionarios])
            ->setPaper('a4', 'portrait');

        return $pdf->download('lista_funcionarios.pdf');
    }


    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Funcionarios::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nome', 'like', "%$search%")
                    ->orWhere('cpf', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
            });
        }

        $funcionarios = $query->orderBy('nome')->get();

        return view('funcionarios.index', compact('funcionarios'));
    }



}
