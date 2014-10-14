<?php
	require_once("bootstrap.php");



	//Abaixo as variaveis recebem os valores via POST ou seja digitados no formulário 
	$nome = $_POST["nome"];
	$preco = $_POST["preco"];
	$descricao = $_POST["descricao"];
	$image = $_FILES['image']; //as imagens são recebidas via FILES

	if(isset($_POST["id"])){ //testa se o id foi recebido via POST
		$id = $_POST["id"];

		$produto = $bd->get($id);
		$produto->nome = $nome; //variaveis recebem os valores preenchidos no formulario
		$produto->preco = $preco;
		$produto->descricao = $descricao;
		try {
			if(!isset($_FILES['image'])){ // verifica se a variavel $_FILES['image'] não existe
				header('location: index.php?status=2'); //caso não exista o status recebe o valor 2 para indicar erro
			} //caso contrario as variaveis recebem seus respectivos valores
		    $image_nome = $image['name']; 
		    $produto->imagem = $image_nome;
	        $destino = 'images/' . $image_nome; //cria um destino para receber as imagens
	        // tenta mover o arquivo para o destino
	        if( @move_uploaded_file($image['tmp_name'], $destino  )) {
	    		if($bd->atualizar($produto)){ //caso tenha sido movida para destino tenta atualizar o protudo no bd
					header('location: index.php?status=1'); //caso consiga o status recebe 1 para exibir mensagem de sucesso
	    		} else{
					header('location: index.php?status=0'); //caso não atualize recebe 0 para exibir erro
	    		}
	        } else{
				header('location: index.php?status=2'); //caso não consiga mover para o destino status recebe valor 2 para imprimir erro de imagem 
	        }
	    } catch (Exception $e) {
			header('location: index.php?status=0');
	    }
	} else{ //caso o id não tenha sido recebido via POST ele é novo, ou seja, novo produto
		$produto = new Produto(); //cria novo produto
		$produto->nome = $nome;
		$produto->preco = $preco;
		$produto->descricao = $descricao;
		try {
			if(!isset($_FILES['image'])){ //verifica se a variavel FILES não existe
				header('location: index.php?status=2'); //caso verdadeiro status recebe valos 2 referente a erro de imagem
			} //caso contrario cada atributo recebe seu respectivo valor
		    $image_nome = $image['name'];
		    $produto->imagem = $image_nome;
	        $destino = 'images/' . $image_nome; 
	        $id = count($bd->getAll()) + 1; //variavel incremental que gera os valores dos ids
	        $produto->id = $id;
	        // tenta mover o arquivo para o destino
	        if( @move_uploaded_file($image['tmp_name'], $destino  )) {
	    		if($bd->inserir($produto)){ //tenta inserir o produto no bd
					header('location: index.php?status=1'); //caso verdadeiro status recebe valor 1
	    		} else{ //caso não insira corretamente status recebe valor 0
					header('location: index.php?status=0');
	    		}
	        } else{ //caso não mova a imagem para destino status recebe valor 2 
				header('location: index.php?status=2');
	        }
	    } catch (Exception $e) {
			header('location: index.php?status=0');
	    }
	}
?>