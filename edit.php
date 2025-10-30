<?php
  include_once("templates/header.php");
?>
  <div class="container">
    <?php include_once("templates/backbtn.html"); ?>
    <h1 id="main-title">Editar Aluno</h1>
    <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
      <input type="hidden" name="type" value="edit">
      <input type="hidden" name="id" value="<?= $aluno['id'] ?>">
      <div class="form-group">
        <label for="name">Nome do Aluno:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome" value="<?= $aluno['name'] ?>" required>
      </div>
      <div class="form-group">
        <label for="email">E-mail do Aluno:</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Digite o email" value="<?= $aluno['email'] ?>" required>
      </div>
      <div class="form-group">
        <label for="datanasc">Data de nascimento:</label>
        <input type="date" class="form-control" id="datanasc" name="datanasc" placeholder="Insira a data de nascimento">
        <input type="text" name="datanasc" value="<?= $aluno['datanasc'] ?>" disabled>
      </div>
      <button type="submit" class="btn btn-primary">Atualizar Dados</button>
    </form>
  </div>
<?php
  include_once("templates/footer.php");
?>
