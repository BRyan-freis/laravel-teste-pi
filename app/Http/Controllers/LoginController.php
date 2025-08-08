<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Login;

class LoginController extends Controller
{
     // Exibe o formulário de login
    public function showLoginForm()
    {
        return view('login'); // resources/views/login.blade.php
    }
 
    // Processa o login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Login::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/area-user'); // ou route('area.usuario')
        }
 
        return back()->withErrors([
            'email' => 'Email ou senha incorretos.',
        ])->withInput();
    }
 
    // Faz logout
    public function logout(Request $request)
    {
        Login::logout();
 
        $request->session()->invalidate();
        $request->session()->regenerateToken();
 
        return redirect('/login');
    }
}
