<?php

class ProdutosRepositorio
{
    private PDO $conexao;

    public function __construct(PDO $conexao)
    {
        $this->conexao = $conexao;
    }

    // Método para criar objeto produto a partir da class Produto.
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

    // Método para consultar categoria café e retorna um array objeto dos cafés
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

    // Método para consultar categoria almoço e retorna um array objeto dos almoços.
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

    // Método para consultar todos os produtos e retorna um array objeto de todos produtos.
    public function buscarTodosProduto()
    {
        $sql = "SELECT * FROM produtos ORDER BY preco";
        $stmt = $this->conexao->query($sql);
        $dados = $stmt->fetchAll(pdo::FETCH_ASSOC);

        $todosOsDados = array_map(
            function ($produto) {
                return $this->formarObjeto($produto);
            },
            $dados
        );

        return $todosOsDados;
    }
}
