<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM usuario
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["senha"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: index.php");
            
            exit;
        }
    }
    
    $is_invalid = true;
}
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE-edge" />
        <meta name="viewport" content="width-device-width, initial-scale-1" />
        <title>Login</title>
    
        <link rel="shortcut icon" href="./assets/livro.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="./styles/login-style.css?v=<?=$version?>" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
        <script src="./validation.js?v=<?=$version?>" defer/></script>
        <script
          src="./../bootstrap-5.3.1/dist/js/bootstrap.min.js"
          rel="stylesheet"
        ></script>
        <link
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous"
        />
        <script
          src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
          crossorigin="anonymous"
        ></script>
      </head>
    <body>
        <div class="hero">
            <div class="form-box">
                <div class="button-box">
                    <div id="botao"></div>
                    <button type="button" class="toggle-btn" onclick="login()">Login</button>
                    <button type="button" class="toggle-btn" onclick="signup()">Registrar</button>
                </div>
                <?php if ($is_invalid): ?>
                    <em>Invalid login</em>
                <?php endif; ?>
                <?php 
                  $cadastrado = $_GET["sucess"]??"";
                ?>
                <?php if ($cadastrado == "cadastrado"): ?>
                    <div style="width: 100%; display:flex; justify-content:center; color:green; background-color: lightgreen; padding-top: 5px; border-radius: 10px;"><h3>Cadastrado com sucesso!</h3></div>
                <?php endif; ?>
                <form method="post" id="login" class="input-group">
                    <input type="text" class="input-field" name="email" placeholder="Email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" required>
                    <input type="password" class="input-field" name="senha" placeholder="Senha" required>
                    <div id="div-center">
                      <button type="submit" class="submit-btn">Entrar</button>
                    </div>
                </form>
                
                <form  method="post" action="process-signup.php" class="input-group" id="signup" novalidate>
                    <div class="input-fields">
                    <input type="text" class="input-field" id="nome" name="nome" placeholder="Nome" required>
                    </div><div class="input-fields">
                    <input type="email" class="input-field" id="email" name="email" placeholder="Email" required>
                    </div><div class="input-fields">
                    <input type="password" class="input-field" id="senha" name="senha" placeholder="Senha" required>
                    </div><div class="input-fields">
                    <input type="password" class="input-field" id="senha_confirmacao" name="senha_confirmacao" placeholder="Repita a senha" required>
                    </div><div class="input-fields">
                    <input type="checkbox" class="check-box" id="advanced-usage_consent_checkbox"/><span id="advanced-usage_consent_checkbox">Eu concordo com os <a href="Termos-e-condições.pdf" target="_blank">termos e condições</a>.</span>
                    </div>
                    <div id="advanced-usage_consent_checkbox-errors-container"></div>
                    <div id="div-center">
                      <button type="submit" class="submit-btn">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
        <script>
            var x = document.getElementById("login");
            var y = document.getElementById("signup");
            var z = document.getElementById("botao");

            function signup(){
                x.style.left = "-400px";
                y.style.left = "0px";
                z.style.left = "110px";
            }
            function login(){
                x.style.left = "0px";
                y.style.left = "400px";
                z.style.left = "0px";
            }
        </script>
    </body>
</html>