<?php

/**
* 
*/
class BD
{
	var $produtos;

	function __construct()
	{
		$this->produtos = array();
		$hostname = "localhost";    
	    $username = "root";    
	    $password = "";
 
   		mysql_connect("$hostname", "$username", "$password") or die(mysql_error());
    	mysql_select_db("produtos_php") or die(mysql_error());
	}

	function inserir($produto){
		$sql = "INSERT INTO produto (id, nome,preco, imagem, descricao) 
				VALUES ($produto->id, '$produto->nome', $produto->preco, '$produto->imagem', '$produto->descricao')";
	    $result = mysql_query($sql);
	    return $result;
	}

	function atualizar($produto){
		$sql = "UPDATE produto 
				SET nome = '$produto->nome', preco = $produto->preco, 
					imagem = '$produto->imagem', descricao = '$produto->descricao'
				WHERE id = $produto->id";
	    $result = mysql_query($sql);
	    return $result;
	}

	function getAll(){
		$result = mysql_query("SELECT * FROM produto");
	    while($row = mysql_fetch_assoc($result)){
	    	
	    	$produto = new Produto();

	        $produto->id = $row['id'];
	        $produto->nome = $row['nome'];
	        $produto->descricao = $row['descricao'];
	        $produto->imagem = $row['imagem'];
	        $produto->preco = $row['preco'];
	        array_push($this->produtos, $produto);
	    }
    	return $this->produtos;
	}

	function get($id){
		$result = mysql_query("SELECT * FROM produto where id = $id");
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