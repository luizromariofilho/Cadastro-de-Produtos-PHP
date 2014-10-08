<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Minha Loja - <?= $title ?></title>

	    <!-- Bootstrap -->
	    <link href="css/bootstrap.min.css" rel="stylesheet">
	    <link href="css/estilo.css" rel="stylesheet">

	    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	     	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	     	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
  	</head>
  	<body>
		<div class="page-header">
        	<div class="container">
        		<h1>Bem Vindo à Loja</h1>
    		</div>
      	</div>
  	<?php 
  		/* importa a classe que simula o banco de dados */
  		require_once('BD.class.php');
  		/* importa a classe produto */
  		require_once('Produto.class.php');

  		/* inicializa o "banco de dados" */
 		$bd = new BD(); 


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
  	?>