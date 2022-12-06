-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: lamp-mysql-1
-- Generation Time: Dec 06, 2022 at 09:36 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ACCAP`
--

-- --------------------------------------------------------

--
-- Table structure for table `declaracao`
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
-- Dumping data for table `declaracao`
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
-- Table structure for table `empresa`
--

CREATE TABLE `empresa` (
  `id` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `declara` varchar(50) NOT NULL,
  `CNPJ` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `empresa`
--

INSERT INTO `empresa` (`id`, `nome`, `email`, `telefone`, `ativo`, `declara`, `CNPJ`) VALUES
(11, 'Lívia Tech', 'livia@tech.com', '765765765765', 1, 'DAS, Federal', '00000000001'),
(12, 'RYMTech', 'rym@oseu.com.br', '67999999999', 1, 'DAS, Federal', '35803810000160'),
(13, 'Teste', 'teste@sim.com', '79837363', 1, 'DAS', '646464664'),
(14, 'Empresa', 'empresa@empresa.com', '67676767676676', 1, 'Municipal', '7848743743787834'),
(15, 'mateus', 'teste@ewds.com', '6464646464', 1, 'Municipal', '8838838383'),
(16, 'Junior ben10 carros', 'juniorben10@yahoo.com.br', '67989547514', 1, 'DAS, Municipal', '45345355335345'),
(17, 'Site nota 10', 'nota10@osshiro.com.br', '78999999999', 1, 'DAS, Federal', '78547898995474');

-- --------------------------------------------------------

--
-- Table structure for table `tipoDeclaracao`
--

CREATE TABLE `tipoDeclaracao` (
  `id` int NOT NULL,
  `nome` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tipoDeclaracao`
--

INSERT INTO `tipoDeclaracao` (`id`, `nome`) VALUES
(7, 'DAS'),
(8, 'Municipal'),
(9, 'Federal');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nivel` int NOT NULL,
  `imagem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `senha`, `nivel`, `imagem`) VALUES
(6, 'teste', 'teste', 1, ''),
(7, 'Jucilene', '12345', 0, ''),
(8, 'ricardo', 'queridao', 1, '02d11fbe626b17476c57f7f2fac983c62cec1727.png'),
(9, 'Osshiro', 'nota10', 1, '44e19defb8d5b523b5470d32bde8789e6f89daf0.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `declaracao`
--
ALTER TABLE `declaracao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UsuarioDeclara` (`usuario_id`),
  ADD KEY `EmpresaDeclara` (`empresa_id`),
  ADD KEY `DeclaracaoTipo` (`tipoID`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CNPJ` (`CNPJ`);

--
-- Indexes for table `tipoDeclaracao`
--
ALTER TABLE `tipoDeclaracao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `declaracao`
--
ALTER TABLE `declaracao`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tipoDeclaracao`
--
ALTER TABLE `tipoDeclaracao`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `declaracao`
--
ALTER TABLE `declaracao`
  ADD CONSTRAINT `DeclaracaoTipo` FOREIGN KEY (`tipoID`) REFERENCES `tipoDeclaracao` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `EmpresaDeclara` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `UsuarioDeclara` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
