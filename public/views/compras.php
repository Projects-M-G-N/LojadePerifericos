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
</head>

<body>

    <?php
    foreach ($produtos as $produto) {
        $prod = mysqli_fetch_all(mysqli_query($con, "SELECT * FROM produtos WHERE id='$produto'"));
    ?>
        <div class="product-card">
            <img src="public/assets/img/<?= $prod[0][4] ?>" alt="<?= $prod[0][1] ?>">
            <h3><?= $prod[0][1] ?></h3>
            <p>R$ <?= number_format($prod[0][3], 2, ',', '.') ?></p>
        </div>
    <?php
    }
    ?>

</body>

</html>