<?php

session_start();

if (!isset($_GET['produto'])) {
    echo "<script>window.location.href='./'</script>";
}

$con = mysqli_connect('localhost', 'root', 'usbw', 'loja_perifericos');

$categoria = $_GET['produto'];

$categorias = mysqli_fetch_all(mysqli_query($con, "SELECT id FROM categorias WHERE nome='$categoria' LIMIT 1"));

$id_categoria = $categorias[0][0];

$produto = mysqli_query($con, "SELECT * FROM produtos WHERE categoria='$id_categoria'");

$produtos = mysqli_fetch_all($produto);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_GET['produto'] ?></title>
    <link rel="stylesheet" href="./assets/css/produtos.css">
    <title>Loja de Periféricos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <header>
        <nav>
            <ul class="nav-links">
                <?php if (!isset($_SESSION['logado'])) { ?>
                    <li><a href="login.php">Entrar</a></li>
                    <li><a href="cadastro.php">Cadastrar</a></li>
                <?php } else { ?>
                    <li><a href="cadastroprod.php">Cadastrar Produtos</a></li>
                <?php } ?>
                <li><a href="./compras.php">Minhas Compras</a></li>
                <li><a href="index.php">Voltar</a></li>

            </ul>
            <div class="header-search-container">
                <input type="search" class="header-search" placeholder="Buscar produtos...">
                <i class="fas fa-search search-icon"></i>
            </div>
        </nav>
    </header>

    <section class="products">
        <h2><?= $categoria ?></h2>

        <div class="product-grid">
            <?php
            for ($i = 0; $i < mysqli_num_rows($produto); $i++) {
            ?>
                <div class="product-card">
                    <img src="./assets/img/<?= $produtos[$i][4] ?>" alt="<?= $produtos[$i][1] ?>">
                    <h3><?= $produtos[$i][1] ?></h3>
                    <p>R$ <?= number_format($produtos[$i][3], 2, ',', '.') ?></p>
                    <div class="rating">
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                        <span class="star">&#9734;</span>
                    </div>
                    <button onclick="window.location.href='./addProd.php?idProd=<?= $produtos[$i][0] ?>'">Comprar</button>
                </div>
            <?php } ?>
        </div>
    </section>
</body>

</html>