<?php
  $id = 0;
?>
<div class="container">
  <div class="row">
    <div class="col-md-2">
      <!--Sidebar content-->
      <form class="form">
        <div class="form-group">
          <label>Pesquisar</label>
          <input type="text" name="pesquisar" class="form-control" />
        </div>
        <div class="form-group">
          <label>Ordenar por</label>
          <select class="form-control">
            <option value="nome">Nome</option>
            <option value="preco">Preço</option>
          </select>
        </div>
      </form>
      <a href="form.php" class="btn btn-primary">Novo</a>
    </div>
    <div class="col-md-10">
      <!--Body content-->
      <ul class="list-unstyled">
        <li class="col-md-12">
          <div class="col-md-10">
            <a href="form.php?id=<?=$id;?>" class="col-md-4"><img class="img-thumbnail" src="images/image.jpg"></a>
            <a href="form.php?id=<?=$id;?>" class="col-md-8">Nome</a>
            <p>Descrição</p>
          </div>
          <div class="clearfix"></div>
          <hr />
        </li>
        <li class="col-md-12">
          <div class="col-md-10">
            <a href="form.php?id=<?=$id;?>" class="col-md-4"><img class="img-thumbnail" src="images/image.jpg"></a>
            <a href="form.php?id=<?=$id;?>" class="col-md-8">Nome</a>
            <p>Descrição</p>
          </div>
          <div class="clearfix"></div>
          <hr />
        </li>
      </ul>
    </div>
  </div>
</div>