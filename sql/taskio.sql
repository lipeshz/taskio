-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/01/2025 às 23:42
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
-- Banco de dados: `taskio`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `task`
--

CREATE TABLE `task` (
  `id_task` int(11) NOT NULL,
  `token_task` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `id_criador` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `data_criacao` datetime NOT NULL,
  `data_limite` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `task`
--

INSERT INTO `task` (`id_task`, `token_task`, `titulo`, `id_criador`, `descricao`, `data_criacao`, `data_limite`) VALUES
(140, '77ce7fce2366112800db341c63b5dafd58e4c96ca4c4c501c84bb4118d7e34921a1b527d84ee54b7b0b831af06392bae3e71d3c2274ed0217848b8caa1709ef50fe166545f70f981d5f4d278e24756735037f1a8eea7db5d72da6b058e7b2d5e7533d64f84faef72ed70f3d2ddbb8ba4e0199eef147374fe4a723f23cd86ad2', 'asdawdawd', 11, 'fdawfa', '2025-01-16 10:27:00', '2025-01-17 07:26:00'),
(141, 'fdf63c9946df5c3bd53d6548a008bc2f52db7b6220d31824ccc6d18f66d891617e2f9574c03c873b0f52456e09b7fb7cd4b337c6b086e4d74a190e170d02f04e532cff333da00ec21064f48b42f93b41c343b2c5633c498b0ff57e89be74fc3b46991340633ed0bf2c0d3917f0fbe61cfb92bbc74827df208edf5459e79e1cb', 'dasfafa', 11, 'dad', '2025-01-16 10:35:40', '2025-01-24 07:35:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `senha`) VALUES
(5, 'jogao', 'joao@gmail.com', '$2y$10$CyRxFnQIyVZKfudOzH2OnePaalOTQMSaF2sxojEu6bQplc4SsKgF6'),
(6, 'Amado', 'amado@gmail.com', '$2y$10$XJ0qLYBSO0aevddTFfxNjey7sUxBvjaKYOd.z9jOVe09nBiJxr6kK'),
(7, 'dadaw', 'daod@gmail.com', '$2y$10$BnkjG6AxMChCRBPU3ncIruJ/puaE5wWPnNXjTgDU43c5vwVQRgZWC'),
(8, 'Rafael', 'rafael@gmail.com', '$2y$10$QxCpH3yk25oXzpaHCBQDZuPpzRG98hWy5w/sKL.Ou1CbE.POxHPxe'),
(10, 'Bezerra', 'bezerra@gmail.com', '$2y$10$oE.VIgei68Q5HuQ8KdA68u1.I01VuHwR61/f7Y7pu2B5hKswkT4sK'),
(11, 'Filipe Gabriel F', 'filipeglima2005@gmail.com', '$2y$10$dLD7XWS7ppg48BNJS2CyhuXt7lMkyaS0pqLSp/s1NFTLnrjK0G1Ja'),
(15, 'filipe', 'cleber@gmail.com', '$2y$10$qbcuxOCbh4UqPGTn9CFTrOB5V8f.bC5j3T0Iav2wSzRWmRaosgbey'),
(16, 'filipe', 'vitor@gmail.com', '$2y$10$E9eRyv68Dc/DKoxu8DHY5ubzwkd0xwKT6ZN2ypIjdDJ0mkz132GxS'),
(17, 'filipe', 'vitorsantos240205@gmsil.com', '$2y$10$KjU54wWLN2jANoyOJAj4E.GuCv3JLRuRxgDdCh5nAyFzPM6YQRgqW'),
(35, 'filipe', 'filipeg111lima2005@gmail.com', '$2y$10$k2JSFW1mtjHRc7ZJ0t6HJuelPCuV4vCFhekVSp9OpHY..ql4rDrdu'),
(36, 'filipe', 'victor@gmail.com', '$2y$10$8v37vS64eDn3hv8D557vGu9p3xK/8t7R1x.u8h0kBLO6ATDzisMg2'),
(37, 'filipe', 'jorge@gmail.com', '$2y$10$yR0.CtmbIEHlMbcZmgefCuqLOJdqSSrRkdGn.sAH9DkqvccKD8Wi.'),
(38, 'filipe', 'hoger@gmail.com', '$2y$10$Sy183eqMvH.1YbiBFLeqt.bNW93xHOdr6NCFmCs5MhnYfqTWr6dXy'),
(39, 'kfaijioa\'', 'jofa0f@gmail.com', '$2y$10$PSFPoPDGucPzIf4jjsTHAOz1Yknkr0XlKQxdR9tQ5u.v12rKwZRLG'),
(40, 'Dieyme Vitória G', 'dieyme2012@hotmail.com', '$2y$10$/moq6/XZON5ITk7Y7pcRF.Msm5CIyEKX5dHvvpXJpl8ZBw8sp7Z2.'),
(41, 'Samuel', 'samuel@gmail.com', '$2y$10$jQa383KbTAez8FOiXVIxget9tzP2ofd/FOn9pGMCdEu3rfdOxishC'),
(42, 'Lucas Couto', 'lucascouto@gmail.com', '$2y$10$KcdKlslLN1orWeHTdfUIIux6oI/8Cte/A0pQ0lfLzOQeKjhX7fWyu');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id_task`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `task`
--
ALTER TABLE `task`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
