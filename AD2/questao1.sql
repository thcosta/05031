CREATE DATABASE IF NOT EXISTS `leitos_hospitalares`;

USE `leitos_hospitalares`;

-- Cria Tabela Cidade
CREATE TABLE `cidade` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);
-- Cria Tabela Hospital
CREATE TABLE `hospital` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `cidade_id` bigint(20) NOT NULL,
  CONSTRAINT `fk_hospital_cidade_id` FOREIGN KEY (`cidade_id`) REFERENCES `cidade` (`id`),
  KEY `index_hospital_on_cidade_id` (`cidade_id`),
  PRIMARY KEY (`id`)
);
-- Cria Tabela Leito
CREATE TABLE `leito` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) NOT NULL,
  `hospital_id` bigint(20) NOT NULL,
  CONSTRAINT `fk_leito_hospital_id` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`id`),
  KEY `index_leito_hospital_id` (`hospital_id`),
  PRIMARY KEY (`id`)
);
-- Cria Tabela Paciente
CREATE TABLE `paciente` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `prontuarioSUS` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);
-- Cria Tabela Transacao
CREATE TABLE `transacao` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `leito_id` bigint(20) DEFAULT NULL,
  `paciente_id` bigint(20) DEFAULT NULL,
  `status` varchar(15) DEFAULT 'Disponível',
  `data` datetime NOT NULL,
  CONSTRAINT `fk_transacao_leito_id` FOREIGN KEY (`leito_id`) REFERENCES `leito` (`id`),
  KEY `index_transacao_leito_id` (`leito_id`),
  CONSTRAINT `fk_transacao_paciente_id` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`),
  KEY `index_transacao_paciente_id` (`paciente_id`),
  PRIMARY KEY (`id`)
);