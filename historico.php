<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: ./login.php");
} else {
    include "conexao.php";
    $email = $_SESSION['email'];
    $id_cliente = mysqli_fetch_all(mysqli_query($con, "SELECT id FROM clientes WHERE email='$email'"))[0][0];
    $query = "SELECT id_produto, data_compra FROM compras WHERE id_cliente='$id_cliente'";
    $resultado = mysqli_query($con, $query);
    $produtos = mysqli_fetch_all($resultado);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico de Compras</title>
    <link rel="stylesheet" href="./assets/css/compras.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

    <header>
        <nav>
            <ul class="nav-links">
                <li><a href="./index.php">Loja de Periféricos</a></li>
                <li><a href="cadastroprod.php">Cadastrar Produtos</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
            <div class="header-search-container">
                <input type="search" class="header-search" placeholder="Buscar produtos..." oninput="pesquisar(this.value)">
                <i class="fas fa-search search-icon" onclick="pesquisar(document.querySelector('header-serach').value)"></i>
                <div class="header-search-result">
                    
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <h1>Lista de Produtos Comprado</h1>
        <div class="product-list">
            <?php
            if (mysqli_num_rows($resultado) > 0) {
                foreach ($produtos as $produto) {
                    $prod = mysqli_fetch_all(mysqli_query($con, "SELECT * FROM produtos WHERE id='" . $produto[0] ."'"));
            ?>
                    <div class="product-card">
                        <i class="fas fa-check-circle purchased"></i>
                        <img src="./assets/img/<?= $prod[0][4] ?>" alt="<?= $prod[0][1] ?>">
                        <div class="product-details">
                            <div class="product-info">
                                <h3><?= $prod[0][1] ?></h3>
                                <p class="purchase-info">comprado em: <?= $produto[1] ?></p>
                                <p class="product-price">R$ <?= number_format($prod[0][3], 2, ',', '.') ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <h2>Nenhum Produto comprado</h2>
            <?php } ?>
        </div>
    </div>

    <script src="./assets/js/pesquisa.js"></script>
</body>

</html>