<?php

session_start();

if (empty($_GET['url'])) {
    $url = 'index.php';
} else {
    $url = $_GET['url'];
}

require('./views/' . $url);

$con = mysqli_connect('localhost', 'root', '', 'loja_perifericos');

if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $senha = $_POST['password'];
    $query = "SELECT * FROM clientes WHERE email='$email' AND senha='$senha'";
    $comando = mysqli_query($con, $query);
    if(mysqli_num_rows($comando) == 0) {
        echo "<script>alert('Usuario não existente')</script>";
    } else {
        $_SESSION['logado'] = true;
        echo "<script>window.location.href = './'</script>";
    }
}

if(isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $endereco = $_POST['endereco'];
    $query = "SELECT * FROM clientes WHERE email='$email'";
    $comando = mysqli_query($con, $query);
    if(mysqli_num_rows($comando) == 0) {
        $cad = "INSERT INTO clientes VALUES (NULL, '$nome', '$email', '$senha', '$endereco')";
        mysqli_query($con, $cad);
        $_SESSION['logado'] = true;
        echo "<script>window.location.href = './'</script>";
    } else {
        echo "<script>alert('Usuario já existente')</script>";
    }
}

if (isset($_POST['cadastrarProduto'])) {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $categoria = $_POST['categoria'];
    $imagem = $_FILES['imagem']['name'];
    $novo_nome_do_arquivo = uniqid();
    $extensao = strtolower(pathinfo($imagem, PATHINFO_EXTENSION));
    $img_nome = $novo_nome_do_arquivo . "." .  $extensao;
    move_uploaded_file($_FILES['imagem']['tmp_name'], "../public/assets/img/" . $img_nome);
    $descricao = $_POST['descricao'];

    $produto = "INSERT INTO produtos VALUES (NULL, '$nome', '$descricao', '$preco', '$img_nome', '$categoria')";
    $comando = mysqli_query($con, $produto);

    echo "<script>window.location.href = './'</script>";
}
