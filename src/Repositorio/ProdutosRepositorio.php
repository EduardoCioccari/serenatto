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
            $dados["preco"],
            $dados["imagem"],
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
    public function buscarTodosProdutos()
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

    // Método para excluir produto.
    public function deletar(INT $id)
    {
        $sql = "DELETE FROM produtos WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        // Mandando como parâmetro para variável sql o ID do produto para exclusão.
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }

    // Método para salvar cadastro no banco de dados.
    public function salvar(Produto $produto)
    {
        $sql = "INSERT INTO produtos (tipo, nome, descricao, preco, imagem) VALUES (?, ?, ?, ?, ?)"; // Vou passar os dados depois do prepare.
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $produto->getTipo());
        $stmt->bindValue(2, $produto->getNome());
        $stmt->bindValue(3, $produto->getDescricao());
        $stmt->bindValue(4, $produto->getPreco());
        $stmt->bindValue(5, $produto->getImagem());
        $stmt->execute();
    }

    // Método capturar o id do produto para o form de edição.
    public function buscar(INT $id)
    {
        $sql = "SELECT * FROM produtos WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

        return $this->formarObjeto($dados);
    }

    // Método para atualizar os dados do cadastro no arquivo editar-produto.
    public function atualizar(Produto $produto)
    {
        $sql = "UPDATE produtos SET tipo = ?, nome = ?, descricao = ?, preco = ?, imagem = ? WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $produto->getTipo());
        $stmt->bindValue(2, $produto->getNome());
        $stmt->bindValue(3, $produto->getDescricao());
        $stmt->bindValue(4, $produto->getPreco());
        $stmt->bindValue(5, $produto->getId());
        $stmt->execute();

        // Só atualizará o valor da img no banco se for diferente do que defini como padrão.
        if($produto->getImagem() !== 'logo-serenatto.png'){  
            $this->atualizarFoto($produto);
        }
    }

    // Método usado no if para imagem no método atualizar.
    private function atualizarFoto(Produto $produto)
    {
        $sql = "UPDATE produtos SET imagem = ? WHERE id = ?";
        $statement = $this->conexao->prepare($sql);
        $statement->bindValue(1, $produto->getImagem());
        $statement->bindValue(2, $produto->getId());
        $statement->execute();
    }
}
