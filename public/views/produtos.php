<?php 

if(!isset($_GET['produto'])) {
    echo "<script>window.location.href='./'</script>";
}

$produto = $_GET['produto'];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_GET['produto']?></title>
    <link rel="stylesheet" href="public/assets/css/produtos.css">
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
                    <li><a href="#">Histórico de Compras</a></li>
                <?php } ?>
                <li><a href="index.php">Voltar</a></li>

            </ul>
            <div class="header-search-container">
                <input type="search" class="header-search" placeholder="Buscar produtos...">
                <i class="fas fa-search search-icon"></i>
            </div>
        </nav>
    </header>

    <section class="products">
        <h2><?= $produto?></h2>
    </section>
</body>
</html>