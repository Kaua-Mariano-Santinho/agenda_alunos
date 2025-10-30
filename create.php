<?php
  include_once("templates/header.php");
?>
  <div class="container">
    <?php include_once("templates/backbtn.html"); ?>
    <h1 id="main-title">Matricular Aluno</h1>
    <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
      <input type="hidden" name="type" value="create">
      <div class="form-group">
        <label for="name">Nome do Aluno:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome" required>
      </div>
      <div class="form-group">
        <label for="phone">E-mail do Aluno:</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite o e-mail" required>
      </div>
      <div class="form-group">
        <label for="datanasc">Data de nascimento:</label>
        <input type="date" class="form-control" id="datanasc" name="datanasc" placeholder="Insira a data de nascimento" required>
      </div>
      <button type="submit" class="btn btn-primary">Matricular</button>
    </form>
  </div>
<?php
  include_once("templates/footer.php");
?>
