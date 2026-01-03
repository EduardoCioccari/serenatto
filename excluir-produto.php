<?php

require "src/db-conexao.php";
require "src/Modelos/Produto.php";
require "src/Repositorio/ProdutosRepositorio.php";

$produtoRepositorio = new ProdutosRepositorio($conexao);
$produtoRepositorio->deletar($_POST["id"]);

// Redirecionando para home admin.
header("Location: admin.php");
