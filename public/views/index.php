<?php
$con = mysqli_connect('localhost', 'root', '', 'loja_perifericos');

$categorias = "SELECT * FROM categorias";
$resultado = mysqli_query($con, $categorias);

$categoria = mysqli_fetch_all($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/assets/css/inicio.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
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
                    <li><a href="logout.php">Sair</a></li>
                <?php } ?>
                <li><a href="./compras.php">Histórico de Compras</a></li>

            </ul>
            <div class="header-search-container">
                <input type="search" class="header-search" placeholder="Buscar produtos...">
                <i class="fas fa-search search-icon"></i>
            </div>
        </nav>
    </header>

    <section class="filter">
        <h2>Filtrar por Categoria</h2>
        <ul class="filter-list">
            <?php for ($i = 0; $i < mysqli_num_rows($resultado); $i++) { ?>
                <li><a href="./produtos.php&produto=<?= $categoria[$i][1] ?>"><?= $categoria[$i][1] ?></a></li>
            <?php } ?>
        </ul>
    </section>

    <section class="products">
        <h2>Produtos destaque</h2>
        <div class="product-grid">
            <?php for ($i = 0; $i < mysqli_num_rows($resultado); $i++) { ?>
                <?php
                $id_categoria = $categoria[$i][0];
                $produto_query = "SELECT * FROM produtos WHERE categoria='$id_categoria' LIMIT 1";
                $produtos = mysqli_query($con, $produto_query);
                $produto = mysqli_fetch_all($produtos);
                for ($j = 0; $j < mysqli_num_rows($produtos); $j++) {
                ?>
                    <div class="product-card">
                        <img src="public/assets/img/<?= $produto[$j][4] ?>" alt="<?= $produto[$j][1] ?>">
                        <h3><?= $produto[$j][1] ?></h3>
                        <p>R$ <?= number_format($produto[$j][3], 2, ',', '.') ?></p>
                        <div class="rating">
                            <span class="star">&#9733;</span>
                            <span class="star">&#9733;</span>
                            <span class="star">&#9733;</span>
                            <span class="star">&#9733;</span>
                            <span class="star">&#9734;</span>
                        </div>
                        <button onclick="window.location.href='./addProd.php&idProd=<?= $produto[$j][0] ?>'">Comprar</button>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </section>

    <footer>
        <p>&copy; 2023 Loja de Periféricos. Todos os direitos reservados.</p>
        <div class="social-media">
            <a href="#" aria-label="Facebook">Facebook</a>
            <a href="#" aria-label="Twitter">Twitter</a>
            <a href="#" aria-label="Instagram">Instagram</a>
        </div>
    </footer>
</body>

</html>