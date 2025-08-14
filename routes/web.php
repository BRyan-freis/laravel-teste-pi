<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\LoginController; // Corrigido: importação do LoginController

// Cadastro
Route::get('/cadastro', [CadastroController::class, 'create'])->name('cadastro.create');
Route::post('/cadastro', [CadastroController::class, 'store'])->name('cadastro.store');

// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Home
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return redirect()->route('home');
});

// Termos de Serviço
Route::get('/termos-de-servico', function () {
    return view('termos-de-servico');
})->name('termos');

// Área do usuário (protegida)
Route::middleware('auth')->group(function () { // Corrigido: middleware 'auth'
    Route::get('/area-usuario', function () {
        return view('area-user');
    })->name('area.usuario');

    Route::get('/area', function () {
        return redirect()->route('area.usuario');
    })->name('area-user');
});

// Sobre
Route::get('/sobre', function () {
    return view('sobre');
})->name('sobre');

// Perfil
Route::get('/perfil', function () {
    return view('perfil');
})->name('perfil');

// Recuperação
Route::get('/recuperacao', function () {
    return view('recuperacao');
})->name('recuperacao');

// Redefinição
Route::get('/redefinicao', function () {
    return view('redefinicao');
})->name('redefinicao');

// Remova ou comente se não usar autenticação padrão
// require __DIR__.'/auth.php';