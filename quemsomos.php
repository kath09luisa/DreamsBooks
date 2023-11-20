<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM usuario
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE-edge" />
    <meta name="viewport" content="width-device-width, initial-scale-1" />
    <link rel="shortcut icon" href="./assets/livro.ico" type="image/x-icon">
    <title>Dreams Books</title>

    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link href="./styles/style_qs.css?v=<?=$version?>" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
    <header>
      <nav class="navbar navbar-expand-lg" id="navbar">
            <div class="container">
              <a class="navbar-brand" href="#">
                <img src="./assets/logo.png" alt="logo" id="logo" />
              </a>
              <form
                class="d-flex align-items-center input-group mx-1 px-3"
                role="search"
              >
                <img src="./assets/search.png" alt="search" width="25" height="25" />
                <input
                  class="form-control me-2 border-top-0 border-start-0 border-end-0 border-black"
                  type="search"
                  placeholder="Pesquise aqui"
                  aria-label="Search"
                />
              </form>

                  <?php if (isset($user)): ?>
                <ul class="navbar-nav ms-5 mb-2 mb-lg-0 d-flex justify-content-between">
                <div class="d-flex">
                  <li class="nav-item dropdown">
                    <a
                      class="nav-link dropdown-toggle"
                      href="#"
                      role="button"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                    >
                      <img src="./assets/user.png" alt="usuario" width="25" />
                    </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item disabled">
                  <?= htmlspecialchars($user["nome"]) ?>
                      </a></li>
                      <li><a class="dropdown-item" href="#">Perfil</a></li>
                        <li><hr class="dropdown-divider" /></li>
                          <li>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                          </li>
                        </ul>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">
                          <img src="./assets/heart.png" alt="favoritos" width="25" />
                        </a>
                      </li>
                  </div>
                  </ul>
          
                      <?php else: ?>
                        
                        <a class="btn btn-outline-dark" href="login.php" id="login" role="button">Entre / Registrar</a>

                    <?php endif; ?>
              </div>
          </nav>

      <nav class="navbar navbar-expand-lg">
        <div class="container justify-content-center">
          <ul class="navbar-nav d-flex justify-content-around">
            <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="contato.php" class="nav-link">Contato</a></li>
            <li class="nav-item">
              <a href="quemsomos.php" class="nav-link">Quem somos</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>


    <div id="center">
      <div id="titulo">
            <p class="fw-normal">Nossa História</p>
      </div>
    </div>
    <div id="center2">
      <div id="textinho">
        <p class="fw-light">Somos um grupo de alunas do 3° ano 
          onde cursamos DS (Desenvolvimento de Sistemas) e para 
          o nosso TCC (Trabalho de Conclusão de Curso) criamos 
          este projeto que realiza pesquisas em sites de venda, 
          para que o usuário possa ver diferentes preços de um 
          mesmo produto. Escolhemos trabalhar no tema de livros, 
          pois queremos promover a venda de livros físicos que tem 
          caído nos últimos anos, além de fazer parte da essência
          de nosso grupo no qual todas amamos ler. 
        </p>
      </div>
    </div>
    <div id="center3">
      <div id="ft_grupo">
        <img src="./assets/grupo.png" alt="Nosso Grupo!">
      </div>
    </div>

    <div id="center4">
      <div id="titulo2">
        <p class="fw-normal">Participantes do Grupo</p>
      </div>
    </div>

    <div class="container text-center">
      <div class="row align-items-start">
        <div class="col">
         <div id="pessoa1">
              <a href="#"><img src="./assets/p1.png" width="300px" alt="pessoa1"></a>
              <p class="fw-medium" id="p1">Amanda de França</p>
          </div>
        </div>
        <div class="col">
          <div id="pessoa2">
               <a href="#"><img src="./assets/p2.png" width="300px" alt="pessoa2"></a>
               <p class="fw-medium" id="p1">Betchie Witney Charlot</p>
           </div>
         </div>
        <div class="row align-items-center">
         <div class="col">
          <div id="pessoa3">
               <a href="#"><img src="./assets/p3.png" width="300px" alt="pessoa3"></a>
               <p class="fw-medium" id="p1">Bianca Lorenzoni Pereira</p>
           </div>
         </div>
        </div>
        <div class="row align-items-center">
        <div class="col">
          <div id="pessoa4">
            <a href="#"><img src="./assets/p4.png" width="300px" alt="pessoa4"></a>
            <p class="fw-medium" id="p1">Giovana Luisa Carvalho</p>
          </div>
        </div>
        <div class="col">
          <div id="pessoa5">
            <a href="#"><img src="./assets/p5.png" width="300px" alt="pessoa5"></a>
              <p class="fw-medium" id="p1">Jéssica Palma Nunes</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer class="bottom">

          <ul class="nav nav-pills nav-fill">
          <li class="nav-item"><a id="termos" href="Termos-e-condições.pdf" download>Termos e Condições de uso</a></li>
          <li class="nav-item"><p>Dreams Books &copy; 2023 - Todos os direitos reservados</p></li>
          <li class="nav-item"><p>Email: dreamsbooks@gmail.com</p></li>
          </ul>

    </footer>

  </body>
</html>
    