<?php
	require_once("bootstrap.php");




	$nome = $_POST["nome"];
	$preco = $_POST["preco"];
	$descricao = $_POST["descricao"];
	$image = $_FILES['image'];

	if(isset($_POST["id"])){
		$id = $_POST["id"];

		$produto = $bd->get($id);
		$produto->nome = $nome;
		$produto->preco = $preco;
		$produto->descricao = $descricao;
		try {
			if(!isset($_FILES['image'])){
				header('location: index.php?status=2');
			}
		    $image_nome = $image['name'];
		    $produto->imagem = $image_nome;
	        $destino = 'images/' . $image_nome; 
	        // tenta mover o arquivo para o destino
	        if( @move_uploaded_file($image['tmp_name'], $destino  )) {
	    		if($bd->atualizar($produto)){
					header('location: index.php?status=1');
	    		} else{
					header('location: index.php?status=0');
	    		}
	        } else{
				header('location: index.php?status=2');
	        }
	    } catch (Exception $e) {
			header('location: index.php?status=0');
	    }
	} else{
		$produto = new Produto();
		$produto->nome = $nome;
		$produto->preco = $preco;
		$produto->descricao = $descricao;
		try {
			if(!isset($_FILES['image'])){
				header('location: index.php?status=2');
			}
		    $image_nome = $image['name'];
		    $produto->imagem = $image_nome;
	        $destino = 'images/' . $image_nome; 
	        $id = count($bd->getAll()) + 1;
	        $produto->id = $id;
	        // tenta mover o arquivo para o destino
	        if( @move_uploaded_file($image['tmp_name'], $destino  )) {
	    		if($bd->inserir($produto)){
					header('location: index.php?status=1');
	    		} else{
					header('location: index.php?status=0');
	    		}
	        } else{
				header('location: index.php?status=2');
	        }
	    } catch (Exception $e) {
			header('location: index.php?status=0');
	    }
	}
?>