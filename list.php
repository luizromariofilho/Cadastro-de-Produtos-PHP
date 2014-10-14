<?php
  $produtos = $bd->getAll(); //produtos recebe todos os produtos cadastrados no bd
?>
<div class="container">
  <?php
    if(isset($_GET['status'])){ //testa se o status do produto foi passado via url
      $status = $_GET['status']; //variavel status recebe o valor do status
      switch ($status) { 
        case '0': //caso o status seja 0 imprimir mensagem de erro
          echo "<h3 class='alert alert-danger' role='alert'>Ocorreu um erro!</h3>";
          break;
        case '1': //caso o status seja 1 imprimir mensagem de sucesso
          echo "<h3 class='alert alert-success' role='alert'>Produto salvo com sucesso!</h3>";
          break; 
        case '2': //caso o status seja 2 imprimir mensagem de erro com imagem
          echo "<h3 class='alert alert-danger' role='alert'>Ocorreu um erro! Não salvou a imagem!</h3>";
          break;
        default: //caso contrario imprimir mensagem de erro
          echo "<h3 class='alert alert-danger' role='alert'>Ocorreu um erro!</h3>";
          break;
      }
    }
  ?>
  <div class="row">
    <div class="col-md-2">
      <a href="form.php" class="btn btn-primary btn-block">Novo</a>
    </div>
    <div class="col-md-10">
      <!--Body content-->
      <ul class="list-unstyled">
      <?php 
        foreach ($produtos as $i => $value) { //imprime os produtos divididos pelo tamanho da página
            echo " 
                <li class='col-md-12'>
                  <div class='col-md-10'>
                    <a href='form.php?id=$value->id' class='col-md-4'><img class='img-thumbnail' src='images/$value->imagem'></a>
                    <a href='form.php?id=$value->id' class='col-md-8'>$value->nome</a>
                    <p class='col-md-8'>$value->descricao</p>
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