<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroController; // Importe seu controller

// Rota para exibir o formulário de cadastro
Route::get('/cadastro', [CadastroController::class, 'create'])->name('cadastro.create');

// Rota para processar o formulário de cadastro
Route::post('/cadastro', [CadastroController::class, 'store'])->name('cadastro.store');

// Rota para exibir a página de termos de serviço
Route::get('/termos-de-servico', function () {
    return view('termos-de-servico'); // Crie um arquivo termos-de-servico.blade.php se precisar
});

// A rota '/' pode ser a home.blade.php agora
Route::get('/', function () {
    return view('home'); 
})->name('home'); // Nomeie a rota home para facilitar o acesso em links

// Rota para a home (pode ser redundante se a '/' já for a home)
Route::get('/home', function () {
    return redirect()->route('home'); // Redireciona para a rota nomeada '/'
});

Route::get('/area-user', function () {
    return redirect()->route('area-user'); 
});

Route::get('/area', function () {
    return view('area-user'); 
})->name('area-user'); 

Route::get('/sobre', function () {
    return redirect()->route('sobre');
});

Route::get('/sobre', function () {
    return view('sobre'); 
})->name('sobre'); 

Route::get('/perfil', function () {
    return redirect()->route('perfil');
});

Route::get('/perfil', function () {
    return view('perfil'); 
})->name('perfil'); 

// Route::get('/login', function () {
//     return redirect()->route('acessarlogin');
// });

// Route::get('/login', function () {
//     return view('login'); 
// })->name('acessarlogin'); 

Route::get('/login', function (){
    return redirect()->route('/login');
});

Route::get('/recuperacao', function () {
    return redirect()->route('recuperacao');
});

Route::get('/recuperacao', function () {
    return view('recuperacao'); 
})->name('recuperacao'); 

// Se você não for usar o sistema de autenticação padrão do Laravel (Breeze/Jetstream)
// e vai gerenciar usuários apenas pela tabela 'usuarios', você pode *remover* ou comentar
// as rotas de autenticação padrão do Breeze/Jetstream, pois elas ainda apontariam para o Model User
// e a tabela users.
// require __DIR__.'/auth.php'; // Comente ou remova esta linha se não precisar mais.