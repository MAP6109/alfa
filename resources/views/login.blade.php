<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login - Devolução de EPIs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #3c3c41;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form {
            background: #595656;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(7, 34, 238, 0.495);
            width: 300px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #d3d3da;
            border-radius: 5px;
        }
        button {
            background-color: #1b0ab5;
            color: rgb(216, 214, 221);
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-bottom: 10px;
        }
        button:hover {
            background-color: #061a9b;
        }
        .register-button {
            background-color: #00aaff;
        }
        .register-button:hover {
            background-color: #0088cc;
        }
    </style>
</head>
<body>

    <form id="loginForm" method="POST" action="{{ route('login') }}">
        @csrf
        <h1>AlfaID</h1>
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username" placeholder="Digite seu usuário" required>

        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" placeholder="Digite sua senha" required>

        <button type="submit">Entrar</button>
        <br>
        <button type="button" class="register-button" onclick="window.location.href='{{ route('register') }}'">Registrar</button>
    </form>

</body>
</html>
