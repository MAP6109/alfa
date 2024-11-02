<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar - Devolução de EPIs</title>
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
            background-color: #00aaff;
            color: rgb(216, 214, 221);
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-bottom: 10px;
        }
        button:hover {
            background-color: #0088cc;
        }
        .login-button {
            background-color: #1b0ab5;
        }
        .login-button:hover {
            background-color: #061a9b;
        }
    </style>
</head>
<body>

    <form id="registerForm" method="POST" action="{{ route('register') }}">
        @csrf
        <h1>Registrar</h1>
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" placeholder="Digite seu nome" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Digite seu email" required>

        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" placeholder="Digite sua senha" required>

        <label for="password_confirmation">Confirme a Senha:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirme sua senha" required>

        <button type="submit">Registrar</button>
        <button type="button" class="login-button" onclick="window.location.href='{{ route('login') }}'">Voltar para Login</button>
    </form>

    <script>
        document.getElementById('registerForm').addEventListener('submit', function(event) {
            event.preventDefault(); 
            
            // Envia o formulário manualmente
            fetch('{{ route('register') }}', {
                method: 'POST',
                body: new FormData(this),
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            })
            .then(response => {
                if (response.ok) {
                    alert('Usuário cadastrado com sucesso');
                    window.location.href = '{{ route('login') }}'; // Redirecionar para a tela de login
                } else {
                    // Trata erros de validação ou outros problemas
                    alert('Ocorreu um erro ao cadastrar o usuário');
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                alert('Ocorreu um erro ao cadastrar o usuário');
            });
        });
    </script>

</body>
</html>
