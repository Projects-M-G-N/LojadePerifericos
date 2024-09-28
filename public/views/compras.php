<?php

$con = mysqli_connect('localhost', 'root', '', 'loja_perifericos');

$produtos = unserialize($_COOKIE['produtos']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico de Compras</title>
    <link rel="stylesheet" href="public/assets/css/compras.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <header>
        <nav>
            <ul class="nav-links">
                <li><a href="./index.php">Loja de Periféricos</a></li>
                <?php if (!isset($_SESSION['logado'])) { ?>
                    <li><a href="login.php">Entrar</a></li>
                    <li><a href="cadastro.php">Cadastrar</a></li>
                <?php } else { ?>
                    <li><a href="cadastroprod.php">Cadastrar Produtos</a></li>
                    <li><a href="logout.php">Sair</a></li>
                <?php } ?>
            </ul>
            <div class="header-search-container">
                <input type="search" class="header-search" placeholder="Buscar produtos...">
                <i class="fas fa-search search-icon"></i>
            </div>
        </nav>
    </header>

    <?php
    $data_compra = date('d/m/Y');
    ?>

    <div class="container">
        <h1>Histórico de Compras</h1>
        <div class="product-list">
            <?php foreach ($produtos as $produto) {
                $prod = mysqli_fetch_all(mysqli_query($con, "SELECT * FROM produtos WHERE id='$produto'"));
            ?>
            <div class="product-card">
                <i class="fas fa-check-circle purchased"></i>
                <img src="public/assets/img/<?= $prod[0][4] ?>" alt="<?= $prod[0][1] ?>">
                <div class="product-details">
                    <div class="product-info">
                        <h3><?= $prod[0][1] ?></h3>
                        <p class="purchase-info">Comprado em: <?= $data_compra ?></p>
                        <p class="product-price">R$ <?= number_format($prod[0][3], 2, ',', '.') ?></p>
                    </div>
                    <a href="./index.php" class="buy-again-btn">Comprar Novamente</a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

</body>

</html>