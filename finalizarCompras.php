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
    <link rel="stylesheet" href="./assets/css/fimcompra.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
<header>
        <nav>
            <ul class="nav-links">
                <a href="index.php">Voltar ao Inicio</a>
            </ul>
            <div class="header-search-container">
                <input type="search" class="header-search" placeholder="Buscar produtos..." oninput="pesquisar(this.value)">
                <i class="fas fa-search search-icon" onclick="pesquisar(document.querySelector('header-serach').value)"></i>
                <div class="header-search-result">
                    
                </div>
            </div>
        </nav>
    </header>
    <h1>Sua compra foi finalizada com sucesso! por favor, aguarde a entrega.</h1>
    <footer>
        <p>&copy; 2023 Loja de Periféricos. Todos os direitos reservados.</p>
        <div class="social-media">
            <a href="#" aria-label="Facebook">Facebook</a>
            <a href="#" aria-label="Twitter">Twitter</a>
            <a href="#" aria-label="Instagram">Instagram</a>
        </div>
    </footer>
    <script src="./assets/js/pesquisa.js"></script>

</body>

</html>