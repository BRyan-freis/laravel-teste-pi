<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroController; // Importe seu controller

// Rota para exibir o formulário de cadastro
Route::get('/cadastro', [CadastroController::class, 'create'])->name('cadastro.create');

// Rota para processar o formulário de cadastro
Route::post('/cadastro', [CadastroController::class, 'store'])->name('cadastro.store');

Route::get('/cadastro', function (){
    return view('cadastro'); // Crie um arquivo cadastro.blade.php se precisar
});

// Rota para exibir a página de termos de serviço
Route::get('/termos-de-servico', function () {
    return view('termos-de-servico'); // Crie um arquivo termos-de-servico.blade.php se precisar
});

// A rota '/' pode ser a home.blade.php agora
Route::get('/', function () {
    return view('home'); // <<-- Sugiro que a home seja a '/'
})->name('home'); // Nomeie a rota home para facilitar o acesso em links

// Rota para a home (pode ser redundante se a '/' já for a home)
Route::get('/home', function () {
    return redirect()->route('home'); // Redireciona para a rota nomeada '/'
});

Route::get('/area-user', function () {
    return redirect()->route('area-user'); // Redireciona para a rota nomeada '/'
});

Route::get('/area', function () {
    return view('area-user'); // <<-- Sugiro que a home seja a '/'
})->name('area-user'); // Nomeie a rota home para facilitar o acesso em links

Route::get('/sobre', function () {
    return redirect()->route('sobre'); // Redireciona para a rota nomeada '/'
});

Route::get('/sobre', function () {
    return view('sobre'); // <<-- Sugiro que a home seja a '/'
})->name('sobre'); // Nomeie a rota home para facilitar o acesso em links, 


Route::get('/perfil', function () {
    return redirect()->route('perfil'); // Redireciona para a rota nomeada '/'
});

Route::get('/perfil', function () {
    return view('perfil'); // <<-- Sugiro que a home seja a '/'
})->name('perfil'); // Nomeie a rota home para facilitar o acesso em links

Route::get('/login', function () {
    return redirect()->route('login'); // Redireciona para a rota nomeada '/'
});

Route::get('/login', function () {
    return view('login'); // <<-- Sugiro que a home seja a '/'
})->name('login'); // Nomeie a rota home para facilitar o acesso em links

Route::get('/recuperacao', function () {
    return redirect()->route('recuperacao'); // Redireciona para a rota nomeada '/'
});

Route::get('/recuperacao', function () {
    return view('recuperacao'); // <<-- Sugiro que a home seja a '/'
})->name('recuperacao'); // Nomeie a rota home para facilitar o acesso em links

// Se você não for usar o sistema de autenticação padrão do Laravel (Breeze/Jetstream)
// e vai gerenciar usuários apenas pela tabela 'usuarios', você pode *remover* ou comentar
// as rotas de autenticação padrão do Breeze/Jetstream, pois elas ainda apontariam para o Model User
// e a tabela users.
// require __DIR__.'/auth.php'; // Comente ou remova esta linha se não precisar mais.