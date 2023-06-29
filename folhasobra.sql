-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 29-Jun-2023 às 12:19
-- Versão do servidor: 5.7.36
-- versão do PHP: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `folhasobra`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

DROP TABLE IF EXISTS `empresas`;
CREATE TABLE IF NOT EXISTS `empresas` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `designacao_social` varchar(50) DEFAULT NULL,
  `email` varchar(75) DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `nif` varchar(9) DEFAULT NULL,
  `morada` varchar(100) DEFAULT NULL,
  `codigo_postal` varchar(9) DEFAULT NULL,
  `localidade` varchar(50) DEFAULT NULL,
  `capital_social` int(13) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`id`, `designacao_social`, `email`, `telefone`, `nif`, `morada`, `codigo_postal`, `localidade`, `capital_social`) VALUES
(1, 'Wagner, Lda', 'geral@wagner.pt', '963758888', '999888777', 'R. Paulo VI, Loja3  ', '2410-146', 'Leiria', 3000000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `folhas`
--

DROP TABLE IF EXISTS `folhas`;
CREATE TABLE IF NOT EXISTS `folhas` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `valor_total` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iva_total` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(30) COLLATE utf8_unicode_ci DEFAULT 'em lançamento',
  `client_id` int(6) DEFAULT NULL,
  `user_id` int(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `folhas`
--

INSERT INTO `folhas` (`id`, `data`, `valor_total`, `iva_total`, `estado`, `client_id`, `user_id`) VALUES
(3, '2023-06-29 00:09:15', '73', '15.09', 'emitida', 2, 1),
(4, '2023-06-29 00:10:14', '92', '11.98', 'emitida', 3, 1),
(5, '2023-06-29 00:11:32', '155', '26.47', 'em lançamento', 4, 1),
(6, '2023-06-29 00:12:30', '222', '41.88', 'paga', 2, 1),
(7, '2023-06-29 00:53:17', '28', '6.44', 'paga', 3, 6),
(8, '2023-06-29 00:59:42', '87', '16.61', 'emitida', 4, 6),
(9, '2023-06-29 01:02:11', '109', '22.01', 'em lançamento', 2, 6),
(10, '2023-06-29 10:12:16', '60', '13.8', 'paga', 4, 1),
(11, '2023-06-29 11:34:31', '35', '3.65', 'paga', 9, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ivas`
--

DROP TABLE IF EXISTS `ivas`;
CREATE TABLE IF NOT EXISTS `ivas` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `percentagem` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `em_vigor` enum('ativado','desativado') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `ivas`
--

INSERT INTO `ivas` (`id`, `percentagem`, `descricao`, `em_vigor`) VALUES
(1, '23', 'Taxa Normal', 'ativado'),
(2, '13', 'Taxa Intermédia', 'ativado'),
(3, '6', 'Taxa Reduzida', 'desativado'),
(4, '1', 'Taxa 1', 'ativado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `linha_obras`
--

DROP TABLE IF EXISTS `linha_obras`;
CREATE TABLE IF NOT EXISTS `linha_obras` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `quantidade` int(4) DEFAULT NULL,
  `valor_unitario` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor_iva` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `servico_id` int(6) DEFAULT NULL,
  `folha_id` int(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `servico_id` (`servico_id`),
  KEY `folha_id` (`folha_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `linha_obras`
--

INSERT INTO `linha_obras` (`id`, `quantidade`, `valor_unitario`, `valor_iva`, `servico_id`, `folha_id`) VALUES
(3, 2, '15', '3.45', 1, 3),
(4, 1, '17', '2.21', 2, 3),
(5, 2, '13', '2.99', 3, 3),
(6, 1, '23', '5.29', 5, 4),
(7, 3, '18', '1.08', 4, 4),
(8, 1, '15', '3.45', 1, 4),
(9, 5, '15', '3.45', 1, 5),
(10, 2, '13', '2.99', 3, 5),
(11, 3, '18', '1.08', 4, 5),
(12, 6, '23', '5.29', 5, 6),
(13, 3, '18', '1.08', 4, 6),
(14, 2, '15', '3.45', 1, 6),
(15, 1, '15', '3.45', 1, 7),
(16, 1, '13', '2.99', 3, 7),
(17, 1, '23', '5.29', 5, 8),
(18, 2, '17', '2.21', 2, 8),
(19, 2, '15', '3.45', 1, 8),
(20, 2, '23', '5.29', 5, 9),
(21, 3, '15', '3.45', 1, 9),
(22, 1, '18', '1.08', 4, 9),
(23, 4, '15', '3.45', 1, 10),
(24, 2, '10', '0.1', 7, 11),
(25, 1, '15', '3.45', 1, 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

DROP TABLE IF EXISTS `servicos`;
CREATE TABLE IF NOT EXISTS `servicos` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `referencia` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `preco` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iva_id` int(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `iva_id` (`iva_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `referencia`, `descricao`, `preco`, `iva_id`) VALUES
(1, '12345', 'Pintura Geral', '15', 1),
(2, '67890', 'Remodelação de Pladur', '17', 2),
(3, '54321', 'Renovação de Interiores', '13', 1),
(4, '98765', 'Instalação de sistemas de encanamento', '18', 1),
(5, '24680', 'Construção de estradas', '23', 1),
(7, '123', 'serviço teste', '10', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(56) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(56) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` int(9) NOT NULL,
  `nif` int(9) NOT NULL,
  `morada` varchar(56) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_postal` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `localidade` varchar(56) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(56) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `telefone`, `nif`, `morada`, `codigo_postal`, `localidade`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 987654321, 123456789, 'Portimão', '8500-378', 'Portimão', 'admin'),
(2, 'cliente', '4983a0ab83ed86e0e7213c8783940193', 'cliente@gmail.com', 123987456, 987123456, 'Portimão', '8500-454', 'Portimão', 'cliente'),
(3, 'Pedro', '4983a0ab83ed86e0e7213c8783940193', 'pedro@gmail.com', 123654789, 987456321, 'Portimão', '8500-111', 'Portimão', 'cliente'),
(4, 'Simão', '4983a0ab83ed86e0e7213c8783940193', 'simao@gmail.com', 132465999, 312465789, 'Leiria', '2400-542', 'Leiria', 'cliente'),
(5, 'Gonçalo', 'cc7a84634199040d54376793842fe035', 'goncalo@gmail.com', 456798123, 123456789, 'Portimão', '8500-456', 'Portimão', 'funcionario'),
(6, 'Carina', 'cc7a84634199040d54376793842fe035', 'carina@gmail.com', 132456798, 132465789, 'Portimão', '8500-222', 'Portimão', 'funcionario'),
(8, 'Tiago', 'cc7a84634199040d54376793842fe035', 'tiago@gmail.com', 123456789, 987231456, 'Portimão', '8500-342', 'Portimão', 'funcionario'),
(9, 'clientedefesa', '4983a0ab83ed86e0e7213c8783940193', 'clientedefesa@gmail.com', 123456789, 986754321, 'Portimão', '8500-222', 'Portimão', 'cliente');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `folhas`
--
ALTER TABLE `folhas`
  ADD CONSTRAINT `folhas_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `folhas_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `linha_obras`
--
ALTER TABLE `linha_obras`
  ADD CONSTRAINT `linha_obras_ibfk_1` FOREIGN KEY (`servico_id`) REFERENCES `servicos` (`id`),
  ADD CONSTRAINT `linha_obras_ibfk_2` FOREIGN KEY (`folha_id`) REFERENCES `folhas` (`id`);

--
-- Limitadores para a tabela `servicos`
--
ALTER TABLE `servicos`
  ADD CONSTRAINT `servicos_ibfk_1` FOREIGN KEY (`iva_id`) REFERENCES `ivas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
