<?php
if (isset($_GET['idProd'])) {
    if (isset($_COOKIE['produtos'])) {
        $strCarrinho = $_COOKIE['produtos'];
        $carrinho = unserialize($strCarrinho);
        array_push($carrinho, $_GET['idProd']);
        $strCarrinho = serialize($carrinho);
        setcookie("produtos", $strCarrinho, time()+360000);
    } else {
        $carrinho = [$_GET['idProd']];
        $strCarrinho = serialize($carrinho);
        setcookie("produtos", $strCarrinho, time()+360000);
    }
}

echo "<script>window.location.href = './'</script>";