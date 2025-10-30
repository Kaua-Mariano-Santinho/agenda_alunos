<?php
  include_once("templates/header.php");
?>
  <div class="container" id="view-aluno-container"> 
    <?php include_once("templates/backbtn.html"); ?>
    <h1 id="main-title"><?= $aluno["name"] ?></h1>
    <p class="bold">E-mail do Aluno:</p>
    <p class="form-control"><?= $aluno["email"] ?></p>
    <p class="bold">Observações da Matrícula:</p>
    <textarea type="text" class="form-control" id="datanasc" name="datanasc" rows="3"><?= $aluno['datanasc'] ?></textarea>
  </div>
<?php
  include_once("templates/footer.php");
?>
