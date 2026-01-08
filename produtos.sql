-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/01/2026 às 16:35
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `serenatto`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(90) NOT NULL,
  `imagem` varchar(80) NOT NULL,
  `preco` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `tipo`, `nome`, `descricao`, `imagem`, `preco`) VALUES
(1, 'Café', 'Café Cremoso', 'Café cremoso irresistivelmente suave e que envolve seu paladar', 'cafe-cremoso.jpg', 5.00),
(3, 'Café', 'Cappuccino', 'Café suave, leite cremoso e uma pitada de sabor adocicado', 'cappuccino.jpg', 7.00),
(4, 'Café', 'Café Gelado', 'Café gelado refrescante, adoçado e com notas sutis de baunilha ou caramelo.', '', 3.00),
(5, 'Almoço', 'Bife', 'Bife, arroz com feijão e uma deliciosa batata frita', 'bife.jpg', 27.90),
(6, 'Almoço', 'Filé de peixe', 'Filé de peixe salmão assado, arroz, feijão verde e tomate.', 'prato-peixe.jpg', 24.99),
(7, 'Almoço', 'Frango', 'Saboroso frango à milanesa com batatas fritas, salada de repolho e molho picante', 'prato-frango.jpg', 23.00),
(9, 'Café', 'Café Teste', 'Descrição teste', '', 5.00),
(10, 'Café', 'Café', 'Maneiro', '695c598662d97download.jpg', 2.50);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
