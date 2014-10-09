<?php
	require_once("bootstrap.php");

	$nome = $_POST["nome"];
	$id = $_POST["id"];
	$preco = $_POST["preco"];
	$descricao = $_POST["descricao"];
	print_r($_FILES);
	$image = $_FILES['image'];

	$produto = new Produto();
	$produto->id = $id;
	$produto->nome = $nome;
	$produto->preco = $preco;
	$produto->descricao = $descricao;

	try {

     	$arquivo_tmp = $image['tmp_name'];
	    $nome = $image['name'];
	    $produto->imagem = $nome;
	    // Pega a extensao
	    $extensao = strrchr($nome, '.');
	 
	    // Converte a extensao para mimusculo
	    $extensao = strtolower($extensao);
 
	    // Somente imagens, .jpg;.jpeg;.gif;.png
	    // Aqui eu enfilero as extesões permitidas e separo por ';'
	    // Isso server apenas para eu poder pesquisar dentro desta String
	    if(strstr('.jpg;.jpeg;.gif;.png', $extensao))
	    {
	        // Cria um nome único para esta imagem
	        // Evita que duplique as imagens no servidor.
	        $novoNome = md5(microtime()) . $extensao;
	         
	        // Concatena a pasta com o nome
	        $destino = 'images/' . $novoNome; 
	         
	        // tenta mover o arquivo para o destino
	        if( @move_uploaded_file( $arquivo_tmp, $destino  ))
	        {
        		$bd->inserir($produto);
				header('location: index.php?status=1');
	        } else{
				header('location: index.php?status=0');
	        }
        }
    } catch (Exception $e) {
		header('location: index.php?status=0');
    }
?>