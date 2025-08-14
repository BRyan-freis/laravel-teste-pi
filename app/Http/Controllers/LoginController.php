<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Corrigido de Login para Auth

class LoginController extends Controller
{
    // Exibe o formulário de login
    public function showLoginForm()
    {
        return view('login'); // [login.blade.php](http://_vscodecontentref_/1)
    }

    // Processa o login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) { // Corrigido de Login para Auth
            $request->session()->regenerate();
            return redirect()->intended('/area-usuario'); // ou route('area.usuario')
        }

        return back()->withErrors([
            'email' => 'Email ou senha incorretos.',
        ])->withInput();
    }

    // Faz logout
    public function logout(Request $request)
    {
        Auth::logout(); // Corrigido de Login para Auth

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
