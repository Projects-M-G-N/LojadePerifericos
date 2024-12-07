<?php
session_start();

// $con = mysqli_connect('localhost', 'root', 'usbw', 'loja_perifericos');
$con = mysqli_connect('localhost', 'root', '', 'loja_perifericos');

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
    <title>Produtos: <?= $pes ?></title>
</head>

<body>

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