<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FuncionariosController;

Route::get('/', function () {
    return view('welcome');
});

// routes/web.php

Route::get('/', function () {
    return view('welcome'); // ou sua view inicial
})->name('home');


// Rotas de autenticação
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

// Rotas protegidas
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [FuncionariosController::class, 'dashboard'])->name('dashboard');


    // CRUD de Funcionários
    Route::prefix('funcionarios')->name('funcionarios.')->controller(FuncionariosController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('{id}', 'show')->name('show');
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::put('{id}', 'update')->name('update');
        Route::delete('{id}', 'destroy')->name('destroy');
    });


    // Gerar PDF de Funcionários
    Route::get('gerar-pdf-funcionarios', [FuncionariosController::class, 'gerarPdf'])->name('funcionarios.gerar-pdf');

    // Perfil do usuário
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::post('/profile', [AuthController::class, 'profileUpdate'])->name('profile.update');

});
