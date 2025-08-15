<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Conexus</title>
    <link rel="stylesheet" href="{{ asset('CSS/styles-login.css') }}"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1 class="logo">C<span class="logo-o">o</span>nexus</h1>
            <h2>Bem-vindo de volta!</h2>
            <p>Acesse sua conta para continuar.</p>
            @if ($errors->any())
                <div class="error-message">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
              @if(session('error'))
                <p style="color: red">{{ session('error') }}</p>
            @endif

            <!-- Forms -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="seu.email@exemplo.com" required>
                </div>

                <div class="input-group">
                    <label for="password">Senha</label>
                    <input type="password" id="password" name="password" placeholder="Digite sua senha" required>
                </div>

                <div class="options-group">
                    <div class="checkbox-group">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Manter-me conectado</label>
                    </div>
                    <a href="{{ route('recuperacao') }}" class="forgot-password">Esqueci a senha</a>
                </div>

                <button type="submit" class="submit-btn">Entrar</button>
            </form>
             <p class="login-link">Não tem uma conta? <a href="{{ route('cadastro.create') }}">Cadastre-se</a></p>
        </div>
    </div>
</body>
</html>