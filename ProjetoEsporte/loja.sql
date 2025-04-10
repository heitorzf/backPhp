-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 10/04/2025 às 22h18min
-- Versão do Servidor: 5.5.20
-- Versão do PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `codigo` int(5) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`codigo`, `nome`) VALUES
(1, 'Tenis');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `codigo` int(5) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`codigo`, `nome`) VALUES
(1, 'Puma'),
(2, 'Nike'),
(3, 'Adidas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `codigo` int(5) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  `cor` varchar(50) NOT NULL,
  `tamanho` varchar(10) NOT NULL,
  `preco` float(10,2) NOT NULL,
  `codcategoria` int(5) NOT NULL,
  `codtipo` int(5) NOT NULL,
  `codmarca` int(5) NOT NULL,
  `foto1` varchar(100) NOT NULL,
  `foto2` varchar(100) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codmarca` (`codmarca`),
  KEY `codcategoria` (`codcategoria`),
  KEY `codtipo` (`codtipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`codigo`, `descricao`, `cor`, `tamanho`, `preco`, `codcategoria`, `codtipo`, `codmarca`, `foto1`, `foto2`) VALUES
(1, 'um tenis da  puma muito elegante', 'branco', '38', 499.00, 1, 1, 1, '9a5ea91b8bea372678d23541924a81ce', '8175c848dedae451f5ecc5c09d906d28'),
(3, 'um tenis da  puma muito elegante', 'branco', '38', 499.00, 1, 1, 1, '0fdaef970cf82426dd99e4711c4b9b4b', '7eb258d60e95eea25ad19d8020b7237b'),
(4, 'um tenis da  puma muito elegante', 'branco', '38', 499.00, 1, 1, 1, '400f88c53ecc4261fa7039bc07efdfc6', '66c5953c4ef118e0e1ac7c50ffb27c0c'),
(5, 'um tenis da  puma muito elegante', 'branco', '38', 499.00, 1, 1, 1, '5ba18dc9f6e95643dafaab7ca7373570', '3d24317c5628f2f336c14575f1f422db'),
(6, 'um tenis da  puma muito elegante', 'branco', '38', 499.00, 1, 1, 1, 'a82a97e3008284adf0ef675159aeb218', '01fa93850afb9f18011d94ac72bcb655');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `codigo` int(5) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`codigo`, `nome`) VALUES
(1, 'Bota');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `codigo` int(5) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`codigo`, `nome`, `senha`) VALUES
(1, 'hector', 'lontra');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`codcategoria`) REFERENCES `categoria` (`codigo`),
  ADD CONSTRAINT `produto_ibfk_2` FOREIGN KEY (`codtipo`) REFERENCES `tipo` (`codigo`),
  ADD CONSTRAINT `produto_ibfk_3` FOREIGN KEY (`codmarca`) REFERENCES `marca` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
