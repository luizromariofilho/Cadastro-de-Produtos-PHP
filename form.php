<?php 
	require_once("bootstrap.php"); //importa o arquivo bootstrap

	if(isset($_GET["id"])){ // testa se o id do produto foi passado via url(GET)
		$title = "Editar"; //titulo da pagina - Editar pois o id veio da url 
		$id = $_GET["id"]; //recebe o id passado via url
		$produto = $bd->get($id); //recebe o produto referente ao id 
	}else{
		$title = "Novo"; //caso o id não tenha sido recebido por url
		$produto = new Produto(); //cria um novo produto
	}
	require_once("cabecalho.php");
?>

<script type="text/javascript">
	function voltar(){
		window.history.back(); //funcao para voltar a pagina anterior
	}
</script>
<h1>Cadastro de Produto</h1>
<div class="col-md-6">
	<form class="form" action="salvar-produto.php" method="post" enctype="multipart/form-data">
		<?php
			if(isset($_GET["id"])){ // testa se o id do produto foi passado via url
				echo "<input name='id' type='hidden' value='$produto->id;'>"; 
			} //caso não tenha sido recebido por url pega os valores preenchidos no formulário 
		?>
		<div class="form-group"> 
			<label>Nome</label>
			<input type="text" name="nome" class="form-control" value="<?= $produto->nome;?>" />
		</div>
		<div class="form-group">
			<label>Preço</label>
			<input type="number" name="preco" class="form-control" value="<?= $produto->preco;?>" />
		</div>
		<div class="form-group">
			<label>Foto</label>
			<?php 
				if($produto->imagem){
					echo "<span>$produto->imagem;</span>";
				}
			?>
			<input type="file"  name="image" class="form-control" value="<?= $produto->imagem; ?>" />
		</div>
		<div class="form-group">
			<label>Descrição</label>
			<textarea name="descricao" class="form-control"><?= $produto->descricao;?></textarea>
		</div>
		<div class="col-md-6">
			<input type="button" class="btn btn-danger btn-block" value="Cancelar" onclick="voltar();" />
			<input type="submit" class="btn btn-primary btn-block" value="Salvar" />
		</div
	</form>

</div>
<?php require_once("rodape.php") ?> 