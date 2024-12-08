<?php 
header('Content-Type: application/json');

$texto = filter_input(INPUT_GET, 'texto', FILTER_DEFAULT);

include "../conexao.php";

$query = "SELECT produtos.nome FROM produtos, categorias WHERE categorias.id=produtos.categoria AND (produtos.nome LIKE '%$texto%' OR produtos.descricao LIKE '%$texto%' OR categorias.nome LIKE '%$texto%')";

$produtos = mysqli_query($con, $query);

$data = mysqli_fetch_all($produtos);

echo json_encode($data)
?>