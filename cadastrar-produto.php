<?php
require "src/db-conexao.php";
require "src/Modelos/Produto.php";
require "src/Repositorio/ProdutosRepositorio.php";

// Pegando os parâmetros dos inputs para cadastro se for clicado no submit de cadastro.
if (isset($_POST["cadastro"])) {
    $produto = new Produto(
        null, // Passando id como null.
        $_POST["tipo"],
        $_POST["nome"],
        $_POST["descricao"],
        $_POST["preco"],
    );

    // Fluxo para salvar a imagem.
    if (isset($_FILES["imagem"])) {
        $produto->setImagem(uniqid() . $_FILES["imagem"]["name"]); // Chamando método da imagem do objeto para mandar os dados juntos + novo nome para imagem.
        move_uploaded_file($_FILES["imagem"]["tmp_name"], $produto->getImagemDiretorio()); // Movendo arquivo do local temporário para o caminho de imagens do projeto.
    }

    // Salvando no banco de dados o cadastro.
    $produtoRepositorio = new ProdutosRepositorio($conexao);
    $produtoRepositorio->salvar($produto);

    // Redirecionando para index.
    header("Location: admin.php");
}

?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Serenatto - Cadastrar Produto</title>
</head>

<body>
    <main>
        <section class="container-admin-banner">
            <img src="img/logo-serenatto-horizontal.png" class="logo-admin" alt="logo-serenatto">
            <h1>Cadastro de Produtos</h1>
            <img class="ornaments" src="img/ornaments-coffee.png" alt="ornaments">
        </section>
        <section class="container-form">
            <form method="post" enctype="multipart/form-data"> <!-- enctype.. é para o form aceitar + do que textos. Neste caso, quero enviar imagem -->

                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" placeholder="Digite o nome do produto" required>
                <div class="container-radio">
                    <div>
                        <label for="cafe">Café</label>
                        <input type="radio" id="cafe" name="tipo" value="Café" checked>
                    </div>
                    <div>
                        <label for="almoco">Almoço</label>
                        <input type="radio" id="almoco" name="tipo" value="Almoço">
                    </div>
                </div>
                <label for="descricao">Descrição</label>
                <input type="text" id="descricao" name="descricao" placeholder="Digite uma descrição" required>

                <label for="preco">Preço</label>
                <input type="text" id="preco" name="preco" placeholder="Digite uma descrição" required>

                <label for="imagem">Envie uma imagem do produto</label>
                <input type="file" name="imagem" accept="image/*" id="imagem" placeholder="Envie uma imagem">

                <input type="submit" name="cadastro" class="botao-cadastrar" value="Cadastrar produto" />
            </form>

        </section>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/index.js"></script>
</body>

</html>