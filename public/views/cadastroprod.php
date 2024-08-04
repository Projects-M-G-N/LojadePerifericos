<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" href="public/assets/css/cadastroprod.css">
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
                        <input type="text" id="categoria" name="categoria" required placeholder="Digite a categoria do produto">
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
