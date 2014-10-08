<?php 
	require_once("cabecalho.php");
	if(isset($_GET["id"])){ // testa se o id do produto foi passado via url
		$title = "Editar";
		$id = $_GET["id"];
		$produto = $bd->get($id);
	} else{
		$title = "Novo";
		$id = count($bd->getAll()) + 1;
		$produto = new Produto();
		$produto->id = $id;
	} 
?>
<h1>Cadastro de Produto</h1>
<div class="col-md-6">
	<form class="form" action="salvar-produto.php" method="post">
		<input type="hidden" value="<?=$produto->id; ?>"> 
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
			<input type="file"  name="image" class="form-control" />
		</div>
		<div class="form-group">
			<label>Descrição</label>
			<textarea name="descricao" class="form-control">
			<?= $produto->descricao;?>
			</textarea>
		</div>
		<input type="reset" class="btn btn-danger" value="Cancelar" />
		<input type="submit" class="btn btn-primary" value="Salvar" />
	</form>

</div>
<?php require_once("rodape.php") ?>