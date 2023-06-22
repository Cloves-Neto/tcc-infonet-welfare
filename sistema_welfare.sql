-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 22-Jun-2023 às 12:54
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
-- Banco de dados: `sistema_welfare`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

DROP TABLE IF EXISTS `cargo`;
CREATE TABLE IF NOT EXISTS `cargo` (
  `id_cargo` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `cargo_funcionario` varchar(40) NOT NULL,
  PRIMARY KEY (`id_cargo`),
  UNIQUE KEY `id_cargo` (`id_cargo`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `cargo_funcionario`) VALUES
(0001, 'administrador'),
(0002, 'medico'),
(0003, 'recepcionista');

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

DROP TABLE IF EXISTS `consulta`;
CREATE TABLE IF NOT EXISTS `consulta` (
  `id_consulta` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `fk_id_funcionario` int NOT NULL,
  `fk_crm_medico` int NOT NULL,
  `nome_medico` varchar(80) NOT NULL,
  `especialidade_medico` int NOT NULL,
  `relatorio_medico` varchar(180) NOT NULL,
  `receita_consulta` varchar(50) DEFAULT NULL,
  `fk_id_paciente` int NOT NULL,
  `nome_paciente` varchar(80) NOT NULL,
  `nome_responsavel` varchar(80) NOT NULL,
  `estado_consulta` varchar(15) NOT NULL,
  `dt_consulta` date NOT NULL,
  `hora_consulta` varchar(15) NOT NULL,
  PRIMARY KEY (`id_consulta`),
  UNIQUE KEY `id_consulta` (`id_consulta`),
  KEY `fk_id_funcionario` (`fk_id_funcionario`),
  KEY `fk_crm_medico` (`fk_crm_medico`),
  KEY `fk_id_paciente` (`fk_id_paciente`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `especialidade`
--

DROP TABLE IF EXISTS `especialidade`;
CREATE TABLE IF NOT EXISTS `especialidade` (
  `id_especialidade` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `tipo_especialidade` varchar(50) NOT NULL,
  PRIMARY KEY (`id_especialidade`),
  UNIQUE KEY `id_especialidade` (`id_especialidade`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `especialidade`
--

INSERT INTO `especialidade` (`id_especialidade`, `tipo_especialidade`) VALUES
(0001, 'alergologia'),
(0002, 'cardiologia'),
(0003, 'dermatologia'),
(0004, 'endocrinologia'),
(0005, 'psicologia'),
(0006, 'pediatria');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `id_funcionario` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nome_funcionario` varchar(80) NOT NULL,
  `email_funcionario` varchar(80) NOT NULL,
  `senha_funcionario` varchar(20) NOT NULL,
  `cpf_funcionario` char(11) NOT NULL,
  `status_funcionario` char(1) DEFAULT NULL,
  `foto_funcionario` blob,
  `cargo_funcionario` varchar(40) NOT NULL,
  PRIMARY KEY (`id_funcionario`),
  UNIQUE KEY `id_funcionario` (`id_funcionario`),
  UNIQUE KEY `cpf_funcionario` (`cpf_funcionario`),
  KEY `fk_cargo_funcionario` (`cargo_funcionario`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `nome_funcionario`, `email_funcionario`, `senha_funcionario`, `cpf_funcionario`, `status_funcionario`, `foto_funcionario`, `cargo_funcionario`) VALUES
(0001, 'Joao Vitor', 'adm@welfare.com', 'adm123456', '74185296301', 'a', , '1');
INSERT INTO `funcionario` (`id_funcionario`, `nome_funcionario`, `email_funcionario`, `senha_funcionario`, `cpf_funcionario`, `status_funcionario`, `foto_funcionario`, `cargo_funcionario`) VALUES
(0002, 'Andressa Moreira', 'rec@welfare.com', 'rec123456', '36925814702', 'a', , '2');
INSERT INTO `funcionario` (`id_funcionario`, `nome_funcionario`, `email_funcionario`, `senha_funcionario`, `cpf_funcionario`, `status_funcionario`, `foto_funcionario`, `cargo_funcionario`) VALUES
(0003, 'Andrielly Zucco', 'med@welfare.com', 'med123456', '74658934502', 'a', , '3');
INSERT INTO `funcionario` (`id_funcionario`, `nome_funcionario`, `email_funcionario`, `senha_funcionario`, `cpf_funcionario`, `status_funcionario`, `foto_funcionario`, `cargo_funcionario`) VALUES
(0004, 'Cloves Neto', 'cnadm@welfare.com', 'cnadm123456', '47825938801', 'a', , '1');
INSERT INTO `funcionario` (`id_funcionario`, `nome_funcionario`, `email_funcionario`, `senha_funcionario`, `cpf_funcionario`, `status_funcionario`, `foto_funcionario`, `cargo_funcionario`) VALUES
(0005, 'Julia Vilha', 'juadm@welffire.com', 'juadm123456', '12345678965', 'a', , '1');
INSERT INTO `funcionario` (`id_funcionario`, `nome_funcionario`, `email_funcionario`, `senha_funcionario`, `cpf_funcionario`, `status_funcionario`, `foto_funcionario`, `cargo_funcionario`) VALUES
(0006, 'Maria Silva', 'ma@email.com', 'ma123456', '24895625987', NULL, NULL, '3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem`
--

DROP TABLE IF EXISTS `mensagem`;
CREATE TABLE IF NOT EXISTS `mensagem` (
  `id_msg` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `msg` varchar(255) NOT NULL,
  UNIQUE KEY `id_msg` (`id_msg`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `mensagem`
--

INSERT INTO `mensagem` (`id_msg`, `msg`) VALUES
(0007, '\r\n       Os documentos para participar do processo do dia 23/06 devem ser entregues na bancada da ala Norte Setor-2, até 20/05.            '),
(0003, '\r\n               Ala norte Setor-3 está em isolamento temporariamente, código \"Amarelo\".'),
(0004, '\r\n                    Lembrem-se de encerrar as sessões no sistema, outros colaboradores utilizaram o mesmo equipamento, evite transtornos.'),
(0005, '\r\n                    Utilizar alcool em gel para esterilizar as mãos sempre que passar de um Setor para o outro.'),
(0006, '\r\n                    Semana do dia 13/04, folga coletiva em prol da manutenção das alas Sul e Norte. Permanece até 19/04.'),
(0008, '\r\nFavor equipe, limpar e esterilizar os equipamentos após o termino do turno.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

DROP TABLE IF EXISTS `paciente`;
CREATE TABLE IF NOT EXISTS `paciente` (
  `id_paciente` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nome_paciente` varchar(80) NOT NULL,
  `enfermidades` varchar(100) DEFAULT NULL,
  `medicamentos` varchar(100) DEFAULT NULL,
  `alergias` varchar(100) DEFAULT NULL,
  `nome_responsavel` varchar(80) DEFAULT NULL,
  `dt_nascimento_paciente` date NOT NULL,
  `dt_nascimento_responsavel` date DEFAULT NULL,
  `cpf_paciente` char(11) NOT NULL,
  `rg_paciente` char(9) NOT NULL,
  `cpf_responsavel` char(11) DEFAULT NULL,
  `rg_responsavel` char(9) DEFAULT NULL,
  `sexo_paciente` char(1) NOT NULL,
  `sexo_responsavel` char(1) DEFAULT NULL,
  `contato_paciente` varchar(11) NOT NULL,
  `contato_responsavel` varchar(11) DEFAULT NULL,
  `email_paciente` varchar(80) NOT NULL,
  `uf` char(2) NOT NULL,
  `logradouro` varchar(60) NOT NULL,
  `cep_paciente` int NOT NULL,
  `numero_casa_paciente` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_paciente`),
  UNIQUE KEY `id_paciente` (`id_paciente`),
  UNIQUE KEY `cpf_paciente` (`cpf_paciente`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `nome_paciente`, `enfermidades`, `medicamentos`, `alergias`, `nome_responsavel`, `dt_nascimento_paciente`, `dt_nascimento_responsavel`, `cpf_paciente`, `rg_paciente`, `cpf_responsavel`, `rg_responsavel`, `sexo_paciente`, `sexo_responsavel`, `contato_paciente`, `contato_responsavel`, `email_paciente`, `uf`, `logradouro`, `cep_paciente`, `numero_casa_paciente`) VALUES
(0001, 'Cloves', NULL, NULL, NULL, '', '2000-09-10', '0000-00-00', '47825938801', '551688191', '', '', 'm', '', '11967338685', NULL, 'cv@email.com', 'sp', 'Av Alda', 9980360, '459'),
(0002, 'João Pedro', NULL, NULL, NULL, NULL, '0000-00-00', NULL, '27575289462', '469521632', NULL, NULL, 'm', NULL, '11989562659', NULL, 'jao2@email.com', 'sp', 'Rua Babillon', 9911366, '10'),
(0003, 'Maria Alice', NULL, NULL, NULL, NULL, '0000-00-00', NULL, '27575259876', '562351632', NULL, NULL, 'f', NULL, '11959632654', NULL, 'mar@email.com', 'sp', 'Rua 25 de Abril', 9859660, '34'),
(0004, 'Henry Gabriel', NULL, NULL, NULL, NULL, '0000-00-00', NULL, '49862597462', '234955163', NULL, NULL, 'm', NULL, '11926459878', NULL, 'hen2@email.com', 'sp', 'Rua Joana Darc', 9911548, '5963'),
(0005, 'Carlos Freitas', NULL, NULL, NULL, NULL, '0000-00-00', NULL, '27369549446', '497651632', NULL, NULL, 'm', NULL, '11956623956', NULL, 'car@email.com', 'sp', 'Rua Homero Roy', 9911569, '25'),
(0006, 'Vanuza Souza', NULL, NULL, NULL, NULL, '0000-00-00', NULL, '78975281652', '562746952', NULL, NULL, 'f', NULL, '11949502270', NULL, 'van@email.com', 'sp', 'Rua Homero Roy', 9911569, '25'),
(0007, 'Tucco Paulo', NULL, NULL, NULL, NULL, '0000-00-00', NULL, '96486289448', '324691632', NULL, NULL, 'm', NULL, '11989654523', NULL, 'tuc@email.com', 'sp', 'Rua Kablin', 9986526, '65'),
(0008, 'Marcio Talles', NULL, NULL, NULL, NULL, '0000-00-00', NULL, '34675279562', '498651632', NULL, NULL, 'm', NULL, '11977896502', NULL, 'marcio@email.com', 'sp', 'Rua Gabriel de Olinda', 9980560, '89'),
(0009, 'Joana Paula', NULL, NULL, NULL, NULL, '0000-00-00', NULL, '69516489479', '564589423', NULL, NULL, 'f', NULL, '11989757524', NULL, 'joana@email.com', 'sp', 'Rua Parse', 9911569, '178'),
(0010, 'Henrrique Pablo', NULL, NULL, NULL, NULL, '0000-00-00', NULL, '34695289462', '495655163', NULL, NULL, 'm', NULL, '11946595960', NULL, 'hqpablo@email.com', 'sp', 'Rua Floww', 9911569, '558');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
