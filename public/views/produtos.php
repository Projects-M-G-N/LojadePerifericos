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
</head>
<body>
</body>
</html>