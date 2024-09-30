<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
    <link rel="stylesheet" href="./assets/css/cadastro.css">
</head>
<body>
    <div class="container">
        <div class="container-cadastro">
            <h2>Cadastro de Clientes</h2>
            <form action="" method="post">
                <div class="grupo-formulario">
                    <div class="input-wrapper">
                        <label for="nome">Nome Completo</label>
                        <input type="text" id="nome" name="nome" required placeholder="Digite seu nome completo">
                    </div>
                    <div class="input-wrapper">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" required placeholder="Digite seu e-mail">
                    </div>
                    <div class="input-wrapper">
                        <label for="senha">Senha</label>
                        <input type="password" id="senha" name="senha" required placeholder="Digite sua senha">
                    </div>
                    <div class="input-wrapper">
                        <label for="endereco">Endereço</label>
                        <input type="text" id="endereco" name="endereco" required placeholder="Digite seu endereço">
                    </div>
                </div>
                <button type="submit" name="cadastrar">Cadastrar</button>
            </form>
            <p>Já tem uma conta? <a href="login.php">Faça login</a></p>
        </div>
    </div>
</body>
</html>

<?php 
session_start();

$con = mysqli_connect('localhost', 'root', 'usbw', 'loja_perifericos');
if(isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $endereco = $_POST['endereco'];
    $query = "SELECT * FROM clientes WHERE email='$email'";
    $comando = mysqli_query($con, $query);
    if(mysqli_num_rows($comando) == 0) {
        $cad = "INSERT INTO clientes VALUES (NULL, '$nome', '$email', '$senha', '$endereco')";
        mysqli_query($con, $cad);
        $_SESSION['logado'] = true;
        echo "<script>window.location.href = './'</script>";
    } else {
        echo "<script>alert('Usuario já existente')</script>";
    }
}

?>
