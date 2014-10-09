<?php 
	/* importa a classe que simula o banco de dados */
	require_once('BD.class.php');
	/* importa a classe produto */
	require_once('Produto.class.php');

    session_start ();

	/* inicializa o "banco de dados" */
	$bd =  new BD();		

	$produto = new Produto();
	$produto->id = 0;
	$produto->nome = "teste1";
	$produto->descricao = "teste 1";

	$produto2 = new Produto();
	$produto2->id = 1;
	$produto2->nome = "teste2";
	$produto2->descricao = "teste 2";

	$bd->inserir($produto);
	$bd->inserir($produto2);

	if(!isset($_SESSION['bd'])){
		$_SESSION['bd'] = $bd;
	}
?>