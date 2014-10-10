Cadastro-de-Produtos-PHP
========================

Projeto de Desenvolvimento Web - Talita


<h3>Sql inicial</h3>
<code>
create database produtos_php;
CREATE TABLE `produtos_php`.`produto` (
  `id` INT NOT NULL,
  `nome` VARCHAR(45) NULL,
  `imagem` VARCHAR(45) NULL,
  `preco` DECIMAL(10,2) NULL,
  `descricao` VARCHAR(255) NULL,
  PRIMARY KEY (`id`));
  </code>
