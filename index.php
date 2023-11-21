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
    <link href="./styles/style.css?v=<?=$version?>" rel="stylesheet" />
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
          <?php
          
            function convertVazio($texto) {
              $texto = str_replace(' ', '%20', $texto);
              return $texto;
            }

            function convertReal($texto) {
              $texto = str_replace('%20', ' ', $texto);
              return $texto;
            }

            $valor_da_pesquisa = $_GET["search"]??"";
            $url = "http://localhost:3000/amazon?value=" . convertVazio($valor_da_pesquisa);
            $url2 = "http://localhost:3000/americanas?value=" . convertVazio($valor_da_pesquisa);
            $url3 = "http://localhost:3000/mercadolivre?value=" . convertVazio($valor_da_pesquisa);
            $result = file_get_contents($url);
            $result2 = file_get_contents($url2);
            $result3 = file_get_contents($url3);
            $dataArray = json_decode($result, true);
            $dataArray2 = json_decode($result2, true);
            $dataArray3 = json_decode($result3, true);

          ?>
          <form
            action="<?= $_SERVER["PHP_SELF"] ?>"
            class="d-flex align-items-center input-group mx-1 px-3"
            role="search"
            method="get"
          >
            <img src="./assets/search.png" alt="search" width="25" height="25" />
            <input
              class="form-control me-2 border-top-0 border-start-0 border-end-0 border-black"
              type="search"
              name="search"
              placeholder="Pesquise aqui"
              aria-label="Search"
              value="<?= convertReal($valor_da_pesquisa) ?>"
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

  <?php if ($valor_da_pesquisa === ""): ?>    
    <div id="center">
      <div id="sembug">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" interval="100">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="./assets/slide1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="./assets/slide2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="./assets/slide3.png" class="d-block w-100" alt="...">
            </div>
          </div>
        </div>
      </div>
    </div>
  

    <div div id="center2">
      <div id="titulo">
        <p class="fw-light">Dreams</p>
      </div>
    </div>
    <div id="center3">
      <div id="titulo2">
        <p class="fw-light">Books</p>
      </div>
    </div>
    <div id="center4">
      <div id="imagem_logo">
        <img src="./assets/img_logo.png">
      </div>
    </div>
  <?php endif; ?> 
   
  <div class="container-fluid">
    <div class="row">            
      <?php
        foreach ($dataArray as $index => $item) {
          if($index === 0){
            print('
                <div class="col">
                  <a href="' . $item['link'] . '" id="link-texto" target="_blank">
                    <div id="card1" class="custom-card">
                      <div class="card-image-ama">
                      <img src="' . $item['image'] . '"/></div>
                      <div class="card-text">
                        <h2>' . $item['name'] . '</h2>
                      </div>
                      <div class="card-price">
                        <div class="store">
                          <img
                            id="dimg_53"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAADsUlEQVRYhbWWT2gcVRzHP8/sBsSkpkLUpdlQRAgptexuqrR6EcxqDipWacCLB4PJwUNpwEUwiAgt4sE/NHdLwIM1NFvw4CUU04JJs7HSRDYbD1VCNiRBiTtJDmnh62F3pjOZyc40ab/wmHlvfu/9vu/7+/3eG6hBUpOkjyXN6+HhlqRBSY/ihqQOSX8+RMdBRNoBjKQm4CbwLBFhWRYLCwtO3xhDIpEgkUhEXQJgFjiOpE+j0h7L59WdzSoWjzutwfXenc1qLJ+/HyXOoAjSVyoVdWezHmf1Wi6Xi0qgQBSr07293l3HYqFkIiqxFUogn88HOkhlMjrd2+sLid1eyWajEFAogQ/6+0MlzuVygSSi4JGwVDXG+MaGhoY8/b6+PgROux8YSaFz3GVnjCGTyfhs4o2Nnr6Au9vboQRiUVg2NzfT1dXl9JeXlymXy/w6OQnAxMRE1akUqNi+CdhOv7t4kR9HR5mbnfV8E2AIDlcooiTKWD6vtmQyMNHqlWMUhObAzMwMJ06edHZpPwEGz54l2d7Okc5OXuvp8akSJQdCFUil076ddWezWlpa8tjtVYG6BEqlUuDChULBY1cul30haXgQ50Bxft6R0y2tuyIAisWi825cz+Xl5dAI1CWwuLjoWdR+tyzLY/fDpUuB829MT4cSqBuC8fFx5/LZ7SgeGRnx2dhhSGcyqlQqdUNQl4A7tjtLL5VOqy2Z3LUM7fELw8N7JyD5r+LdWiqT8Y21JZMqlUr7I2D/jPh2WJO8oRYSy7KcW9FWKMx5JAI2iQvDww6RhlhMqUxG/QMDvpI8d/68+gcGZFmu2G8sSavT0soNadubE96T8I9v4bEkHH47PHujYKsMUx/Cav5eLR/7Bo6ccUy8ZXioB37rh6unYK2wfwKNB+DoJ/D6ErxTgaZO3w+Dl0BLB7xxG7b/hfHnq0T+ugx3NvZGYHUK5s7BT4dgswwbRWh90WNiJN0FGjyjdyy4+Rnc/gpUu4CS70PLMXjypSrReDO+OeslWJ+D1WuwcgW2/6meXCcuQ/wAzH0Or/7invWfkXQLeC5wB2sFmHwPNov3jsOdd6dxje38HXjqLUh/AY93wNp0lURLh9viupH0EfBlIAEbf4/B/Newfo2ge1ly+TbAM4Nw+F1oPV53WWDASGoEpoBUmDVbZVibgs1FWLlac2ggfrAanoNHofUFf3iCcR14ubYDPS3pSpQz4QHhe0lP2II5kHQKeBPoYre82Dt+B2aAUWPMz/bg/5AZ2OKL1i4FAAAAAElFTkSuQmCC"
                            class="YQ4gaf zr758c"
                            height="20"
                            style="margin-left: 1px; margin-top: 1px"
                            width="20"
                            alt=""
                            data-atf="1"
                            data-frt="0"
                          />
                          <span>Amazon</span>
                        </div>
                        <div class="store-price">' . $item['price'] . '</div>
                      </div>
                    </div>
                  </a>  
                </div>
            ');
          };
        }
      ?>

      <?php
        foreach ($dataArray2 as $index2 => $item2) {
          if($index2 === 0){
            print('
                <div class="col">
                  <a href="' . $item2['link'] . '" id="link-texto" target="_blank">
                    <div id="card1" class="custom-card">
                      <div class="card-image-ame">
                      <img src="' . $item2['image'] . '"/>
                      </div>
                      <div class="card-text">
                        <h2>' . $item2['name'] . '</h2>
                      </div>
                      <div class="card-price">
                        <div class="store">
                          <img
                            id="dimg_53"
                            src="https://encrypted-tbn3.gstatic.com/faviconV2?url=https://www.americanas.com.br&client=SHOPPING&size=32&type=FAVICON&fallback_opts=TYPE,SIZE,URL"
                            class="YQ4gaf zr758c"
                            height="20"
                            style="margin-left: 1px; margin-top: 1px"
                            width="20"
                            alt=""
                            data-atf="1"
                            data-frt="0"
                          />
                          <span>Americanas</span>
                        </div>
                        <div class="store-price">' . $item2['price'] . '</div>
                      </div>
                    </div>
                  </a>  
                </div>
            ');
          };
        }
      ?>

      <?php
        foreach ($dataArray3 as $index3 => $item3) {
          if($index3 === 0){
            print('
                <div class="col">
                  <a href="' . $item3['link'] . '" id="link-texto" target="_blank">
                    <div id="card1" class="custom-card">
                      <div class="card-image-ama card-image">
                      <img src="' . $item3['image'] . '"/>
                      </div>
                      <div class="card-text">
                        <h2>' . $item3['name'] . '</h2>
                      </div>
                      <div class="card-price">
                        <div class="store">
                          <img
                            id="dimg_53"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAABAlBMVEX/////0QD/2AD/1AD/1gD/2QAACm3/2wAAAGr6/P+/w92Sl79haJxdWGpyXkF1YEHswQDUrgCsq7jl5exZVW7wxgDk4+YADnVeV16rr9BLUoqKcTzFoQ9HUIyhpsxeU1rRrABXTVs/QHCUejpnXEqkhzhqa4/h4exzco/DxdN0cYaafjLctgDFoyJ3bWbW1+A6OFZ/eHLy9P2Eia2IjKm3tLTDwsmlqcV/hrW3uctcXIBpZXnPzMqbm7H///dnZojZ1MllbJ2EclOKh49pX17y8OsaF1I9Roi9nStFS4IUG2IwLV+amq6ujwgAE2V4ZDuhnZ8rMXAgK3IbI3WchUxJR2YNnmOpAAABwUlEQVQ4jdVSa3eaQBAdFnDXYBR5iInYmAcGIoREraDGWo1W26RJq8n//yudXYm28fRzT+8BdmfuXWb3zgL8V8gfaIXDYqlUPCxoB/k9+ui45uokg+7W6kd/0B9OyqoiS5IkK4TgBIfG6U5inpWpwllZdc8vip7OxTJtNLNCl35w1WpIRAqj6wDjWLvB0C57t01TrL/CTzvpVAvdOsD8Yw/DIEm1fhvAxxfG22MMAIzh3Wiw29snJPuf3yK/Yo77OFbO5lvFXQD+Tm6MzM3EqmyTXbAmvNg7DOPN2NMGMKVu62L0XnFv4E6Pb87DKcwIuqI/d6/vR9032siD0Tz1bFWhM1gQbhG9hbgy/zLMivtz0HROkAWkS26iUksCUZyfAo/i979KPL1MIf7GBRIJhR/NB/zHYw+S7zbPyk+428WMCnH4PAY0oPPDhInlqWLVSZ1bzaqSaCTRawNu51ibit4pksWEMTH72aAbSVhsRSWPiNbSaMUyOy7XrBqJ+yArCj5cSpaW82RufUmZs3pxbary+6RSO3pZO6zz+70zU5ZznNVrFfG6dhwn19lrQJAUViyHYItJEu+1J0Mb8Tfu3+EXYqYvusCWNPQAAAAASUVORK5CYII="
                            class="YQ4gaf zr758c"
                            height="20"
                            style="margin-left: 1px; margin-top: 1px"
                            width="20"
                            alt=""
                            data-atf="1"
                            data-frt="0"
                          />
                          <span>Mercado Livre</span>
                        </div>
                        <div class="store-price">' . $item3['price'] . '</div>
                      </div>
                    </div>
                  </a>  
                </div>
            ');
          };
        }
      ?>
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