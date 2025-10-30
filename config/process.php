<?php

  session_start();

  include_once("connection.php");
  include_once("url.php");

  $data = $_POST;

  // MODIFICAÇÕES NO BANCO
  if(!empty($data)) {

    // Matricular aluno
    if($data["type"] === "create") {

      $name = $data["name"];
      $email = $data["email"];
      $datanasc = $data["datanasc"];

      $query = "INSERT INTO alunos (name, email, datanasc) VALUES (:name, :email, :datanasc)";

      $stmt = $conn->prepare($query);

      $stmt->bindParam(":name", $name);
      $stmt->bindParam(":email", $email);
      $stmt->bindParam(":datanasc", $datanasc);

      try {

        $stmt->execute();
        $_SESSION["msg"] = "Aluno matriculado com sucesso!";
    
      } catch(PDOException $e) {
        // erro na conexão
        $error = $e->getMessage();
        echo "Erro: $error";
      }

    } else if($data["type"] === "edit") {

      $name = $data["name"];
      $email = $data["email"];
      $datanasc = $data["datanasc"];
      $id = $data["id"];

      $query = "UPDATE alunos 
                SET name = :name, email = :email, datanasc = :datanasc
                WHERE id = :id";

      $stmt = $conn->prepare($query);

      $stmt->bindParam(":name", $name);
      $stmt->bindParam(":email", $email);
      $stmt->bindParam(":datanasc", $datanasc);
      $stmt->bindParam(":id", $id);

      try {

        $stmt->execute();
        $_SESSION["msg"] = "Dados do aluno atualizados com sucesso!";
    
      } catch(PDOException $e) {
        // erro na conexão
        $error = $e->getMessage();
        echo "Erro: $error";
      }

    } else if($data["type"] === "delete") {

      $id = $data["id"];

      $query = "DELETE FROM alunos WHERE id = :id";

      $stmt = $conn->prepare($query);

      $stmt->bindParam(":id", $id);
      
      try {

        $stmt->execute();
        $_SESSION["msg"] = "Aluno removido com sucesso!";
    
      } catch(PDOException $e) {
        // erro na conexão
        $error = $e->getMessage();
        echo "Erro: $error";
      }

    }

    // Redirect HOME
   header("Location:" . $BASE_URL . "index.php");

  // SELEÇÃO DE DADOS
  } else {
    
    $id;

    if(!empty($_GET)) {
      $id = $_GET["id"];
    }

    // Retorna o dado de um aluno
    if(!empty($id)) {

      $query = "SELECT * FROM alunos WHERE id = :id";

      $stmt = $conn->prepare($query);

      $stmt->bindParam(":id", $id);

      $stmt->execute();

      $aluno = $stmt->fetch();

    } else {

      // Retorna todos os alunos
      $alunos = [];

      $query = "SELECT * FROM alunos";

      $stmt = $conn->prepare($query);

      $stmt->execute();
      
      $alunos = $stmt->fetchAll();

    }

  }

  $conn = null;