<?php 
$con = mysqli_connect('localhost', 'root', 'usbw', 'loja_perifericos');

$categorias = "SELECT * FROM categorias";
$resultado = mysqli_query($con, $categorias);

$categoria = mysqli_fetch_all($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" href="./assets/css/cadastroprod.css">
</head>
<body>
    <div class="container">
        <div class="container-cadastro">
            <h2>Cadastro de Produtos</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="grupo-formulario">
                    <div class="input-wrapper">
                        <label for="nome">Nome do Produto</label>
                        <input type="text" id="nome" name="nome" required placeholder="Digite o nome do produto">
                    </div>
                    <div class="input-wrapper">
                        <label for="preco">Preço</label>
                        <input type="number" step="0.01" id="preco" name="preco" required placeholder="Digite o preço do produto">
                    </div>
                    <div class="input-wrapper">
                        <label for="categoria">Categoria</label>
                        <select id="categoria" name="categoria" required>
                            <option value="" disabled selected>Selecione a categoria</option>
                            <?php for ($i=0; $i < mysqli_num_rows($resultado); $i++) { ?>
                                <option value="<?= $categoria[$i][0]?>"><?= $categoria[$i][1]?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="input-wrapper">
                        <label for="imagem">Imagem do Produto</label>
                        <input type="file" id="imagem" name="imagem" accept="image/*" placeholder="Escolha uma imagem">
                    </div>
                    <div class="input-wrapper full-width">
                        <label for="descricao">Descrição</label>
                        <textarea id="descricao" name="descricao" required placeholder="Digite a descrição do produto"></textarea>
                    </div>
                </div>
                <button type="submit" name="cadastrarProduto">Cadastrar</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php 
if (isset($_POST['cadastrarProduto'])) {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $categoria = $_POST['categoria'];
    $imagem = $_FILES['imagem']['name'];
    $novo_nome_do_arquivo = uniqid();
    $extensao = strtolower(pathinfo($imagem, PATHINFO_EXTENSION));
    $img_nome = $novo_nome_do_arquivo . "." .  $extensao;
    move_uploaded_file($_FILES['imagem']['tmp_name'], ".././assets/img/" . $img_nome);
    $descricao = $_POST['descricao'];

    $produto = "INSERT INTO produtos VALUES (NULL, '$nome', '$descricao', '$preco', '$img_nome', '$categoria')";
    $comando = mysqli_query($con, $produto);

    echo "<script>window.location.href = './'</script>";
}

?>
