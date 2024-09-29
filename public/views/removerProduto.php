<?php

if (isset($_COOKIE['produtos'])) {
    if (isset($_GET['indexProd'])) {
        $produtos = unserialize($_COOKIE['produtos']);
        if ((count($produtos) - 1) == 0) {
            setcookie("produtos");
        } else {
            array_splice($produtos, $_GET['indexProd'], 1);
            $produtosCompras = serialize($produtos);
            setcookie("produtos", $produtosCompras);
        }
        header("Location: ./compras.php");
    } else {
        header("Location: ./");
    }
} else {
    header("Location: ./");
}
