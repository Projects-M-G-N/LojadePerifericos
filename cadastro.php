<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
    <link rel="stylesheet" href="css/cadastro.css">
</head>
<body>
    <div class="container">
        <div class="container-cadastro">
            <h2>Cadastro de Clientes</h2>
            <form action="processa_cadastro.php" method="post">
                <div class="grupo-formulario">
                    <div class="input-wrapper">
                        <label for="nome">Nome Completo</label>
                        <input type="text" id="nome" name="nome" required>
                    </div>
                    <div class="input-wrapper">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="input-wrapper">
                        <label for="senha">Senha</label>
                        <input type="password" id="senha" name="senha" required>
                    </div>
                    <div class="input-wrapper">
                        <label for="endereco">Endereço</label>
                        <input type="text" id="endereco" name="endereco" required>
                    </div>
                </div>
                <button type="submit">Cadastrar</button>
            </form>
            <p>Já tem uma conta? <a href="login.php">Faça login</a></p>
        </div>
    </div>
</body>
</html>
