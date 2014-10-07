<?php
	$nome = $_POST["nome"];
	$preco = $_POST["preco"];
	$descricao = $_POST["descricao"];

	if(1 == 1){
		header('location: index.php?status=1');
	} else{
		header('location: index.php?status=0');
	}
?>