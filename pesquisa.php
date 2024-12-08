<?php
session_start();

include "conexao.php";

$pes = $_GET['search'];

$query = "SELECT produtos.* FROM produtos, categorias WHERE categorias.id=produtos.categoria AND (produtos.nome LIKE '%$pes%' OR produtos.descricao LIKE '%$pes%' OR categorias.nome LIKE '%$pes%')";

$resultado = mysqli_query($con, $query);

$produtos = mysqli_fetch_all($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/inicio.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Produtos: <?= $pes ?></title>
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
                    <li><a href="historico.php">Histórico de Compras</a></li>
                    <li><a href="logout.php">Sair</a></li>
                <?php } ?>
                <li><a href="./compras.php">Carrinho</a></li>
            </ul>
            <div class="dropdown">
                <button class="dropbtn">Categorias <i class="fas fa-chevron-down"></i></button>
                <div class="dropdown-content">
                    <?php for ($i = 0; $i < mysqli_num_rows($resultado); $i++) { ?>
                        <a href="./produtos.php?produto=<?= $categoria[$i][1] ?>"><?= $categoria[$i][1] ?></a>
                    <?php } ?>
                </div>
            </div>
            <div class="header-search-container">
                <input type="search" class="header-search" placeholder="Buscar produtos..." oninput="pesquisar(this.value)">
                <i class="fas fa-search search-icon" onclick="pesquisar(document.querySelector('header-serach').value)"></i>
                <div class="header-search-result">

                </div>
            </div>
        </nav>
    </header>

    <section class="products">

        <div class="product-grid">
            <?php
            for ($j = 0; $j < mysqli_num_rows($resultado); $j++) {
            ?>
                <div class="product-card">
                    <img src="./assets/img/<?= $produtos[$j][4] ?>" alt="<?= $produtos[$j][1] ?>">
                    <h3><?= $produtos[$j][1] ?></h3>
                    <p>R$ <?= number_format($produtos[$j][3], 2, ',', '.') ?></p>
                    <div class="rating">
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                        <span class="star">&#9734;</span>
                    </div>
                    <button onclick="window.location.href='./addProd.php?idProd=<?= $produtos[$j][0] ?>'">Comprar</button>
                </div>
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