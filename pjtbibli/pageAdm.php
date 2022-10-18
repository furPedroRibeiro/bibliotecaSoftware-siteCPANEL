<?php
    include('protect.php');
    /*if($_SESSION['formEditAdm'] == 1){
        header('location: editAdm.php');
    }*/
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>sddsdela<3</title>
  </head>
  <!-- links -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Rubik&family=Square+Peg&display=swap"
    rel="stylesheet"
  />
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap"
    rel="stylesheet"
  />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    :root {
      --corPrincipal: #1b3d26;
      --textColor: rgb(237, 236, 227);
    }
    body {
      background-color: var(--textColor);
      font-family: 'Open Sans', sans-serif;
    }
    a {
      text-decoration: none;
    }
    .header {
      display: flex;
      justify-content: center;
      align-items: center;

      height: 12vh;
      width: 100%;
      background-color: var(--corPrincipal);
      color: var(--textColor);

      font-family: 'Rubik', sans-serif;
      font-family: 'Square Peg', cursive;
      font-size: 60px;
    }
    .main {
      display: flex;
      align-items: center;
      flex-direction: column;

      margin-top: 5vh;

      height: 84vh;
      gap: 6vh;
    }
    .menuAdm {
      display: flex;
      justify-content: space-around;
      align-items: center;

      height: 80vh;
      flex-wrap: wrap;

      background-color: var(--textColor);

      padding-top: 3vh;
      gap: 3vh;
    }
    .sectionCard {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      gap: 1.5vh;

      border: 1px solid var(--corPrincipal);
      border-radius: 5px;

      width: 15rem;
      height: 15rem;
    }
    h3 {
      color: var(--corPrincipal);
      text-decoration: none;
    }
  </style>
  <body>
    <header class="header">
      <div class="textLogo"><span>AdInfinitum</span></div>
    </header>
    <div class="menuAdm">
      <a href="cadGen.php">
        <div class="sectionCard">
          <div class="img">
            <img src="img/logo.png" alt="logo icon" width="125px" />
          </div>
          <h3>Gênero</h3>
        </div>
      </a>
      <a href="cadAut.php">
        <div class="sectionCard">
          <div class="img">
            <img src="img/logo.png" alt="logo icon" width="125px" />
          </div>
          <h3>Autor</h3>
        </div>
      </a>
      <a href="cadEd.php">
        <div class="sectionCard">
          <div class="img">
            <img src="img/logo.png" alt="logo icon" width="125px" />
          </div>
          <h3>Editoras</h3>
        </div>
      </a>
      <a href="cadLivro.php">
        <div class="sectionCard">
          <div class="img">
            <img src="img/logo.png" alt="logo icon" width="125px" />
          </div>
          <h3>Livros</h3>
        </div>
      </a>
      <a href="cadUsu.php">
        <div class="sectionCard">
          <div class="img">
            <img src="img/logo.png" alt="logo icon" width="125px" />
          </div>
          <h3>Usuários</h3>
        </div>
      </a>
      <a href="editAdm.php">
        <div class="sectionCard">
          <div class="img">
            <img src="img/logo.png" alt="logo icon" width="125px" />
          </div>
          <h3>Administrador</h3>
        </div>
      </a>
      <a href="cadEmp.php">
        <div class="sectionCard">
          <div class="img">
            <img src="img/logo.png" alt="logo icon" width="125px" />
          </div>
          <h3>Empréstimos</h3>
        </div>
      </a>
    </div>
  </body>
</html>
