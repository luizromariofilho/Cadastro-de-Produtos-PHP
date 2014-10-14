<?php

/**
* 
*/
class BD
{
	var $produtos; //inicializa um array de  produtos vazio

	function __construct()
	{
		$this->produtos = array(); 
		$hostname = "localhost";   //inicializa dados do bd 
	    $username = "root";    
	    $password = "";
 
   		mysql_connect("$hostname", "$username", "$password") or die(mysql_error()); //faz a conexão com o banco de dados, caso contrario indica um erro 
    	mysql_select_db("produtos_php") or die(mysql_error()); // seleciona o bd a ser usado, caso contrario da erro 
	}

	function inserir($produto){ //insere um produto no bd
		$sql = "INSERT INTO produto (id, nome,preco, imagem, descricao) 
				VALUES ($produto->id, '$produto->nome', $produto->preco, '$produto->imagem', '$produto->descricao')";
	    $result = mysql_query($sql); //variavel result recebe o resultado da consulta ao bd
	    return $result; //retorna o resultado
	}

	function atualizar($produto){ //atualiza um produto no bd
		$sql = "UPDATE produto 
				SET nome = '$produto->nome', preco = $produto->preco, 
					imagem = '$produto->imagem', descricao = '$produto->descricao'
				WHERE id = $produto->id";
	    $result = mysql_query($sql);
	    return $result;
	}

	function getAll(){ //pega todos os produtos cadastrados no bd 
		$result = mysql_query("SELECT * FROM produto");
	    while($row = mysql_fetch_assoc($result)){ // Enquanto existir uma linha de dados, coloca esta linha em $row como uma matriz associativa
	    	
	    	$produto = new Produto();

	        $produto->id = $row['id'];
	        $produto->nome = $row['nome'];
	        $produto->descricao = $row['descricao'];
	        $produto->imagem = $row['imagem'];
	        $produto->preco = $row['preco'];
	        array_push($this->produtos, $produto); //vai inserindo os protudos no array produtos criado anteriormente
	    }
    	return $this->produtos;
	}

	function get($id){ //pega apenas um produto do bd
		$result = mysql_query("SELECT * FROM produto where id = $id"); //o produto é definido pela sua id 
	    $row = mysql_fetch_assoc($result);
        
        $produto = new Produto();
        
        $produto->id = $row['id'];
        $produto->nome = $row['nome'];
        $produto->descricao = $row['descricao'];
        $produto->imagem = $row['imagem'];
        $produto->preco = $row['preco'];
	    
    	return $produto;
	}
}
?>