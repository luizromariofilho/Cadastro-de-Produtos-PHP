Cadastro-de-Produtos-PHP
========================

Projeto de Desenvolvimento Web - Talita


<h3>Sql inicial</h3>
<code>
<h4>BD</h4>
CREATE DATABASE produtos_php;
<br />
<h4>TABLE</h4>
CREATE TABLE `produtos_php`.`produto` (
  `id` INT NOT NULL,
  `nome` VARCHAR(45) NULL,
  `imagem` VARCHAR(45) NULL,
  `preco` DECIMAL(10,2) NULL,
  `descricao` VARCHAR(255) NULL,
  PRIMARY KEY (`id`));
  </code>
