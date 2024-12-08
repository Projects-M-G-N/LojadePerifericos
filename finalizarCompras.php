<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: ./login.php");
} else {
    if (!isset($_COOKIE['produtos'])) {
        header("Location: ./");
        die();
    }
    include "conexao.php";
    $produtos = unserialize($_COOKIE['produtos']);
    setcookie("produtos", "");
    $email = $_SESSION['email'];
    $id_cliente = mysqli_fetch_all(mysqli_query($con, "SELECT id FROM clientes WHERE email='$email'"))[0][0];
    $data_compra = date("Y-m-d H:i:s");

    foreach ($produtos as $produto) {
        $query = "INSERT INTO compras VALUES (NULL, '$id_cliente', '$produto', '$data_compra')";
        $exec = mysqli_query($con, $query);
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Compras</title>
</head>

<body>

    <h1>Sua compra foi finalizada com sucesso!</h1>
    <h2>Por favor, aguarde a entrega.</h2>

</body>

</html>