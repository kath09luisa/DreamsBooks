<?php

session_start();

if (isset($_SESSION["id"])) {
    
    $mysqli = require __DIR__ . "/conexao.php";
    
    $sql = "SELECT * FROM usuario
            WHERE id = {$_SESSION["id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

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
    <link href="./styles/style.css" rel="stylesheet" />
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
            class="d-flex align-items-center input-group mx-2 px-5"
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
          <ul
            class="navbar-nav ms-5 mb-2 mb-lg-0 d-flex justify-content-between"
          >
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
                  <li><a class="dropdown-item" href="#">Perfil</a></li>
                  <li><a class="dropdown-item" href="#">Carrinho</a></li>
                  <li><hr class="dropdown-divider" /></li>
                  <li>
                    <a class="dropdown-item" href="#">Logout</a>
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
        </div>
      </nav>
      
      <nav class="navbar navbar-expand-lg">
        <div class="container justify-content-center">
          <ul class="navbar-nav d-flex justify-content-around">
            <li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="contato.html" class="nav-link">Contato</a></li>
            <li class="nav-item">
              <a href="quemsomos.html" class="nav-link">Quem somos</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
      <?php if (isset($user)): ?>
        
        <p>Hello <?= htmlspecialchars($user["nome"]) ?></p>
        
        <p><a href="logout.php">Log out</a></p>
        
      <?php else: ?>
          
          <p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
          
      <?php endif; ?>
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
  
 <div id="center2">
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
   <!--<div class="container-fluid my-3 p-5">
      <div class="row">
        <div class="col">
          <div class="card" style="width: 15rem">
            <img src="li.png" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Bíblia</h5>
              <p class="card-text">
                Bíblia é uma antologia de textos religiosos ou escrituras
                sagradas para o cristianismo...
              </p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between">
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
                <span>R$ 28,90</span>
                <a href="#" class="card-link">Visitar site</a>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <img
                  id="dimg_55"
                  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAAA1VBMVEVHcEzpUQz4fxD3fhDxVA72Tg/3fhDvWQ72UQ73Tw/2exDhSwn3TA73Ug74ghD3WQ7vWgz3aw73dw33YA7vYAzvVAsDdb/PRAjiTAnXTgnvTQvDQgYJYbH3TAAAfMbp6+wAabkAVquqOQSzQAK7Pgb60b/IUgbubw387+b9w6nZYwnY6PT0spVzotPlVw774tP1ajKeJQC9TQgxecBUi8Xmwq71PQD9iFbD3/X8o26OuuSlxufGZDPQmoPIhGO2KAD4dyncfEXOLACu0++xZU/eg2akRiuCJ+KIAAAADHRSTlMAWq1UslDzFfKrsLRLE/K1AAACNklEQVQ4jWWTiXKiQBQAx42JmlWRQxAEhsNRkFMu77uS//+kfcNg1pRNlVB215viGISA9163/0K3944Ynd6rZfQ6te8OHrxOoUVv8ERlsNCoqooWbVj/SRtpuKZFv0pDAldQtOgAjuPgB0Sa7DCcDSPEuwgbffirjbpUczUVifT72jDW3t4y5UCjQRdxPxiXQDY3cRXiQjatILxpdNnnICnMHN/I3TLNAn/dlEkdiA+4dWCZUUlgvCnjr/NUUbRfgUEi09p7EfgcH84zCCYa9xSIQW7KEfXWPjzPWDDgEN8ghjtLNmVKnjgueHUy0TQOibzICk9usHbh6uG18c+E7UZ/BEHmUK+NIdCQwNeH6EcWOJ0SuC74eAxAwAs1PM4t3S4iFswUNR6NaxDzwnpj63aOSQGnzWEGHngOaoNPJCjsYnM8s2DUBMOhMPR03d6Fpb9NgsT3jspIago0pAjbu63neHVKLvyW8BdC0pFUJxAINPAj245Kxy2JcNmGvOAnY4kVzQSc23ZwcrMD9uGR+aPUG/0Khhvb3pdOVnqhmPp+KialIrGCBVsc4HLlJr4BmkuJd1q5MSvQR11crwfXORLD9zzQx++V40xpIHXRH7bGcp5lJ887ThN8XIF2ZzOVTmijNxYslvP5/HqYTjMHNH3dU4XeaQv9H7Fc0ihzHbfW8L4kqU233kczYrlcsKL+mlT4HmKJbc5PVgC8OlfVeaMnk7+dZn+/fcIUgRYLVY1jtdEt6v4BocloC5gkvEUAAAAASUVORK5CYII="
                  class="YQ4gaf zr758c"
                  height="20"
                  style="margin-left: 1px; margin-top: 1px"
                  width="20"
                  alt=""
                  data-atf="4"
                  data-frt="0"
                />
                <span>R$ 98,99</span>
                <a href="#" class="card-link">Visitar site</a>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <img
                  id="dimg_49"
                  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAAAilBMVEVQn9aUweQAecbE4PIAg8sAf8n///85rNxZtsVCtsXk8Pn6/f4qfNc7k9BbM9W4Mt3cUz8x2KXgMp4zxNsch8/9zg2ZVcN1s97+lQDrkSJAzSQrtdpFVtGmZn0lvLO4jW7VO6HIjlur0+s9yDkmrtXAtWsvs3XgxC0hpNS3sXQtsHxPk542wEk4wkR6iYOvAAAACnRSTlP+////////FRUVMDftCgAAAQxJREFUOI21k2lvwyAMho2DaUtzlyxNl0s9d3T//+8NkkUNGmH7Uisyknn82oADK+AegxUA+QACb/6gMaGubwK8RZZKECLSAyDbmeaklEcagV8VTAOwFSKgSYGMDZ5P3gIIGGOKl9oRRoyVmrEBJoQopTCe6Q0RKAcw2nZcGDoANiTLMjASNoAGOCKaIoDcYA4FRmhyI6JnAPicEmIORAAQjYvSIW2khpD9WNx+rjG0ODB/TpQfoNkULSgQPXp4v1y6rmua5mWwuq5Dpd7O57Ztr9cPDRRFsd9XaZrmeZ4kSRzHYRi+7nZZlh0Op/8ANx/wpa/t81ZUlQH6vtdAPQNOd/3zrt0H/TkFbL4BhO8cu6Mr8DUAAAAASUVORK5CYII="
                  class="YQ4gaf zr758c"
                  height="20"
                  style="margin-left: 1px; margin-top: 1px"
                  width="20"
                  alt=""
                  data-atf="4"
                  data-frt="0"
                />
                <span>R$ 122,10</span>
                <a href="#" class="card-link">Visitar site</a>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <img
                  id="dimg_57"
                  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAAAV1BMVEX39/cAHsvByu3sACjsGjr8/Pn4/Pv39/f3+PcAMswCNNK5IWjwGTX0vsI8VtLl5fBugtzVuc0nSNBRaNaosuZBW9PnxM7vABi4CmDhTWjPgp+1vujooq8WGQr6AAAACHRSTlOL////////jBKX7TgAAACoSURBVDiNlZPrDsMgCEa1itPuorVd213e/znnsqQVZmA7fzn5UAjq4FmU4uvF+FVwNQ0hnnfmWCsfAYbFVNgnFdxgbI25RV4ohuMFa2aHheWEMXcirEfMigXodE9IQISA0Z0gXMFzgs5kDp4ICcCzCX2KfIugySNpizd8QsmYgBdCAqHF+FdC6w0PoUWWfhG5ZWn9Pcl82RjTtJWblwX7ptoCRhak838BbGYg4eZQiy8AAAAASUVORK5CYII="
                  class="YQ4gaf zr758c"
                  height="20"
                  style="margin-left: 1px; margin-top: 1px"
                  width="20"
                  alt=""
                  data-atf="4"
                  data-frt="0"
                />
                <span>R$ 132,99</span>
                <a href="#" class="card-link">Visitar site</a>
              </li>
            </ul>
          </div>
        </div>

        <div class="col">
          <div class="card" style="width: 15rem">
            <img src="li.png" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Harry Potter e a Pedra Filosofal</h5>
              <p class="card-text">
                Harry Potter e a Pedra Filosofal é o primeiro dos sete livros da
                série de fantasia Harry Potter, escrita por J. K. Rowling...
              </p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between">
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
                <span>R$ 32,30</span>
                <a href="#" class="card-link">Visitar site</a>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <img
                  id="dimg_55"
                  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAAA1VBMVEVHcEzpUQz4fxD3fhDxVA72Tg/3fhDvWQ72UQ73Tw/2exDhSwn3TA73Ug74ghD3WQ7vWgz3aw73dw33YA7vYAzvVAsDdb/PRAjiTAnXTgnvTQvDQgYJYbH3TAAAfMbp6+wAabkAVquqOQSzQAK7Pgb60b/IUgbubw387+b9w6nZYwnY6PT0spVzotPlVw774tP1ajKeJQC9TQgxecBUi8Xmwq71PQD9iFbD3/X8o26OuuSlxufGZDPQmoPIhGO2KAD4dyncfEXOLACu0++xZU/eg2akRiuCJ+KIAAAADHRSTlMAWq1UslDzFfKrsLRLE/K1AAACNklEQVQ4jWWTiXKiQBQAx42JmlWRQxAEhsNRkFMu77uS//+kfcNg1pRNlVB215viGISA9163/0K3944Ynd6rZfQ6te8OHrxOoUVv8ERlsNCoqooWbVj/SRtpuKZFv0pDAldQtOgAjuPgB0Sa7DCcDSPEuwgbffirjbpUczUVifT72jDW3t4y5UCjQRdxPxiXQDY3cRXiQjatILxpdNnnICnMHN/I3TLNAn/dlEkdiA+4dWCZUUlgvCnjr/NUUbRfgUEi09p7EfgcH84zCCYa9xSIQW7KEfXWPjzPWDDgEN8ghjtLNmVKnjgueHUy0TQOibzICk9usHbh6uG18c+E7UZ/BEHmUK+NIdCQwNeH6EcWOJ0SuC74eAxAwAs1PM4t3S4iFswUNR6NaxDzwnpj63aOSQGnzWEGHngOaoNPJCjsYnM8s2DUBMOhMPR03d6Fpb9NgsT3jspIago0pAjbu63neHVKLvyW8BdC0pFUJxAINPAj245Kxy2JcNmGvOAnY4kVzQSc23ZwcrMD9uGR+aPUG/0Khhvb3pdOVnqhmPp+KialIrGCBVsc4HLlJr4BmkuJd1q5MSvQR11crwfXORLD9zzQx++V40xpIHXRH7bGcp5lJ887ThN8XIF2ZzOVTmijNxYslvP5/HqYTjMHNH3dU4XeaQv9H7Fc0ihzHbfW8L4kqU233kczYrlcsKL+mlT4HmKJbc5PVgC8OlfVeaMnk7+dZn+/fcIUgRYLVY1jtdEt6v4BocloC5gkvEUAAAAASUVORK5CYII="
                  class="YQ4gaf zr758c"
                  height="20"
                  style="margin-left: 1px; margin-top: 1px"
                  width="20"
                  alt=""
                  data-atf="4"
                  data-frt="0"
                />
                <span>R$ 36,39</span>
                <a href="#" class="card-link">Visitar site</a>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <img
                  id="dimg_49"
                  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAAAilBMVEVQn9aUweQAecbE4PIAg8sAf8n///85rNxZtsVCtsXk8Pn6/f4qfNc7k9BbM9W4Mt3cUz8x2KXgMp4zxNsch8/9zg2ZVcN1s97+lQDrkSJAzSQrtdpFVtGmZn0lvLO4jW7VO6HIjlur0+s9yDkmrtXAtWsvs3XgxC0hpNS3sXQtsHxPk542wEk4wkR6iYOvAAAACnRSTlP+////////FRUVMDftCgAAAQxJREFUOI21k2lvwyAMho2DaUtzlyxNl0s9d3T//+8NkkUNGmH7Uisyknn82oADK+AegxUA+QACb/6gMaGubwK8RZZKECLSAyDbmeaklEcagV8VTAOwFSKgSYGMDZ5P3gIIGGOKl9oRRoyVmrEBJoQopTCe6Q0RKAcw2nZcGDoANiTLMjASNoAGOCKaIoDcYA4FRmhyI6JnAPicEmIORAAQjYvSIW2khpD9WNx+rjG0ODB/TpQfoNkULSgQPXp4v1y6rmua5mWwuq5Dpd7O57Ztr9cPDRRFsd9XaZrmeZ4kSRzHYRi+7nZZlh0Op/8ANx/wpa/t81ZUlQH6vtdAPQNOd/3zrt0H/TkFbL4BhO8cu6Mr8DUAAAAASUVORK5CYII="
                  class="YQ4gaf zr758c"
                  height="20"
                  style="margin-left: 1px; margin-top: 1px"
                  width="20"
                  alt=""
                  data-atf="4"
                  data-frt="0"
                />
                <span>R$ 47,65</span>
                <a href="#" class="card-link">Visitar site</a>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <img
                  id="dimg_57"
                  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAAAV1BMVEX39/cAHsvByu3sACjsGjr8/Pn4/Pv39/f3+PcAMswCNNK5IWjwGTX0vsI8VtLl5fBugtzVuc0nSNBRaNaosuZBW9PnxM7vABi4CmDhTWjPgp+1vujooq8WGQr6AAAACHRSTlOL////////jBKX7TgAAACoSURBVDiNlZPrDsMgCEa1itPuorVd213e/znnsqQVZmA7fzn5UAjq4FmU4uvF+FVwNQ0hnnfmWCsfAYbFVNgnFdxgbI25RV4ohuMFa2aHheWEMXcirEfMigXodE9IQISA0Z0gXMFzgs5kDp4ICcCzCX2KfIugySNpizd8QsmYgBdCAqHF+FdC6w0PoUWWfhG5ZWn9Pcl82RjTtJWblwX7ptoCRhak838BbGYg4eZQiy8AAAAASUVORK5CYII="
                  class="YQ4gaf zr758c"
                  height="20"
                  style="margin-left: 1px; margin-top: 1px"
                  width="20"
                  alt=""
                  data-atf="4"
                  data-frt="0"
                />
                <span>R$ 57,90</span>
                <a href="#" class="card-link">Visitar site</a>
              </li>
            </ul>
          </div>
        </div>

        <div class="col">
          <div class="card" style="width: 15rem">
            <img src="li.png" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Percy Jackson e os Olimpianos</h5>
              <p class="card-text">
                Percy Jackson & the Olympians é uma série literária composta por cinco livros de aventura, romance...
              </p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between">
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
                <span>R$ 165,90</span>
                <a href="#" class="card-link">Visitar site</a>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <img
                  id="dimg_55"
                  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAAA1VBMVEVHcEzpUQz4fxD3fhDxVA72Tg/3fhDvWQ72UQ73Tw/2exDhSwn3TA73Ug74ghD3WQ7vWgz3aw73dw33YA7vYAzvVAsDdb/PRAjiTAnXTgnvTQvDQgYJYbH3TAAAfMbp6+wAabkAVquqOQSzQAK7Pgb60b/IUgbubw387+b9w6nZYwnY6PT0spVzotPlVw774tP1ajKeJQC9TQgxecBUi8Xmwq71PQD9iFbD3/X8o26OuuSlxufGZDPQmoPIhGO2KAD4dyncfEXOLACu0++xZU/eg2akRiuCJ+KIAAAADHRSTlMAWq1UslDzFfKrsLRLE/K1AAACNklEQVQ4jWWTiXKiQBQAx42JmlWRQxAEhsNRkFMu77uS//+kfcNg1pRNlVB215viGISA9163/0K3944Ynd6rZfQ6te8OHrxOoUVv8ERlsNCoqooWbVj/SRtpuKZFv0pDAldQtOgAjuPgB0Sa7DCcDSPEuwgbffirjbpUczUVifT72jDW3t4y5UCjQRdxPxiXQDY3cRXiQjatILxpdNnnICnMHN/I3TLNAn/dlEkdiA+4dWCZUUlgvCnjr/NUUbRfgUEi09p7EfgcH84zCCYa9xSIQW7KEfXWPjzPWDDgEN8ghjtLNmVKnjgueHUy0TQOibzICk9usHbh6uG18c+E7UZ/BEHmUK+NIdCQwNeH6EcWOJ0SuC74eAxAwAs1PM4t3S4iFswUNR6NaxDzwnpj63aOSQGnzWEGHngOaoNPJCjsYnM8s2DUBMOhMPR03d6Fpb9NgsT3jspIago0pAjbu63neHVKLvyW8BdC0pFUJxAINPAj245Kxy2JcNmGvOAnY4kVzQSc23ZwcrMD9uGR+aPUG/0Khhvb3pdOVnqhmPp+KialIrGCBVsc4HLlJr4BmkuJd1q5MSvQR11crwfXORLD9zzQx++V40xpIHXRH7bGcp5lJ887ThN8XIF2ZzOVTmijNxYslvP5/HqYTjMHNH3dU4XeaQv9H7Fc0ihzHbfW8L4kqU233kczYrlcsKL+mlT4HmKJbc5PVgC8OlfVeaMnk7+dZn+/fcIUgRYLVY1jtdEt6v4BocloC5gkvEUAAAAASUVORK5CYII="
                  class="YQ4gaf zr758c"
                  height="20"
                  style="margin-left: 1px; margin-top: 1px"
                  width="20"
                  alt=""
                  data-atf="4"
                  data-frt="0"
                />
                <span>R$ 170,40</span>
                <a href="#" class="card-link">Visitar site</a>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <img
                  id="dimg_49"
                  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAAAilBMVEVQn9aUweQAecbE4PIAg8sAf8n///85rNxZtsVCtsXk8Pn6/f4qfNc7k9BbM9W4Mt3cUz8x2KXgMp4zxNsch8/9zg2ZVcN1s97+lQDrkSJAzSQrtdpFVtGmZn0lvLO4jW7VO6HIjlur0+s9yDkmrtXAtWsvs3XgxC0hpNS3sXQtsHxPk542wEk4wkR6iYOvAAAACnRSTlP+////////FRUVMDftCgAAAQxJREFUOI21k2lvwyAMho2DaUtzlyxNl0s9d3T//+8NkkUNGmH7Uisyknn82oADK+AegxUA+QACb/6gMaGubwK8RZZKECLSAyDbmeaklEcagV8VTAOwFSKgSYGMDZ5P3gIIGGOKl9oRRoyVmrEBJoQopTCe6Q0RKAcw2nZcGDoANiTLMjASNoAGOCKaIoDcYA4FRmhyI6JnAPicEmIORAAQjYvSIW2khpD9WNx+rjG0ODB/TpQfoNkULSgQPXp4v1y6rmua5mWwuq5Dpd7O57Ztr9cPDRRFsd9XaZrmeZ4kSRzHYRi+7nZZlh0Op/8ANx/wpa/t81ZUlQH6vtdAPQNOd/3zrt0H/TkFbL4BhO8cu6Mr8DUAAAAASUVORK5CYII="
                  class="YQ4gaf zr758c"
                  height="20"
                  style="margin-left: 1px; margin-top: 1px"
                  width="20"
                  alt=""
                  data-atf="4"
                  data-frt="0"
                />
                <span>R$ 212,15</span>
                <a href="#" class="card-link">Visitar site</a>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <img
                  id="dimg_57"
                  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAAAV1BMVEX39/cAHsvByu3sACjsGjr8/Pn4/Pv39/f3+PcAMswCNNK5IWjwGTX0vsI8VtLl5fBugtzVuc0nSNBRaNaosuZBW9PnxM7vABi4CmDhTWjPgp+1vujooq8WGQr6AAAACHRSTlOL////////jBKX7TgAAACoSURBVDiNlZPrDsMgCEa1itPuorVd213e/znnsqQVZmA7fzn5UAjq4FmU4uvF+FVwNQ0hnnfmWCsfAYbFVNgnFdxgbI25RV4ohuMFa2aHheWEMXcirEfMigXodE9IQISA0Z0gXMFzgs5kDp4ICcCzCX2KfIugySNpizd8QsmYgBdCAqHF+FdC6w0PoUWWfhG5ZWn9Pcl82RjTtJWblwX7ptoCRhak838BbGYg4eZQiy8AAAAASUVORK5CYII="
                  class="YQ4gaf zr758c"
                  height="20"
                  style="margin-left: 1px; margin-top: 1px"
                  width="20"
                  alt=""
                  data-atf="4"
                  data-frt="0"
                />
                <span>R$ 269,99</span>
                <a href="#" class="card-link">Visitar site</a>
              </li>
            </ul>
          </div>
        </div>

        <div class="col">
          <div class="card" style="width: 15rem">
            <img src="li.png" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Orgulho e Preconceito</h5>
              <p class="card-text">
                Pride and Prejudice é um romance da escritora britânica Jane
                Austen. Publicado pela primeira vez em 1813...
              </p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between">
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
                <span>R$ 11,90</span>
                <a href="#" class="card-link">Visitar site</a>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <img
                  id="dimg_55"
                  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAAA1VBMVEVHcEzpUQz4fxD3fhDxVA72Tg/3fhDvWQ72UQ73Tw/2exDhSwn3TA73Ug74ghD3WQ7vWgz3aw73dw33YA7vYAzvVAsDdb/PRAjiTAnXTgnvTQvDQgYJYbH3TAAAfMbp6+wAabkAVquqOQSzQAK7Pgb60b/IUgbubw387+b9w6nZYwnY6PT0spVzotPlVw774tP1ajKeJQC9TQgxecBUi8Xmwq71PQD9iFbD3/X8o26OuuSlxufGZDPQmoPIhGO2KAD4dyncfEXOLACu0++xZU/eg2akRiuCJ+KIAAAADHRSTlMAWq1UslDzFfKrsLRLE/K1AAACNklEQVQ4jWWTiXKiQBQAx42JmlWRQxAEhsNRkFMu77uS//+kfcNg1pRNlVB215viGISA9163/0K3944Ynd6rZfQ6te8OHrxOoUVv8ERlsNCoqooWbVj/SRtpuKZFv0pDAldQtOgAjuPgB0Sa7DCcDSPEuwgbffirjbpUczUVifT72jDW3t4y5UCjQRdxPxiXQDY3cRXiQjatILxpdNnnICnMHN/I3TLNAn/dlEkdiA+4dWCZUUlgvCnjr/NUUbRfgUEi09p7EfgcH84zCCYa9xSIQW7KEfXWPjzPWDDgEN8ghjtLNmVKnjgueHUy0TQOibzICk9usHbh6uG18c+E7UZ/BEHmUK+NIdCQwNeH6EcWOJ0SuC74eAxAwAs1PM4t3S4iFswUNR6NaxDzwnpj63aOSQGnzWEGHngOaoNPJCjsYnM8s2DUBMOhMPR03d6Fpb9NgsT3jspIago0pAjbu63neHVKLvyW8BdC0pFUJxAINPAj245Kxy2JcNmGvOAnY4kVzQSc23ZwcrMD9uGR+aPUG/0Khhvb3pdOVnqhmPp+KialIrGCBVsc4HLlJr4BmkuJd1q5MSvQR11crwfXORLD9zzQx++V40xpIHXRH7bGcp5lJ887ThN8XIF2ZzOVTmijNxYslvP5/HqYTjMHNH3dU4XeaQv9H7Fc0ihzHbfW8L4kqU233kczYrlcsKL+mlT4HmKJbc5PVgC8OlfVeaMnk7+dZn+/fcIUgRYLVY1jtdEt6v4BocloC5gkvEUAAAAASUVORK5CYII="
                  class="YQ4gaf zr758c"
                  height="20"
                  style="margin-left: 1px; margin-top: 1px"
                  width="20"
                  alt=""
                  data-atf="4"
                  data-frt="0"
                />
                <span>R$ 38,19</span>
                <a href="#" class="card-link">Visitar site</a>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <img
                  id="dimg_49"
                  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAAAilBMVEVQn9aUweQAecbE4PIAg8sAf8n///85rNxZtsVCtsXk8Pn6/f4qfNc7k9BbM9W4Mt3cUz8x2KXgMp4zxNsch8/9zg2ZVcN1s97+lQDrkSJAzSQrtdpFVtGmZn0lvLO4jW7VO6HIjlur0+s9yDkmrtXAtWsvs3XgxC0hpNS3sXQtsHxPk542wEk4wkR6iYOvAAAACnRSTlP+////////FRUVMDftCgAAAQxJREFUOI21k2lvwyAMho2DaUtzlyxNl0s9d3T//+8NkkUNGmH7Uisyknn82oADK+AegxUA+QACb/6gMaGubwK8RZZKECLSAyDbmeaklEcagV8VTAOwFSKgSYGMDZ5P3gIIGGOKl9oRRoyVmrEBJoQopTCe6Q0RKAcw2nZcGDoANiTLMjASNoAGOCKaIoDcYA4FRmhyI6JnAPicEmIORAAQjYvSIW2khpD9WNx+rjG0ODB/TpQfoNkULSgQPXp4v1y6rmua5mWwuq5Dpd7O57Ztr9cPDRRFsd9XaZrmeZ4kSRzHYRi+7nZZlh0Op/8ANx/wpa/t81ZUlQH6vtdAPQNOd/3zrt0H/TkFbL4BhO8cu6Mr8DUAAAAASUVORK5CYII="
                  class="YQ4gaf zr758c"
                  height="20"
                  style="margin-left: 1px; margin-top: 1px"
                  width="20"
                  alt=""
                  data-atf="4"
                  data-frt="0"
                />
                <span>R$ 52,31</span>
                <a href="#" class="card-link">Visitar site</a>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <img
                  id="dimg_57"
                  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAAAV1BMVEX39/cAHsvByu3sACjsGjr8/Pn4/Pv39/f3+PcAMswCNNK5IWjwGTX0vsI8VtLl5fBugtzVuc0nSNBRaNaosuZBW9PnxM7vABi4CmDhTWjPgp+1vujooq8WGQr6AAAACHRSTlOL////////jBKX7TgAAACoSURBVDiNlZPrDsMgCEa1itPuorVd213e/znnsqQVZmA7fzn5UAjq4FmU4uvF+FVwNQ0hnnfmWCsfAYbFVNgnFdxgbI25RV4ohuMFa2aHheWEMXcirEfMigXodE9IQISA0Z0gXMFzgs5kDp4ICcCzCX2KfIugySNpizd8QsmYgBdCAqHF+FdC6w0PoUWWfhG5ZWn9Pcl82RjTtJWblwX7ptoCRhak838BbGYg4eZQiy8AAAAASUVORK5CYII="
                  class="YQ4gaf zr758c"
                  height="20"
                  style="margin-left: 1px; margin-top: 1px"
                  width="20"
                  alt=""
                  data-atf="4"
                  data-frt="0"
                />
                <span>R$ 55,65</span>
                <a href="#" class="card-link">Visitar site</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>-->
<!---->
  <div class="container-fluid">
  <div class="row">
  <div class="col">
    <div id="card1">
    <div class="custom-card">
      <div class="card-image"></div>
      <div class="card-text">
        <h2>Nome do Livro</h2>
        <p>Sinopse do livro é um texto curto cujo propósito é convencer o leitor sobre a relevância da obra.</p>
      </div>
      <div class="card-price">
        <div class="store">Amazon</div>
        <div class="store-price">R$ 15,00</div>
      </div>
    </div>
</div>
</div>
    

<div class="col">
<div id="card2">
    <div class="custom-card">
      <div class="card-image"></div>
      <div class="card-text">
        <h2>Nome do Livro</h2>
        <p>Sinopse do livro é um texto curto cujo propósito é convencer o leitor sobre a relevância da obra.</p>
      </div>
      <div class="card-price">
        <div class="store">Amazon</div>
        <div class="store-price">R$ 15,00</div>
      </div>
    </div>
</div>
</div>

<div class="col">
<div id="card3">
    <div class="custom-card">
      <div class="card-image"></div>
      <div class="card-text">
        <h2>Nome do Livro</h2>
        <p>Sinopse do livro é um texto curto cujo propósito é convencer o leitor sobre a relevância da obra.</p>
      </div>
      <div class="card-price">
        <div class="store">Amazon</div>
        <div class="store-price">R$ 15,00</div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

  <footer class="bottom">
    <p>&copy; 2023 - Todos os direitos reservados</p>
  </footer>
  
  </body>
</html>