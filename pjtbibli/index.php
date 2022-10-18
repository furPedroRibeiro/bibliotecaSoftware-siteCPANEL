<?php
        include('biblioteca.php');
          if($_POST){
            $resultado = Login($_POST['login'], $_POST['senha'], "");
            if($resultado['erro']){
              echo "Usuário e/ou senha inválido!!";
            } else{
                $user = $resultado['dados'];
                if($user->user_status == 'bloqueado'){
                  echo 'Usuário bloqueado.';
                } else{
                  if($user->adm ==1){
                      session_start();
                     $_SESSION['prot'] = $_POST['login'];
                     $_SESSION['email'] = $_POST['login'];
                    header('Location: pageAdm.php');
                  }
                }
            }
          }
        ?>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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
        background-color: var(--corPrincipal);
        font-family: 'Open Sans', sans-serif;
      }
      .header {
        display: flex;
        justify-content: center;
        align-items: center;

        height: 12vh;
        width: 100%;
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
      .main .inputs {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;

        gap: 6vh;
      }
      input {
        border: none;
        border-bottom: 1px solid whitesmoke;
        padding: 0.7vw;

        transition: width 0.3s ease-in-out;

        width: 70vw;

        background-color: var(--corPrincipal);
        color: white;
        outline: none;
      }
      input:focus {
        width: 75vw;
      }
      ::placeholder {
        font-size: 17px;
        color: whitesmoke;
      }
      main form #forgetPassword {
        font-size: 17px;
        color: #3cba92;
      }
      .bn632-hover {
        width: 75vw;
        font-size: 16px;
        font-weight: 600;
        color: #fff;
        cursor: pointer;
        height: 6vh;
        text-align: center;
        border: none;
        background-size: 300% 100%;
        border-radius: 50px;
        -o-transition: all 0.4s ease-in-out;
        -webkit-transition: all 0.4s ease-in-out;
        transition: all 0.4s ease-in-out;
      }

      .bn632-hover:hover {
        background-position: 100% 0;
        -o-transition: all 0.4s ease-in-out;
        -webkit-transition: all 0.4s ease-in-out;
        transition: all 0.4s ease-in-out;
      }

      .bn632-hover:focus {
        outline: none;
      }

      .bn632-hover.bn22 {
        transition: width 0.3s ease-in-out;
        background-image: linear-gradient(
          to right,
          #0ba360,
          #3cba92,
          #30dd8a,
          #2bb673
        );
        box-shadow: 0 4px 15px 0 rgba(23, 168, 108, 0.75);
      }
    </style>

    <title>sddsdela<3</title>
  </head>
<body>
    <div class="tamanho">
      <header class="header">
        <div class="textLogo"><span>AdInfinitum</span></div>
      </header>
    <main class="main">
      <div class="img">
        <a href="pagesHtml/pageMain.html"
          ><img src="img/logo.png" alt="Livro svg" width="225px"
        /></a>
      </div>
      <form action="" method="POST" id="entrar" class="inputs">
        <input type="email" name="login" id="email" placeholder="Digite seu email:" />
        <input
          type="password"
          name="senha"
          id="senha"
          placeholder="Digite sua senha:"
        />
        <a href="#" id="forgetPassword">Esqueceu sua senha?</a>
        <button class="bn632-hover bn22">Entrar</button>
      </form>
    </main>
  </body>
</html>