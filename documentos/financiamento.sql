-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08-Nov-2016 às 20:14
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `financiamento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `cod_projeto` int(11) NOT NULL,
  `login_avaliador` varchar(50) NOT NULL,
  `cod_criterio` int(11) NOT NULL,
  `nota` smallint(6) NOT NULL,
  `data` date NOT NULL,
  `sugestao` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`cod_projeto`, `login_avaliador`, `cod_criterio`, `nota`, `data`, `sugestao`) VALUES
(12, 'netobaiuca', 1, 10, '2016-11-08', 'Muito bom'),
(12, 'netobaiuca', 2, 10, '2016-11-08', 'Muito bom'),
(12, 'netobaiuca', 3, 10, '2016-11-08', 'Muito bom'),
(12, 'netobaiuca', 4, 10, '2016-11-08', 'Muito bom'),
(12, 'netobaiuca', 5, 10, '2016-11-08', 'Muito bom'),
(12, 'netobaiuca', 6, 10, '2016-11-08', 'Muito bom'),
(20, 'netobaiuca', 1, 7, '2016-11-08', 'Está muito bom.'),
(20, 'netobaiuca', 2, 5, '2016-11-08', 'Está muito bom.'),
(20, 'netobaiuca', 3, 10, '2016-11-08', 'Está muito bom.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `criterio_avaliacao`
--

CREATE TABLE `criterio_avaliacao` (
  `codigo` int(11) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `criterio` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `peso` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `criterio_avaliacao`
--

INSERT INTO `criterio_avaliacao` (`codigo`, `categoria`, `criterio`, `status`, `peso`) VALUES
(1, 'Pesquisa', 'Criterio 1', 1, 5),
(2, 'Pesquisa', 'Criterio 2', 1, 5),
(3, 'Pesquisa', 'Criterio 3', 1, 5),
(4, 'Inovação no Ensino', 'Criterio 4', 1, 2),
(5, 'Inovação no Ensino', 'Criterio 5', 1, 5),
(6, 'Inovação no Ensino', 'Criterio 6', 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto_candidato`
--

