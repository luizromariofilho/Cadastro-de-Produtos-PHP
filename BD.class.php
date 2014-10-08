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
	}

	function inserir($produto){
		array_push($this->produtos, $produto);
	}

	function getAll(){
		return $this->produtos;
	}

	function get($id){
		foreach ($this->produtos as $i => $value) {
			if($value->id == $id){
				return $value;
			}
		}
		return null;
	}
}
?>