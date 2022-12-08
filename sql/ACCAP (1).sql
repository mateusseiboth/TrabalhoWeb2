-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: lamp-mysql-1
-- Tempo de geração: 08-Dez-2022 às 21:44
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ACCAP`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `declaracao`
--

CREATE TABLE `declaracao` (
  `id` int NOT NULL,
  `nome` varchar(50) NOT NULL,
  `usuario_id` int NOT NULL,
  `empresa_id` int NOT NULL,
  `tipoID` int NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `declaracao`
--

INSERT INTO `declaracao` (`id`, `nome`, `usuario_id`, `empresa_id`, `tipoID`, `data_cadastro`) VALUES
(12, 'Outubro', 6, 11, 7, '2022-10-16 23:59:10'),
(13, 'Janeiro', 6, 11, 7, '2022-10-27 23:28:47'),
(14, 'Fevereiro', 6, 12, 9, '2022-12-03 13:05:03'),
(15, 'Março', 6, 12, 8, '2022-12-03 15:51:12'),
(16, 'Setembro', 6, 15, 8, '2022-12-03 15:51:35'),
(17, 'Fevereiro', 6, 17, 8, '2022-12-06 21:24:09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `declara` varchar(50) NOT NULL,
  `CNPJ` varchar(20) DEFAULT NULL,
  `userCadastro` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `nome`, `email`, `telefone`, `ativo`, `declara`, `CNPJ`, `userCadastro`) VALUES
(11, 'Lívia Tech', 'livia@tech.com', '765765765765', 1, 'DAS, Federal', '00000000001', NULL),
(12, 'RYMTech', 'rym@oseu.com.br', '67999999999', 1, 'DAS, Federal', '35803810000160', NULL),
(13, 'Teste', 'teste@sim.com', '79837363', 1, 'DAS', '646464664', NULL),
(14, 'Empresa', 'empresa@empresa.com', '67676767676676', 1, 'Municipal', '7848743743787834', NULL),
(15, 'mateus', 'teste@ewds.com', '6464646464', 1, 'Municipal', '8838838383', NULL),
(16, 'Junior ben10 carros', 'juniorben10@yahoo.com.br', '67989547514', 1, 'DAS, Municipal', '45345355335345', NULL),
(17, 'Site nota 10', 'nota10@osshiro.com.br', '78999999999', 1, 'DAS, Federal', '78547898995474', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoDeclaracao`
--

CREATE TABLE `tipoDeclaracao` (
  `id` int NOT NULL,
  `nome` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tipoDeclaracao`
--

INSERT INTO `tipoDeclaracao` (`id`, `nome`) VALUES
(7, 'DAS'),
(8, 'Municipal'),
(9, 'Federal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nivel` int NOT NULL,
  `imagem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `senha`, `nivel`, `imagem`) VALUES
(6, 'teste', 'teste', 1, ''),
(7, 'Jucilene', '12345', 0, ''),
(8, 'ricardo', 'queridao', 1, '02d11fbe626b17476c57f7f2fac983c62cec1727.png'),
(9, 'Osshiro', 'nota10', 1, '44e19defb8d5b523b5470d32bde8789e6f89daf0.jpg'),
(10, 'fsdf', 'fff', 1, '3192243237db61cc6b059d48c7ed975c5aef37ba.png');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `declaracao`
--
ALTER TABLE `declaracao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UsuarioDeclara` (`usuario_id`),
  ADD KEY `EmpresaDeclara` (`empresa_id`),
  ADD KEY `DeclaracaoTipo` (`tipoID`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CNPJ` (`CNPJ`),
  ADD KEY `userCadastro` (`userCadastro`);

--
-- Índices para tabela `tipoDeclaracao`
--
ALTER TABLE `tipoDeclaracao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `declaracao`
--
ALTER TABLE `declaracao`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `tipoDeclaracao`
--
ALTER TABLE `tipoDeclaracao`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `declaracao`
--
ALTER TABLE `declaracao`
  ADD CONSTRAINT `DeclaracaoTipo` FOREIGN KEY (`tipoID`) REFERENCES `tipoDeclaracao` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `EmpresaDeclara` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `UsuarioDeclara` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`userCadastro`) REFERENCES `usuario` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
