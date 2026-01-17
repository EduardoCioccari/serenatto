<?php

require "src/db-conexao.php";
require "src/Modelos/Produto.php";
require "src/Repositorio/ProdutosRepositorio.php";

$produtosRepositorio = new ProdutosRepositorio($conexao);
$produtos = $produtosRepositorio->buscarTodosProdutos();
?>

<style>
    table {
        width: 90%;
        margin: auto 0;
    }

    table,
    th,
    td {
        border: 1px solid #000;
    }

    table th {
        padding: 11px 0 11px;
        font-weight: bold;
        font-size: 18px;
        text-align: left;
        padding: 8px;
    }

    table tr {
        border: 1px solid #000;
    }

    table td {
        font-size: 18px;
        padding: 8px;
    }

    .container-admin-banner h1 {
        margin-top: 40px;
        font-size: 30px;
    }
</style>

<table>
    <thead>
        <tr>
            <th>Produto</th>
            <th>Tipo</th>
            <th>Descricão</th>
            <th>Valor</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($produtos as $produto) { ?>
            <tr>
                <td><?php echo $produto->getNome() ?></td>
                <td><?php echo $produto->getTipo() ?></td>
                <td><?php echo $produto->getDescricao() ?></td>
                <td><?php echo $produto->getPrecoFormatado() ?></td>
            <?php } ?>
    </tbody>
</table>