CREATE TABLE `projeto_candidato` (
  `cod_projeto` int(4) NOT NULL,
  `nome_projeto` varchar(200) NOT NULL,
  `categoria_projeto` varchar(30) NOT NULL,
  `duracao_projeto` int(5) NOT NULL,
  `valor_projeto` double NOT NULL,
  `status_projeto` varchar(15) NOT NULL,
  `descricao_projeto` varchar(3000) NOT NULL,
  `imagem_projeto` varchar(200) NOT NULL,
  `video_projeto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `projeto_candidato`
--

INSERT INTO `projeto_candidato` (`cod_projeto`, `nome_projeto`, `categoria_projeto`, `duracao_projeto`, `valor_projeto`, `status_projeto`, `descricao_projeto`, `imagem_projeto`, `video_projeto`) VALUES
(11, 'Petrolífera São Vicente', 'Inovação no Ensino', 120, 0, 'candidato', 'Petróleo', '0ab967d01615830ca5ce9790e9a8b40c.jpg', 'https://www.youtube.com/embed/IoAy3hmxsHI?list=PLPG6IWq8HSf936FRZo25cMpcM0Wu2HO1F'),
(12, 'Sapataria', 'Pesquisa', 200, 120, 'finalizado', 'Sapatos', '0ab967d01615830ca5ce9790e9a8b40c.jpg', 'https://www.youtube.com/embed/endMhISFXXY?list=PLPG6IWq8HSf936FRZo25cMpcM0Wu2HO1F'),
(13, 'Crescimento', 'Pesquisa', 120, 150, 'aprovado', 'Crescer', '0ab967d01615830ca5ce9790e9a8b40c.jpg', 'https://www.youtube.com/embed/EKaXkrzX4Ek?list=PLPG6IWq8HSf936FRZo25cMpcM0Wu2HO1F'),
(20, 'Bicicletaria São Vicente', 'Pesquisa', 12, 120, 'candidato', 'Bicicreta', '2aa9d285f948bd2229d06e0699b41010.jpg', 'https://www.youtube.com/embed/-_cGVN70cTo?list=PLPG6IWq8HSf936FRZo25cMpcM0Wu2HO1F'),
(22, 'Buraco Negro', 'Pesquisa', 12, 0, 'candidato', 'Espaço', '0ab967d01615830ca5ce9790e9a8b40c.jpg', 'https://www.youtube.com/embed/CLPPv9KT2RQ?list=PLPG6IWq8HSf936FRZo25cMpcM0Wu2HO1F'),
(23, 'Bicicleta', 'Inovação no Ensino', 120, 0, 'candidato', 'Projeto revolucionário que visa diminuir o transito e poluição nas cidades. além de melhorar a saúde dos cidadãos através de um auxílio para todos conseguirem ter sua própria bicicleta.', 'e59fc40af7041dd9cee6d5b96909858c.jpg', 'https://www.youtube.com/embed/pjE-QH8tZQQ?list=PLPG6IWq8HSf936FRZo25cMpcM0Wu2HO1F'),
(24, 'Pastelaria', 'Inovação no Ensino', 111, 0, 'candidato', 'Pastéis', '2aa9d285f948bd2229d06e0699b41010.jpg', 'https://www.youtube.com/embed/Uca6TcQCdAk?list=PLPG6IWq8HSf936FRZo25cMpcM0Wu2HO1F'),
(25, 'Banca', 'Inovação no Ensino', 12, 0, 'candidato', 'Revistas', '20fb64de8b74cf7db67726dc5b729af0.jpg', 'https://www.youtube.com/embed/np5mrewO9oQ?list=PLPG6IWq8HSf936FRZo25cMpcM0Wu2HO1F');

-- --------------------------------------------------------

--
-- Estrutura da tabela `repasse`
--

CREATE TABLE `repasse` (
  `cod_projeto` int(11) NOT NULL,
  `necessidade` varchar(200) NOT NULL,
  `data` date NOT NULL,
  `valor` double NOT NULL,
  `status` tinyint(4) NOT NULL,
  `cod_repasse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `repasse`
--

INSERT INTO `repasse` (`cod_projeto`, `necessidade`, `data`, `valor`, `status`, `cod_repasse`) VALUES
(12, 'Borracha', '2016-11-08', 1500, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `login` varchar(25) NOT NULL,
  `senha` varchar(25) NOT NULL,
  `nome_completo` varchar(100) NOT NULL,
  `cpf` int(12) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `data_nascimento` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `categoria` varchar(30) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`login`, `senha`, `nome_completo`, `cpf`, `pais`, `cidade`, `estado`, `endereco`, `data_nascimento`, `email`, `tipo`, `categoria`, `status`) VALUES
('neto', 'aa', 'as', 111, 'asd', 'asd', 'asd', 'asd', '1995-02-04', 'gevo@fevo', 'Gestor de Projetos', '', 1),
('netobaiuca', 'hhh', 'Geraldo', 1112223, 'Brasil', 'Paraisópolis', 'Minas Gerais', 'Travessa Alves de Lima 366', '2016-07-23', 'gevo.neto@hotmail.com', 'Avaliador de Projetos', 'Pesquisa', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`cod_projeto`,`login_avaliador`,`cod_criterio`);

--
-- Indexes for table `criterio_avaliacao`
--
ALTER TABLE `criterio_avaliacao`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `projeto_candidato`
--
ALTER TABLE `projeto_candidato`
  ADD PRIMARY KEY (`cod_projeto`);

--
-- Indexes for table `repasse`
--
ALTER TABLE `repasse`
  ADD PRIMARY KEY (`cod_repasse`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `criterio_avaliacao`
--
ALTER TABLE `criterio_avaliacao`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `projeto_candidato`
--
ALTER TABLE `projeto_candidato`
  MODIFY `cod_projeto` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `repasse`
--
ALTER TABLE `repasse`
  MODIFY `cod_repasse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
