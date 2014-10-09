<?php 
	require_once("bootstrap.php");

	if(isset($_GET["id"])){ // testa se o id do produto foi passado via url
		$title = "Editar";
		$id = $_GET["id"];
		$produto = $bd->get($id);
	}else{
		$title = "Novo";
		$id = count($bd->getAll()) + 1;
		$produto = new Produto();
		$produto->id = $id;
	}
	require_once("cabecalho.php");
?>

<script type="text/javascript">
	function voltar(){
		window.history.back();
	}
</script>
<h1>Cadastro de Produto</h1>
<div class="col-md-6">
	<form class="form" action="salvar-produto.php" method="post" enctype="multipart/form-data">
		<input name="id" type="hidden" value="<?=$produto->id; ?>"> 
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