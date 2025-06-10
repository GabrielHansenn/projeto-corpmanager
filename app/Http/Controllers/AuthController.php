<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Exibe a página de registro
    public function register()
    {
        return view('auth/register');
    }

    // Processa o formulário de registro
    public function registerSave(Request $request)
    {
        // Valida os dados do formulário
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ])->validate();

        // Cria um novo usuário com os dados fornecidos
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Criptografa a senha
            'level' => 'Admin' // Define o nível do usuário como Admin
        ]);

        // Redireciona para a página de login após o registro
        return redirect()->route('login');
    }

    // Exibe a página de login
    public function login()
    {
        return view('auth/login');
    }

    // Processa o formulário de login
    public function loginAction(Request $request)
    {
        // Valida os dados do formulário
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        // Tenta autenticar o usuário com os dados fornecidos
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            // Se falhar, lança uma exceção de validação
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }

        // Gera uma nova sessão após login bem-sucedido
        $request->session()->regenerate();

        // Redireciona para o dashboard
        return redirect('/');
    }

    // Realiza o logout do usuário
    public function logout(Request $request)
    {
        Auth::guard('web')->logout(); // Desloga o usuário

        $request->session()->invalidate(); // Invalida a sessão atual

        return redirect('/'); // Redireciona para a página inicial
    }

    // Exibe a página de perfil do usuário
    public function profile()
    {
        return view('profile');
    }

    // Atualiza os dados do perfil do usuário
    public function profileUpdate(Request $request)
    {
        $user = auth()->user(); // Obtém o usuário autenticado

        // Valida os dados fornecidos com mensagens personalizadas
        $request->validate([
            'name' => 'required|string|max:50',
        ], [
            'name.required' => 'O nome é obrigatório.',
            'name.string' => 'O nome deve ser um texto.',
            'name.max' => 'O nome não pode ter mais que 50 caracteres.',
        ]);

        // Atualiza o nome do usuário
        $user->name = $request->name;
        $user->save();

        // Redireciona de volta com mensagem de sucesso
        return redirect()->route('profile')->with('success', 'Perfil atualizado com sucesso!');
    }

}
