-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Host: mysql873.umbler.com
-- Generation Time: 24-Jul-2021 às 15:30
-- Versão do servidor: 5.6.40
-- PHP Version: 5.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visionlounge`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcaixa`
--

CREATE TABLE IF NOT EXISTS `tbcaixa` (
  `idcaixa` int(11) NOT NULL,
  `descricao` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `banco` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `saldo_inicial` decimal(10,2) NOT NULL DEFAULT '0.00',
  `saldo_atual` decimal(10,2) DEFAULT '0.00',
  `saldo_final` decimal(10,2) DEFAULT '0.00',
  `status` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A',
  `hora_abertura` datetime DEFAULT NULL,
  `hora_fechamento` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tbcaixa`
--

INSERT INTO `tbcaixa` (`idcaixa`, `descricao`, `banco`, `saldo_inicial`, `saldo_atual`, `saldo_final`, `status`, `hora_abertura`, `hora_fechamento`) VALUES
(1, 'Caixa Vision', 'C1', '0.00', '0.00', '0.00', 'A', '2020-01-24 22:25:04', '2020-01-24 22:22:52');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcategorias`
--

CREATE TABLE IF NOT EXISTS `tbcategorias` (
  `idcategoria` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `habilitado` varchar(1) DEFAULT 'S',
  `modificado` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbcategorias`
--

INSERT INTO `tbcategorias` (`idcategoria`, `nome`, `habilitado`, `modificado`) VALUES
(2, 'Combos', 'S', NULL),
(3, 'Rosh', 'S', NULL),
(4, 'Essencias', 'S', NULL),
(1, 'Bebidas', 'S', NULL),
(7, 'Promoção', 'S', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbclientes`
--

CREATE TABLE IF NOT EXISTS `tbclientes` (
  `reg` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `dt_nascimento` varchar(10) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `modificado` datetime DEFAULT NULL,
  `usuid` int(11) DEFAULT NULL,
  `habilitado` varchar(1) DEFAULT 'S'
) ENGINE=MyISAM AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbclientes`
--

INSERT INTO `tbclientes` (`reg`, `nome`, `rg`, `telefone`, `dt_nascimento`, `data_cadastro`, `modificado`, `usuid`, `habilitado`) VALUES
(99, 'Cliente Padrão', '9999', '(43) 99999-9999', '99/99/9999', '2020-01-16 17:20:00', NULL, NULL, 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcomanda`
--

CREATE TABLE IF NOT EXISTS `tbcomanda` (
  `idcomanda` int(11) NOT NULL,
  `status` varchar(2) DEFAULT 'A',
  `data` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=317 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbcomanda`
--

INSERT INTO `tbcomanda` (`idcomanda`, `status`, `data`) VALUES
(1, 'A', '2019-11-19 15:07:55'),
(2, 'A', '2019-11-19 15:09:31'),
(3, 'A', '2019-11-19 15:09:38'),
(4, 'A', '2019-11-19 15:09:38'),
(5, 'A', '2019-11-19 15:09:39'),
(6, 'A', '2019-11-19 15:09:39'),
(7, 'A', '2019-11-19 15:09:39'),
(8, 'A', '2019-11-19 15:09:39'),
(9, 'A', '2019-11-19 15:09:39'),
(10, 'A', '2019-11-19 15:09:39'),
(11, 'A', '2019-11-19 15:09:40'),
(12, 'A', '2019-11-19 15:09:40'),
(13, 'A', '2019-11-19 15:09:40'),
(14, 'A', '2019-11-19 15:09:40'),
(15, 'A', '2019-11-19 15:09:40'),
(16, 'A', '2019-11-19 15:09:40'),
(17, 'A', '2019-11-19 15:09:41'),
(18, 'A', '2019-11-19 15:09:41'),
(19, 'A', '2019-11-19 15:09:41'),
(20, 'A', '2019-11-19 15:09:41'),
(21, 'A', '2019-11-19 15:09:41'),
(22, 'A', '2019-11-19 15:09:41'),
(23, 'A', '2019-11-19 15:09:41'),
(24, 'A', '2019-11-19 15:09:41'),
(25, 'A', '2019-11-19 15:09:41'),
(26, 'A', '2019-11-19 15:09:42'),
(27, 'A', '2019-11-19 15:09:42'),
(28, 'A', '2019-11-19 15:09:42'),
(29, 'A', '2019-11-19 15:09:42'),
(30, 'A', '2019-11-19 15:09:42'),
(31, 'A', '2019-11-19 15:09:42'),
(32, 'A', '2019-11-19 15:09:42'),
(33, 'A', '2019-11-19 15:09:42'),
(34, 'A', '2019-11-19 15:09:42'),
(35, 'A', '2019-11-19 15:09:42'),
(36, 'A', '2019-11-19 15:09:43'),
(37, 'A', '2019-11-19 15:09:43'),
(38, 'A', '2019-11-19 15:09:43'),
(39, 'A', '2019-11-19 15:09:43'),
(40, 'A', '2019-11-19 15:09:43'),
(41, 'A', '2019-11-19 15:09:43'),
(42, 'A', '2019-11-19 15:09:43'),
(43, 'A', '2019-11-19 15:09:43'),
(44, 'A', '2019-11-19 15:09:43'),
(45, 'A', '2019-11-19 15:09:44'),
(46, 'A', '2019-11-19 15:09:44'),
(47, 'A', '2019-11-19 15:09:44'),
(48, 'A', '2019-11-19 15:09:44'),
(49, 'A', '2019-11-19 15:09:44'),
(50, 'A', '2019-11-19 15:09:44'),
(51, 'A', '2019-11-19 15:09:44'),
(52, 'A', '2019-11-19 15:09:44'),
(53, 'A', '2019-11-19 15:09:45'),
(54, 'A', '2019-11-19 15:09:45'),
(55, 'A', '2019-11-19 15:09:45'),
(56, 'A', '2019-11-19 15:09:45'),
(57, 'A', '2019-11-19 15:09:45'),
(58, 'A', '2019-11-19 15:09:45'),
(59, 'A', '2019-11-19 15:09:45'),
(60, 'A', '2019-11-19 15:09:45'),
(61, 'A', '2019-11-19 15:09:45'),
(62, 'A', '2019-11-19 15:09:45'),
(63, 'A', '2019-11-19 15:09:46'),
(64, 'A', '2019-11-19 15:09:46'),
(65, 'A', '2019-11-19 15:09:46'),
(66, 'A', '2019-11-19 15:09:46'),
(67, 'A', '2019-11-19 15:09:46'),
(68, 'A', '2019-11-19 15:09:46'),
(69, 'A', '2019-11-19 15:09:46'),
(70, 'A', '2019-11-19 15:09:46'),
(71, 'A', '2019-11-19 15:09:46'),
(72, 'A', '2019-11-19 15:09:47'),
(73, 'A', '2019-11-19 15:09:47'),
(74, 'A', '2019-11-19 15:09:47'),
(75, 'A', '2019-11-19 15:09:47'),
(76, 'A', '2019-11-19 15:09:47'),
(77, 'A', '2019-11-19 15:09:47'),
(78, 'A', '2019-11-19 15:09:47'),
(79, 'A', '2019-11-19 15:09:47'),
(80, 'A', '2019-11-19 15:09:47'),
(81, 'A', '2019-11-19 15:09:48'),
(82, 'A', '2019-11-19 15:09:48'),
(83, 'A', '2019-11-19 15:09:48'),
(84, 'A', '2019-11-19 15:09:48'),
(85, 'A', '2019-11-19 15:09:48'),
(86, 'A', '2019-11-19 15:09:48'),
(87, 'A', '2019-11-19 15:09:48'),
(88, 'A', '2019-11-19 15:09:48'),
(89, 'A', '2019-11-19 15:09:48'),
(90, 'A', '2019-11-19 15:09:49'),
(91, 'A', '2019-11-19 15:09:49'),
(92, 'A', '2019-11-19 15:09:49'),
(93, 'A', '2019-11-19 15:09:49'),
(94, 'A', '2019-11-19 15:09:49'),
(95, 'A', '2019-11-19 15:09:49'),
(96, 'A', '2019-11-19 15:09:49'),
(97, 'A', '2019-11-19 15:09:49'),
(98, 'A', '2019-11-19 15:09:49'),
(99, 'A', '2019-11-19 15:09:49'),
(100, 'A', '2019-11-19 15:09:50'),
(101, 'A', '2019-11-19 15:09:50'),
(102, 'A', '2019-11-19 15:09:50'),
(103, 'A', '2019-11-19 15:09:50'),
(104, 'A', '2019-11-19 15:09:50'),
(105, 'A', '2019-11-19 15:09:50'),
(106, 'A', '2019-11-19 15:09:50'),
(107, 'A', '2019-11-19 15:09:50'),
(108, 'A', '2019-11-19 15:09:50'),
(109, 'A', '2019-11-19 15:09:51'),
(110, 'A', '2019-11-19 15:09:51'),
(111, 'A', '2019-11-19 15:09:51'),
(112, 'A', '2019-11-19 15:09:51'),
(113, 'A', '2019-11-19 15:09:51'),
(114, 'A', '2019-11-19 15:09:51'),
(115, 'A', '2019-11-19 15:09:51'),
(116, 'A', '2019-11-19 15:09:51'),
(117, 'A', '2019-11-19 15:09:51'),
(118, 'A', '2019-11-19 15:09:52'),
(119, 'A', '2019-11-19 15:09:52'),
(120, 'A', '2019-11-19 15:09:52'),
(121, 'A', '2019-11-19 15:09:52'),
(122, 'A', '2019-11-19 15:09:52'),
(123, 'A', '2019-11-19 15:09:52'),
(124, 'A', '2019-11-19 15:09:52'),
(125, 'A', '2019-11-19 15:09:52'),
(126, 'A', '2019-11-19 15:09:52'),
(127, 'A', '2019-11-19 15:09:53'),
(128, 'A', '2019-11-19 15:09:53'),
(129, 'A', '2019-11-19 15:09:53'),
(130, 'A', '2019-11-19 15:09:53'),
(131, 'A', '2019-11-19 15:09:53'),
(132, 'A', '2019-11-19 15:09:53'),
(133, 'A', '2019-11-19 15:09:53'),
(134, 'A', '2019-11-19 15:09:53'),
(135, 'A', '2019-11-19 15:09:53'),
(136, 'A', '2019-11-19 15:09:54'),
(137, 'A', '2019-11-19 15:09:54'),
(138, 'A', '2019-11-19 15:09:54'),
(139, 'A', '2019-11-19 15:09:54'),
(140, 'A', '2019-11-19 15:09:54'),
(141, 'A', '2019-11-19 15:09:54'),
(142, 'A', '2019-11-19 15:09:54'),
(143, 'A', '2019-11-19 15:09:54'),
(144, 'A', '2019-11-19 15:09:54'),
(145, 'A', '2019-11-19 15:09:55'),
(146, 'A', '2019-11-19 15:09:55'),
(147, 'A', '2019-11-19 15:09:55'),
(148, 'A', '2019-11-19 15:09:55'),
(149, 'A', '2019-11-19 15:09:55'),
(150, 'A', '2019-11-19 15:09:55'),
(151, 'A', '2019-11-19 15:09:55'),
(152, 'A', '2019-11-19 15:09:55'),
(153, 'A', '2019-11-19 15:09:55'),
(154, 'A', '2019-11-19 15:09:56'),
(155, 'A', '2019-11-19 15:09:56'),
(156, 'A', '2019-11-19 15:09:56'),
(157, 'A', '2019-11-19 15:09:56'),
(158, 'A', '2019-11-19 15:09:56'),
(159, 'A', '2019-11-19 15:09:56'),
(160, 'A', '2019-11-19 15:09:56'),
(161, 'A', '2019-11-19 15:09:56'),
(162, 'A', '2019-11-19 15:09:56'),
(163, 'A', '2019-11-19 15:09:57'),
(164, 'A', '2019-11-19 15:09:57'),
(165, 'A', '2019-11-19 15:09:57'),
(166, 'A', '2019-11-19 15:09:57'),
(167, 'A', '2019-11-19 15:09:57'),
(168, 'A', '2019-11-19 15:09:57'),
(169, 'A', '2019-11-19 15:09:57'),
(170, 'A', '2019-11-19 15:09:57'),
(171, 'A', '2019-11-19 15:09:57'),
(172, 'A', '2019-11-19 15:09:57'),
(173, 'A', '2019-11-19 15:09:58'),
(174, 'A', '2019-11-19 15:09:58'),
(175, 'A', '2019-11-19 15:09:58'),
(176, 'A', '2019-11-19 15:09:58'),
(177, 'A', '2019-11-19 15:09:58'),
(178, 'A', '2019-11-19 15:09:58'),
(179, 'A', '2019-11-19 15:09:58'),
(180, 'A', '2019-11-19 15:09:58'),
(181, 'A', '2019-11-19 15:09:58'),
(182, 'A', '2019-11-19 15:09:59'),
(183, 'A', '2019-11-19 15:09:59'),
(184, 'A', '2019-11-19 15:09:59'),
(185, 'A', '2019-11-19 15:09:59'),
(186, 'A', '2019-11-19 15:09:59'),
(187, 'A', '2019-11-19 15:09:59'),
(188, 'A', '2019-11-19 15:09:59'),
(189, 'A', '2019-11-19 15:09:59'),
(190, 'A', '2019-11-19 15:09:59'),
(191, 'A', '2019-11-19 15:10:00'),
(192, 'A', '2019-11-19 15:10:00'),
(193, 'A', '2019-11-19 15:10:00'),
(194, 'A', '2019-11-19 15:10:00'),
(195, 'A', '2019-11-19 15:10:00'),
(196, 'A', '2019-11-19 15:10:00'),
(197, 'A', '2019-11-19 15:10:00'),
(198, 'A', '2019-11-19 15:10:00'),
(199, 'A', '2019-11-19 15:10:00'),
(200, 'A', '2019-11-19 15:10:01'),
(201, 'A', '2019-11-19 15:10:01'),
(202, 'A', '2019-11-19 15:10:01'),
(203, 'A', '2019-11-19 15:10:01'),
(204, 'A', '2019-11-19 15:10:01'),
(205, 'A', '2019-11-19 15:10:01'),
(206, 'A', '2019-11-19 15:10:01'),
(207, 'A', '2019-11-19 15:10:01'),
(208, 'A', '2019-11-19 15:10:01'),
(209, 'A', '2019-11-19 15:10:02'),
(210, 'A', '2019-11-19 15:10:02'),
(211, 'A', '2019-11-19 15:10:02'),
(212, 'A', '2019-11-19 15:10:02'),
(213, 'A', '2019-11-19 15:10:02'),
(214, 'A', '2019-11-19 15:10:02'),
(215, 'A', '2019-11-19 15:10:02'),
(216, 'A', '2019-11-19 15:10:02'),
(217, 'A', '2019-11-19 15:10:02'),
(218, 'A', '2019-11-19 15:10:03'),
(219, 'A', '2019-11-19 15:10:03'),
(220, 'A', '2019-11-19 15:10:03'),
(221, 'A', '2019-11-19 15:10:03'),
(222, 'A', '2019-11-19 15:10:03'),
(223, 'A', '2019-11-19 15:10:03'),
(224, 'A', '2019-11-19 15:10:03'),
(225, 'A', '2019-11-19 15:10:03'),
(226, 'A', '2019-11-19 15:10:03'),
(227, 'A', '2019-11-19 15:10:04'),
(228, 'A', '2019-11-19 15:10:04'),
(229, 'A', '2019-11-19 15:10:04'),
(230, 'A', '2019-11-19 15:10:04'),
(231, 'A', '2019-11-19 15:10:04'),
(232, 'A', '2019-11-19 15:10:04'),
(233, 'A', '2019-11-19 15:10:04'),
(234, 'A', '2019-11-19 15:10:04'),
(235, 'A', '2019-11-19 15:10:04'),
(236, 'A', '2019-11-19 15:10:05'),
(237, 'A', '2019-11-19 15:10:05'),
(238, 'A', '2019-11-19 15:10:05'),
(239, 'A', '2019-11-19 15:10:05'),
(240, 'A', '2019-11-19 15:10:05'),
(241, 'A', '2019-11-19 15:10:05'),
(242, 'A', '2019-11-19 15:10:05'),
(243, 'A', '2019-11-19 15:10:05'),
(244, 'A', '2019-11-19 15:10:05'),
(245, 'A', '2019-11-19 15:10:05'),
(246, 'A', '2019-11-19 15:10:06'),
(247, 'A', '2019-11-19 15:10:06'),
(248, 'A', '2019-11-19 15:10:06'),
(249, 'A', '2019-11-19 15:10:06'),
(250, 'A', '2019-11-19 15:10:06'),
(251, 'A', '2019-11-19 15:10:06'),
(252, 'A', '2019-11-19 15:10:06'),
(253, 'A', '2019-11-19 15:10:06'),
(254, 'A', '2019-11-19 15:10:06'),
(255, 'A', '2019-11-19 15:10:07'),
(256, 'A', '2019-11-19 15:10:07'),
(257, 'A', '2019-11-19 15:10:07'),
(258, 'A', '2019-11-19 15:10:07'),
(259, 'A', '2019-11-19 15:10:07'),
(260, 'A', '2019-11-19 15:10:07'),
(261, 'A', '2019-11-19 15:10:07'),
(262, 'A', '2019-11-19 15:10:07'),
(263, 'A', '2019-11-19 15:10:07'),
(264, 'A', '2019-11-19 15:10:08'),
(265, 'A', '2019-11-19 15:10:08'),
(266, 'A', '2019-11-19 15:10:08'),
(267, 'A', '2019-11-19 15:10:08'),
(268, 'A', '2019-11-19 15:10:08'),
(269, 'A', '2019-11-19 15:10:08'),
(270, 'A', '2019-11-19 15:10:08'),
(271, 'A', '2019-11-19 15:10:08'),
(272, 'A', '2019-11-19 15:10:08'),
(273, 'A', '2019-11-19 15:10:09'),
(274, 'A', '2019-11-19 15:10:09'),
(275, 'A', '2019-11-19 15:10:09'),
(276, 'A', '2019-11-19 15:10:09'),
(277, 'A', '2019-11-19 15:10:09'),
(278, 'A', '2019-11-19 15:10:09'),
(279, 'A', '2019-11-19 15:10:09'),
(280, 'A', '2019-11-19 15:10:09'),
(281, 'A', '2019-11-19 15:10:09'),
(282, 'A', '2019-11-19 15:10:10'),
(283, 'A', '2019-11-19 15:10:10'),
(284, 'A', '2019-11-19 15:10:10'),
(285, 'A', '2019-11-19 15:10:10'),
(286, 'A', '2019-11-19 15:10:10'),
(287, 'A', '2019-11-19 15:10:10'),
(288, 'A', '2019-11-19 15:10:10'),
(289, 'A', '2019-11-19 15:10:10'),
(290, 'A', '2019-11-19 15:10:10'),
(291, 'A', '2019-11-19 15:10:11'),
(292, 'A', '2019-11-19 15:10:11'),
(293, 'A', '2019-11-19 15:10:11'),
(294, 'A', '2019-11-19 15:10:11'),
(295, 'A', '2019-11-19 15:10:11'),
(296, 'A', '2019-11-19 15:10:11'),
(297, 'A', '2019-11-19 15:10:11'),
(298, 'A', '2019-11-19 15:10:11'),
(299, 'A', '2019-11-19 15:10:11'),
(300, 'A', '2019-11-19 15:10:11'),
(301, 'A', '2019-11-19 15:10:12'),
(302, 'A', '2019-11-19 15:10:12'),
(303, 'A', '2019-11-19 15:10:12'),
(304, 'A', '2019-11-19 15:10:12'),
(305, 'A', '2019-11-19 15:10:12'),
(306, 'A', '2019-11-19 15:10:12'),
(307, 'A', '2019-11-19 15:10:12'),
(308, 'A', '2019-11-19 15:10:12'),
(309, 'A', '2019-11-19 15:10:12'),
(310, 'A', '2019-11-19 15:10:13'),
(311, 'A', '2019-11-19 15:10:13'),
(312, 'A', '2019-11-19 15:10:13'),
(313, 'A', '2019-11-19 15:10:13'),
(314, 'A', '2019-11-19 15:10:13'),
(315, 'A', '2019-11-19 15:10:13'),
(316, 'A', '2019-11-19 15:10:13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbformas_pagamento`
--

CREATE TABLE IF NOT EXISTS `tbformas_pagamento` (
  `idforma_pagamento` varchar(3) NOT NULL,
  `forma_descricao` varchar(45) DEFAULT NULL,
  `Ativo` varchar(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbformas_pagamento`
--

INSERT INTO `tbformas_pagamento` (`idforma_pagamento`, `forma_descricao`, `Ativo`) VALUES
('R$', 'Dinheiro', 'S'),
('CC', 'Cartao de Credito', 'S'),
('CD', 'Cartao de Debito', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpedidos`
--

CREATE TABLE IF NOT EXISTS `tbpedidos` (
  `idpedido` int(11) NOT NULL,
  `comanda` int(11) NOT NULL DEFAULT '0',
  `reg` int(11) NOT NULL,
  `status` varchar(2) DEFAULT 'A',
  `valor` decimal(10,2) DEFAULT '0.00',
  `tipo` varchar(2) DEFAULT NULL,
  `titulo` varchar(255) NOT NULL,
  `data_inc` datetime DEFAULT NULL,
  `data_finaliza` datetime DEFAULT NULL,
  `usu_id` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbpedidos`
--

INSERT INTO `tbpedidos` (`idpedido`, `comanda`, `reg`, `status`, `valor`, `tipo`, `titulo`, `data_inc`, `data_finaliza`, `usu_id`) VALUES
(1, 1, 99, 'D', '46.57', 'L', 'Lounge', '2020-01-24 22:13:11', '2020-01-24 22:15:22', 1),
(2, 1, 102, 'D', '35.98', 'L', 'Lounge', '2020-01-24 22:20:26', '2020-01-24 22:21:03', 1),
(3, 1, 99, 'D', '29.08', 'L', 'Lounge', '2020-01-25 17:17:16', '2020-01-25 17:18:32', 1),
(4, 2, 99, 'D', '0.00', 'L', 'Lounge', '2020-02-15 12:07:44', NULL, NULL),
(5, 0, 99, 'A', '6.58', 'V', 'Venda', '2021-07-24 15:27:34', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpedidos_item`
--

CREATE TABLE IF NOT EXISTS `tbpedidos_item` (
  `iditem` int(11) NOT NULL,
  `idpedido` int(11) NOT NULL,
  `referencia` varchar(45) DEFAULT NULL,
  `descricao` longtext,
  `quantidade` double DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `desconto` decimal(10,2) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbpedidos_item`
--

INSERT INTO `tbpedidos_item` (`iditem`, `idpedido`, `referencia`, `descricao`, `quantidade`, `valor`, `desconto`) VALUES
(1, 1, '01.00003', 'Cerveja Brahma Lata', 2, '2.99', NULL),
(2, 1, '03.00002', 'Rosh R$ 15.00', 1, '15.00', NULL),
(3, 1, '02.00002', 'Combo Long Neck Budweiser', 1, '25.59', NULL),
(4, 2, '01.00003', 'Cerveja Brahma Lata', 2, '2.99', NULL),
(5, 2, '03.00002', 'Rosh R$ 15.00', 2, '15.00', NULL),
(6, 3, '01.00002', 'Cerveja Long Neck Budweiser', 1, '3.49', NULL),
(7, 3, '02.00002', 'Combo Long Neck Budweiser', 1, '25.59', NULL),
(10, 5, '01.00001', 'Cerveja Long Neck Sol', 2, '3.29', NULL);

--
-- Acionadores `tbpedidos_item`
--
DELIMITER $$
CREATE TRIGGER `tbpedidos_item_AFTER_DELETE` AFTER DELETE ON `tbpedidos_item`
 FOR EACH ROW BEGIN
declare total decimal(10,2);

	select ifnull(sum(valor*quantidade),0) into total from tbpedidos_item where idpedido = old.idpedido ;

	UPDATE tbpedidos SET valor=total WHERE idpedido=old.idpedido;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tbpedidos_item_AFTER_INSERT` AFTER INSERT ON `tbpedidos_item`
 FOR EACH ROW BEGIN
	declare total decimal(10,2);

	select sum(valor*quantidade) into total from tbpedidos_item where idpedido = new.idpedido ;

	UPDATE tbpedidos SET valor=total WHERE idpedido=new.idpedido;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpedido_pagamento`
--

CREATE TABLE IF NOT EXISTS `tbpedido_pagamento` (
  `idforma` int(11) NOT NULL,
  `idpedido` int(11) DEFAULT NULL,
  `forma` varchar(3) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT '0.00',
  `troco` decimal(10,2) DEFAULT '0.00',
  `tipo` varchar(45) DEFAULT NULL,
  `data_pagamento` datetime DEFAULT NULL,
  `status` varchar(1) DEFAULT 'A',
  `beneficiario` varchar(45) DEFAULT NULL,
  `historico` varchar(60) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbpedido_pagamento`
--

INSERT INTO `tbpedido_pagamento` (`idforma`, `idpedido`, `forma`, `valor`, `troco`, `tipo`, `data_pagamento`, `status`, `beneficiario`, `historico`) VALUES
(2, 1, 'R$', '30.00', '-20.00', 'LOUNGE', '2020-01-24 22:15:22', 'C', NULL, NULL),
(3, 1, 'CD', '16.57', '0.00', 'LOUNGE', '2020-01-24 22:15:22', 'C', NULL, NULL),
(4, 2, 'CC', '35.98', '0.00', 'LOUNGE', '2020-01-24 22:21:03', 'C', NULL, NULL),
(5, 3, 'R$', '29.08', '-0.92', 'LOUNGE', '2020-01-25 17:18:32', 'C', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpermissao`
--

CREATE TABLE IF NOT EXISTS `tbpermissao` (
  `id` int(11) NOT NULL,
  `idpermissao` int(11) NOT NULL,
  `permissao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbpermissao`
--

INSERT INTO `tbpermissao` (`id`, `idpermissao`, `permissao`) VALUES
(1, 1, 'Administrador'),
(2, 2, 'Caixa'),
(3, 3, 'Vendedor'),
(7, 4, 'Gerente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbproduto`
--

CREATE TABLE IF NOT EXISTS `tbproduto` (
  `id` int(11) NOT NULL,
  `referencia` varchar(15) NOT NULL DEFAULT '',
  `idcategoria` int(11) DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL DEFAULT '0.00',
  `descricao` varchar(255) NOT NULL,
  `habilitado` varchar(1) NOT NULL DEFAULT 'S',
  `modificado` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbproduto`
--

INSERT INTO `tbproduto` (`id`, `referencia`, `idcategoria`, `preco`, `descricao`, `habilitado`, `modificado`) VALUES
(1, '01.00001', 1, '3.29', 'Cerveja Long Neck Sol', 'S', '2019-12-19 15:01:32'),
(2, '01.00002', 1, '3.49', 'Cerveja Long Neck Budweiser', 'S', NULL),
(3, '01.00003', 1, '2.99', 'Cerveja Brahma Lata', 'S', NULL),
(4, '03.00001', 3, '10.00', 'Rosh R$ 10,00', 'S', NULL),
(5, '03.00002', 3, '15.00', 'Rosh R$ 15.00', 'S', NULL),
(6, '03.00003', 3, '20.00', 'Rosh R$ 20.00', 'S', NULL),
(7, '02.00001', 2, '29.90', 'Combo Long Neck Sol', 'S', NULL),
(8, '02.00002', 2, '25.59', 'Combo Long Neck Budweiser', 'S', NULL),
(27, '07.00008', 7, '5.00', '3 Rosh 5$', 'S', NULL),
(14, '01.00004', 1, '2.80', 'Coca Lata', 'S', NULL),
(15, '01.00005', 1, '2.30', 'Guaraná Antártica Lata', 'S', NULL),
(24, '07.00005', 7, '18.00', '1 Rosh 18$', 'S', NULL),
(25, '07.00007', 7, '15.00', '2 Rosh 15$', 'S', NULL),
(19, '07.00001', 7, '40.00', 'Combo Cerveja Long Neck Sol + Rosh', 'S', '2020-01-16 17:05:17'),
(20, '07.00002', 7, '15.00', 'Passe Entrada Masculino', 'S', '2020-01-14 09:59:50'),
(22, '07.00003', 7, '5.00', 'Passe de Entrada Feminino', 'S', NULL),
(23, '07.00004', 7, '5.00', 'Entrada', 'S', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `senha_confirma` varchar(32) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `dt_nascimento` varchar(10) NOT NULL,
  `Criado` datetime DEFAULT NULL,
  `Modificado` datetime DEFAULT NULL,
  `habilitado` varchar(1) DEFAULT 'S',
  `usuid` int(11) DEFAULT NULL,
  `idpermissao` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `senha_confirma`, `rg`, `telefone`, `dt_nascimento`, `Criado`, `Modificado`, `habilitado`, `usuid`, `idpermissao`) VALUES
(2, 'Beatriz Eduarda', 'beatriz@teste.com.br', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', '12.709.314-1', '(43) 99344-8595', '03/07/2000', '2019-11-05 14:41:16', '2019-12-11 16:24:45', 'S', 5, 2),
(3, 'Rhuan Yago Aragão', 'rhuan.yago@teste.com.br', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', '12.350.890-0', '(43) 99187-7147', '14/10/1998', '2019-11-25 08:20:14', '2020-01-15 11:19:21', 'S', 1, 3),
(1, 'Administrador', 'admin@admin.com.br', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', '12.609.714-0', '(43) 99626-8534', '14/10/1998', '2019-12-10 10:43:03', NULL, 'S', NULL, 1),
(10, 'Guilherme', 'guilherme@vision.com.br', '9246444d94f081e3549803b928260f56', '9246444d94f081e3549803b928260f56', '130882846', '(43) 99861-2872', '10/06/1998', '2020-01-16 20:21:21', NULL, 'S', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbcaixa`
--
ALTER TABLE `tbcaixa`
  ADD PRIMARY KEY (`idcaixa`);

--
-- Indexes for table `tbcategorias`
--
ALTER TABLE `tbcategorias`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indexes for table `tbclientes`
--
ALTER TABLE `tbclientes`
  ADD PRIMARY KEY (`reg`);

--
-- Indexes for table `tbcomanda`
--
ALTER TABLE `tbcomanda`
  ADD PRIMARY KEY (`idcomanda`);

--
-- Indexes for table `tbformas_pagamento`
--
ALTER TABLE `tbformas_pagamento`
  ADD PRIMARY KEY (`idforma_pagamento`);

--
-- Indexes for table `tbpedidos`
--
ALTER TABLE `tbpedidos`
  ADD PRIMARY KEY (`idpedido`,`comanda`);

--
-- Indexes for table `tbpedidos_item`
--
ALTER TABLE `tbpedidos_item`
  ADD PRIMARY KEY (`iditem`,`idpedido`);

--
-- Indexes for table `tbpedido_pagamento`
--
ALTER TABLE `tbpedido_pagamento`
  ADD PRIMARY KEY (`idforma`);

--
-- Indexes for table `tbpermissao`
--
ALTER TABLE `tbpermissao`
  ADD PRIMARY KEY (`id`,`idpermissao`);

--
-- Indexes for table `tbproduto`
--
ALTER TABLE `tbproduto`
  ADD PRIMARY KEY (`id`,`referencia`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbcaixa`
--
ALTER TABLE `tbcaixa`
  MODIFY `idcaixa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbcategorias`
--
ALTER TABLE `tbcategorias`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tbclientes`
--
ALTER TABLE `tbclientes`
  MODIFY `reg` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `tbcomanda`
--
ALTER TABLE `tbcomanda`
  MODIFY `idcomanda` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=317;
--
-- AUTO_INCREMENT for table `tbpedidos`
--
ALTER TABLE `tbpedidos`
  MODIFY `idpedido` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbpedidos_item`
--
ALTER TABLE `tbpedidos_item`
  MODIFY `iditem` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbpedido_pagamento`
--
ALTER TABLE `tbpedido_pagamento`
  MODIFY `idforma` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbpermissao`
--
ALTER TABLE `tbpermissao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbproduto`
--
ALTER TABLE `tbproduto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
