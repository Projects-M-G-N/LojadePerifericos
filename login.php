<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="conteiner">
        <div class="caixa-login">
            <h2>Login</h2>
            <form action="login_action.php" method="post">
                <div class="grupo-formulario">
                    <label for="username">Nome de usuário:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="grupo-formulario">
                    <label for="password">Senha:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Login</button>
                <p>Ainda não tem uma conta? <a href="cadastro.php">Registre-se agora</a></p>
            </form>
        </div>
    </div>
</body>
</html>
