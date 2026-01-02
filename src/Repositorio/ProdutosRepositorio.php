<?php

class ProdutosRepositorio
{
    private PDO $conexao;

    public function __construct(PDO $conexao)
    {
        $this->conexao = $conexao;
    }

    public function formarObjeto($dados)
    {
        return new Produto(
            $dados["id"],
            $dados["tipo"],
            $dados["nome"],
            $dados["descricao"],
            $dados["imagem"],
            $dados["preco"],
        );
    }

    public function opcoesCafe(): array
    {

        $sqlCafe = "SELECT * FROM produtos WHERE tipo = 'Café' ORDER BY preco";
        $stmt = $this->conexao->query($sqlCafe);
        $produtosCafe = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $dadosCafe = array_map(
            function ($cafe) {
                return $this->formarObjeto($cafe);
            },
            $produtosCafe
        );

        return $dadosCafe;
    }

    public function opcoesAlmoco(): array
    {
        $sqlAlmoco = "SELECT * FROM produtos WHERE tipo = 'Almoco' ORDER BY preco";
        $stmt = $this->conexao->query($sqlAlmoco);
        $produtosAlmoco = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $dadosAlmoco = array_map(
            function ($almoco) {
                return $this->formarObjeto($almoco);
            },
            $produtosAlmoco
        );

        return $dadosAlmoco;
    }
}
