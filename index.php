<?php
  include_once("templates/header.php");
?>
  <div class="container">
    <?php if(isset($printMsg) && $printMsg != ''): ?>
      <p id="msg"><?= $printMsg ?></p>
    <?php endif; ?>
    <h1 id="main-title">Cadastro de Alunos</h1>
    <?php if(count($alunos) > 0): ?>
      <table class="table" id="alunos-table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($alunos as $aluno): ?>
            <tr>
              <td scope="row" class="col-id"><?= $aluno["id"] ?></td>
              <td scope="row"><?= $aluno["name"] ?></td>
              <td scope="row"><?= $aluno["phone"] ?></td>
              <td class="actions">
                <a href="<?= $BASE_URL ?>show.php?id=<?= $aluno["id"] ?>"><i class="fas fa-eye check-icon"></i></a>
                <a href="<?= $BASE_URL ?>edit.php?id=<?= $aluno["id"] ?>"><i class="far fa-edit edit-icon"></i></a>
                <form class="delete-form" action="<?= $BASE_URL ?>/config/process.php" method="POST">
                  <input type="hidden" name="type" value="delete">
                  <input type="hidden" name="id" value="<?= $aluno["id"] ?>">
                  <button type="submit" class="delete-btn"><i class="fas fa-times delete-icon"></i></button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>  
      <p id="empty-list-text">AAinda não há alunos matriculados, <a href="<?= $BASE_URL ?>create.php">clique aqui para matricular</a>..</p>
    <?php endif; ?>
  </div>
<?php
  include_once("templates/footer.php");
?>
