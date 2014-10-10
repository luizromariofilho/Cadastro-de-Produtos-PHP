<?php 
	/* importa a classe que simula o banco de dados */
	require_once('BD.class.php');
	/* importa a classe produto */
	require_once('Produto.class.php');

	/* inicializa o "banco de dados" */
	$bd =  new BD();		

	$produto = new Produto();
	$produto->id = 0;
	$produto->nome = "teste1";
	$produto->preco = "200";
	$produto->descricao = "teste 1";
	$produto->imagem = "image.jpg";

	$produto2 = new Produto();
	$produto2->id = 1;
	$produto2->nome = "teste2";
	$produto2->preco = "100";
	$produto2->descricao = "teste 2";
	$produto2->imagem = "download.jpg";

	$bd->inserir($produto);
	$bd->inserir($produto2);
?>