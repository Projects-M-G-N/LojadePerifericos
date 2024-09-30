<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/css/login.css">
</head>
<body>
    <div class="conteiner">
        <div class="caixa-login">
            <h2>Login</h2>
            <form action="" method="post">
                <div class="grupo-formulario">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" required placeholder="Digite seu e-mail">
                </div>
                <div class="grupo-formulario">
                    <label for="password">Senha:</label>
                    <input type="password" id="password" name="password" required placeholder="Digite sua senha">
                </div>
                <button type="submit" name="login">Login</button>
                <p>Ainda não tem uma conta? <a href="cadastro.php">Registre-se agora</a></p>
            </form>
        </div>
    </div>
</body>
</html>

<?php 

session_start();

$con = mysqli_connect('localhost', 'root', 'usbw', 'loja_perifericos');

if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $senha = $_POST['password'];
    $query = "SELECT * FROM clientes WHERE email='$email' AND senha='$senha'";
    $comando = mysqli_query($con, $query);
    if(mysqli_num_rows($comando) == 0) {
        echo "<script>alert('Usuario não existente')</script>";
    } else {
        $_SESSION['logado'] = true;
        echo "<script>window.location.href = './'</script>";
    }
}

?>