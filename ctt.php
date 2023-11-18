<?php
      $mysqli = require __DIR__ . "/database.php";

      $sql = "INSERT INTO contato (nome_ctt, email_ctt, sugestao_ctt)
              VALUES (?, ?, ?)";
      
      $stmt = $mysqli->stmt_init();
      
      
      if ( ! $stmt->prepare($sql)) {
          die("SQL error: " . $mysqli->error);
      }
      
      $stmt->bind_param("sss",
                      $_POST["nome_ctt"],
                      $_POST["email_ctt"],
                      $_POST["suges_ctt"]);
                        
      if ($stmt->execute()) {
          header("Location: contato.php");
          exit;
          
      } else {
          
          if ($mysqli->errno === 1062) {
              die("email already taken");
          } else {
              die($mysqli->error . " " . $mysqli->errno);
          }
      }
?>