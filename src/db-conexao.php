<?php

$pdo = "mysql:host=localhost;dbname=serenatto";
$usuario = "root";
$senha = "";

try {
    $conexao = new PDO($pdo, $usuario, $senha);

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {

    echo "Erro de conexão no banco de dados: " . $e->getMessage();
}
