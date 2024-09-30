<?php 
session_start();
if(!isset($_SESSION['logado'])) {
    header("Location: ./login.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Compras</title>
</head>
<body>
    
</body>
</html>