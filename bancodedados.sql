-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 06-Nov-2022 às 19:32
-- Versão do servidor: 5.7.23-23
-- versão do PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bairpfhw_biblioteca`
--
CREATE DATABASE IF NOT EXISTS `bairpfhw_biblioteca` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `bairpfhw_biblioteca`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE `autor` (
  `cd` int(11) NOT NULL,
  `nm_autor` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `autor`
--

INSERT INTO `autor` (`cd`, `nm_autor`) VALUES
(2, 'Victor Hugo'),
(3, 'Tolstói'),
(5, 'Evelyn Hugo'),
(6, 'Machado de Assis'),
(8, 'J. R. R. Tolkien'),
(9, 'Jack Kirby'),
(14, 'Jean Jacques Rousseau'),
(15, 'Ramson Riggs'),
(16, 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor_livro`
--

CREATE TABLE `autor_livro` (
  `id_livro` int(11) DEFAULT NULL,
  `id_autor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `autor_livro`
--

INSERT INTO `autor_livro` (`id_livro`, `id_autor`) VALUES
(89, 14),
(94, 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `editora`
--

CREATE TABLE `editora` (
  `cd` int(11) NOT NULL,
  `nm_editora` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `editora`
--

INSERT INTO `editora` (`cd`, `nm_editora`) VALUES
(1, 'Martin Claret'),
(3, 'Seguinte'),
(4, 'Grupo Editorial Record'),
(5, 'Intrinseca'),
(6, 'Panini'),
(11, 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimo`
--

CREATE TABLE `emprestimo` (
  `cd` int(11) NOT NULL,
  `dt_emprestimo` date DEFAULT NULL,
  `dt_prevista` date DEFAULT NULL,
  `dt_devolução` date DEFAULT NULL,
  `status_emprestimo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_usuario` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `emprestimo`
--

INSERT INTO `emprestimo` (`cd`, `dt_emprestimo`, `dt_prevista`, `dt_devolução`, `status_emprestimo`, `id_usuario`) VALUES
(20, '2022-10-03', '0000-00-00', NULL, 'Devendo', '11112');

-- --------------------------------------------------------

--
-- Estrutura da tabela `favorito`
--

CREATE TABLE `favorito` (
  `cd` int(11) NOT NULL,
  `id_usuario` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_livro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fila`
--

CREATE TABLE `fila` (
  `cd` int(11) NOT NULL,
  `id_livro` int(11) DEFAULT NULL,
  `id_usuario` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

CREATE TABLE `genero` (
  `cd` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `genero`
--

INSERT INTO `genero` (`cd`, `nome`) VALUES
(1, 'Fantasia'),
(2, 'Terror'),
(4, 'Romance'),
(5, 'Novela'),
(16, 'Ação e Aventura'),
(18, 'Filosofia'),
(19, 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `cd` int(11) NOT NULL,
  `isbn` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `titulo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ano` int(4) DEFAULT NULL,
  `qtd` int(11) DEFAULT NULL,
  `sinopse` longtext COLLATE utf8_unicode_ci,
  `capa` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `classificacao` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_editora` int(11) DEFAULT NULL,
  `id_genero` int(11) DEFAULT NULL,
  `estado` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`cd`, `isbn`, `titulo`, `ano`, `qtd`, `sinopse`, `capa`, `classificacao`, `id_editora`, `id_genero`, `estado`) VALUES
(89, '2918349814', 'Da Educação', 2006, 2, 'Fala de Educação man', '81M+qK6BQuL.jpg', 'Livre', 4, 1, 'LINDO'),
(94, '8580578906', 'Biblioteca de Almas', 2006, 1, 'Fala de Guerra e Amor bro', 'bb.jpg', 'Livre', 5, 4, 'Usado'),
(96, '32948903', 'O Princípe', 2006, 2, 'Como ser um extremista', 'oprincipe.jpg', 'Livre', 1, 1, 'Usado'),
(97, '000101', 'teste', 2020, 1, 'teste', 'teste.webp', 'teste', 11, 19, 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro_emprestimo`
--

CREATE TABLE `livro_emprestimo` (
  `id_emprestimo` int(11) DEFAULT NULL,
  `id_livro` int(11) DEFAULT NULL,
  `nota` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `livro_emprestimo`
--

INSERT INTO `livro_emprestimo` (`id_emprestimo`, `id_livro`, `nota`) VALUES
(20, 94, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `rm` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `genero` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `senha` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `perfil` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_status` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `obs` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adm` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`rm`, `nome`, `email`, `dt_nascimento`, `genero`, `telefone`, `senha`, `perfil`, `user_status`, `obs`, `adm`) VALUES
('04051', 'Menchon', 'm@mad', '2020-02-01', 'F', '333', '123', 'teste.webp', 'ativo', 'teste', b'1'),
('11111', 'Giovanna Nunes de Oliveira', 'gi@gmail.com', '2006-02-22', 'M', '13994949494', 'gi123', 'gi.jpg', 'ativo', 'brother do Melbbss', b'1'),
('11112', 'Larissa Prado', 'lariprado@gmail.com', '2006-05-05', 'F', '13994949494', 'lari123', 'larilinda.jpg', 'ativo', 'friend do Melbbss', b'1'),
('11113', 'Luca Poe de Almeida', 'luca@gmail.com', '2006-05-05', 'M', '13994949494', 'luca123', 'luca.jpg', 'ativo', 'primo do Melbbss', b'1'),
('11115', 'Nathy', 'nathy@gmail.com', '2006-05-05', 'F', '13994949494', 'nathy123', 'nathyLinda.jpg', 'ativo', 'friend do Melbbss', b'1'),
('11117', 'Rodolfo Primocena de Araujo', 'rodos@gmail.com', '2006-05-05', 'M', '13 99888888', 'rodolfoLindo123', 'rodolfo.jpg', 'ativo', 'é o Rodolfo exquece', b'1');

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vwLivros`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `vwLivros` (
`cd` int(11)
,`isbn` varchar(100)
,`titulo` varchar(200)
,`ano` int(4)
,`qtd` int(11)
,`sinopse` longtext
,`capa` varchar(200)
,`classificacao` varchar(45)
,`id_editora` int(11)
,`id_genero` int(11)
,`estado` longtext
,`genero` varchar(100)
,`Editora` varchar(80)
,`Autor` varchar(60)
);

-- --------------------------------------------------------

--
-- Estrutura para vista `vwLivros`
--
DROP TABLE IF EXISTS `vwLivros`;

CREATE ALGORITHM=UNDEFINED DEFINER=`bairpfhw`@`localhost` SQL SECURITY DEFINER VIEW `vwLivros`  AS SELECT `l`.`cd` AS `cd`, `l`.`isbn` AS `isbn`, `l`.`titulo` AS `titulo`, `l`.`ano` AS `ano`, `l`.`qtd` AS `qtd`, `l`.`sinopse` AS `sinopse`, `l`.`capa` AS `capa`, `l`.`classificacao` AS `classificacao`, `l`.`id_editora` AS `id_editora`, `l`.`id_genero` AS `id_genero`, `l`.`estado` AS `estado`, `g`.`nome` AS `genero`, `e`.`nm_editora` AS `Editora`, `a`.`nm_autor` AS `Autor` FROM ((((`livro` `l` join `genero` `g`) join `editora` `e`) join `autor` `a`) join `autor_livro` `al`) WHERE ((`l`.`id_genero` = `g`.`cd`) AND (`l`.`id_editora` = `e`.`cd`) AND (`al`.`id_autor` = `a`.`cd`) AND (`al`.`id_livro` = `l`.`cd`)) ORDER BY `l`.`cd` DESC ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`cd`);

--
-- Índices para tabela `autor_livro`
--
ALTER TABLE `autor_livro`
  ADD KEY `id_livro` (`id_livro`),
  ADD KEY `id_autor` (`id_autor`);

--
-- Índices para tabela `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`cd`);

--
-- Índices para tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD PRIMARY KEY (`cd`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `favorito`
--
ALTER TABLE `favorito`
  ADD PRIMARY KEY (`cd`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_livro` (`id_livro`);

--
-- Índices para tabela `fila`
--
ALTER TABLE `fila`
  ADD PRIMARY KEY (`cd`),
  ADD KEY `id_livro` (`id_livro`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`cd`);

--
-- Índices para tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`cd`),
  ADD KEY `id_editora` (`id_editora`),
  ADD KEY `id_genero` (`id_genero`);

--
-- Índices para tabela `livro_emprestimo`
--
ALTER TABLE `livro_emprestimo`
  ADD KEY `id_emprestimo` (`id_emprestimo`),
  ADD KEY `id_livro` (`id_livro`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`rm`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `cd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `editora`
--
ALTER TABLE `editora`
  MODIFY `cd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  MODIFY `cd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `favorito`
--
ALTER TABLE `favorito`
  MODIFY `cd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fila`
--
ALTER TABLE `fila`
  MODIFY `cd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `genero`
--
ALTER TABLE `genero`
  MODIFY `cd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `cd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `autor_livro`
--
ALTER TABLE `autor_livro`
  ADD CONSTRAINT `autor_livro_ibfk_1` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`cd`),
  ADD CONSTRAINT `autor_livro_ibfk_2` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`cd`);

--
-- Limitadores para a tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD CONSTRAINT `emprestimo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`rm`);

--
-- Limitadores para a tabela `favorito`
--
ALTER TABLE `favorito`
  ADD CONSTRAINT `favorito_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`rm`),
  ADD CONSTRAINT `favorito_ibfk_2` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`cd`);

--
-- Limitadores para a tabela `fila`
--
ALTER TABLE `fila`
  ADD CONSTRAINT `fila_ibfk_1` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`cd`),
  ADD CONSTRAINT `fila_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`rm`);

--
-- Limitadores para a tabela `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `livro_ibfk_1` FOREIGN KEY (`id_editora`) REFERENCES `editora` (`cd`),
  ADD CONSTRAINT `livro_ibfk_2` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`cd`);

--
-- Limitadores para a tabela `livro_emprestimo`
--
ALTER TABLE `livro_emprestimo`
  ADD CONSTRAINT `livro_emprestimo_ibfk_1` FOREIGN KEY (`id_emprestimo`) REFERENCES `emprestimo` (`cd`),
  ADD CONSTRAINT `livro_emprestimo_ibfk_2` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`cd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
