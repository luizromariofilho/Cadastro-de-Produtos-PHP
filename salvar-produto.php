<?php
	require_once("bootstrap.php");

	$nome = $_POST["nome"];
	$id = $_POST["id"];
	$preco = $_POST["preco"];
	$descricao = $_POST["descricao"];
	//$image = $_FILE['image'];

	$produto = new Produto();
	$produto->id = $id;
	$produto->nome = $nome;
	$produto->preco = $preco;
	$produto->descricao = $descricao;

	try {
        $bd->inserir($produto);
        $_SESSION['bd'] = $bd;
		header('location: index.php?status=1');
    } catch (Exception $e) {
		header('location: index.php?status=0');
    }
?>