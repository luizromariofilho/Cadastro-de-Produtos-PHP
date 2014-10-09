<?php

  if(isset($_SESSION['bd'])){
    $bd = $_SESSION['bd'];
  } else{
    $bd = new BD();
  }
  $produtos = $bd->getAll();
?>
<div class="container">
  <?php
    if(isset($_GET['status'])){
      $status = $_GET['status'];
      switch ($status) {
        case '0':
          echo "<h3 class='alert alert-danger' role='alert'>Ocorreu um erro!</h3>";
          break;
        case '1':
          echo "<h3 class='alert alert-success' role='alert'>Produto salvo com sucesso!</h3>";
          break;
        default:
          echo "<h3 class='alert alert-danger' role='alert'>Ocorreu um erro!</h3>";
          break;
      }
    }
  ?>
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
      <?php 
        foreach ($produtos as $i => $value) {
            echo "
                <li class='col-md-12'>
                  <div class='col-md-10'>
                    <a href='form.php?id=$value->id' class='col-md-4'><img class='img-thumbnail' src='images/image.jpg'></a>
                    <a href='form.php?id=$value->id' class='col-md-8'>$value->nome</a>
                    <p>$value->descricao</p>
                  </div>
                  <div class='clearfix'></div>
                  <hr />
                </li>";
        }
      ?>
      </ul>
    </div>
  </div>
</div>