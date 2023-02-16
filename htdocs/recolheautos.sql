-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql103.epizy.com
-- Tempo de geração: 12/11/2019 às 12:19
-- Versão do servidor: 5.6.45-86.1
-- Versão do PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `epiz_24457579_recolheauto`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `solicita_redefinir`
--

CREATE TABLE `solicita_redefinir` (
  `id` int(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `hash` varchar(200) NOT NULL,
  `status` int(20) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `cd_usuario` smallint(4) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `login` varchar(30) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `usrnivel` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Estrutura para tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `cd_veiculo` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cor` varchar(20) NOT NULL,
  `placa` varchar(15) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `endereco` varchar(200) NOT NULL,
  `numero` int(10) DEFAULT NULL,
  `bairro` varchar(60) NOT NULL,
  `cidade` varchar(70) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `veiculo`
--

INSERT INTO `veiculo` (`cd_veiculo`, `usuario`, `marca`, `nome`, `cor`, `placa`, `cep`, `endereco`, `numero`, `bairro`, `cidade`, `estado`, `status`) VALUES
(2, 'igor', 'VOLKSWAGEN', 'GOL GT', 'VERMELHO', 'NSD-7225', '09854130', 'Rua Elizabeth Lobo Garcia', 100, 'Alvarenga', 'SÃ£o Bernardo do Campo', 'SP', 1),
(3, 'teste', 'VOLKSWAGEN', 'GOLF GTI', 'BRANCO', 'EBC-7123', '09852100', 'Rua JoÃ£o Antonio Butrico', 30, 'Cooperativa', 'SÃ£o Bernardo do Campo', 'SP', 1),
(4, 'ricardo', 'FIAT', 'PALIO', 'AZUL', 'DME-1234', '09781370', 'Rua Alfredo Scarpelli', 14, 'Santa Terezinha', 'SÃ£o Bernardo do Campo', 'SP', 1),
(9, 'igor', 'FORD', 'FOCUS RS', 'BRANCO', 'NZD-2256', '09854-130', 'Rua Elizabeth Lobo Garcia', 100, 'Alvarenga', 'SÃ£o Bernardo do Campo', 'SP', 1),
(14, 'igor', 'FORD', 'FIESTA 2009', 'PRATA', 'NSB-8621', '09854-130', 'Rua Elizabeth Lobo Garcia', 20, 'Alvarenga', 'SÃ£o Bernardo do Campo', 'SP', 1),
(16, 'igor', 'FORD', 'FUSION', 'PRATA', 'NNA-5533', '09854-130', 'Rua Elizabeth Lobo Garcia', 11, 'Alvarenga', 'SÃ£o Bernardo do Campo', 'SP', 0),
(20, 'igor', 'FORD', 'FUSION', 'VERMELHO', 'NNX-2488', '09854-130', 'Rua Elizabeth Lobo Garcia', 236, 'Alvarenga', 'SÃ£o Bernardo do Campo', 'SP', 1),
(21, 'eu', 'VOLKSWAGEN', 'BRASÃ­LIA', 'AMARELA', 'ABC-0102', '09831-425', 'Estrada do Rio Acima', 1343, 'Dos Finco', 'SÃ£o Bernardo do Campo', 'SP', 0),
(22, 'cid', 'CHEVROLET', 'CORSA 2009', 'PRATA', 'CVE-2923', '09854-110', 'Rua Xapuri', 90, 'Alvarenga', 'SÃ£o Bernardo do Campo', 'SP', 0),
(23, 'ricardo', 'CHEVROLET', 'CELTA', 'PRATA', 'QWE-1234', '09715-350', 'Rua Wenceslau BrÃ¡s', 150, 'Centro', 'SÃ£o Bernardo do Campo', 'SP', 0),
(24, 'igor', 'VOLKSWAGEN', 'FUSCA', 'AMARELO', 'JBF-9879', '', 'Rua Teste', 100, 'Teste', 'SÃ£o Bernardo do Campo', 'SP', 0);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `solicita_redefinir`
--
ALTER TABLE `solicita_redefinir`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cd_usuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Índices de tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`cd_veiculo`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `solicita_redefinir`
--
ALTER TABLE `solicita_redefinir`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cd_usuario` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `veiculo`
--
ALTER TABLE `veiculo`
  MODIFY `cd_veiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
