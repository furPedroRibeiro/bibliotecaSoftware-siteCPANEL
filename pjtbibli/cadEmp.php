<?php
    include('protect.php');
    include('biblioteca.php')
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>sddsdela<3</title>
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
        color: var(--corPrincipal);
        font-size: 17px;
        font-family: 'Open Sans', sans-serif;
      }
      .header {
      display: flex;
      justify-content: center;
      align-items: center;

      height: 12vh;
      width: 100%;
      background-color: var(--corPrincipal);
      color: rgb(237, 236, 227);

      font-family: 'Rubik', sans-serif;
      font-family: 'Square Peg', cursive;
      font-size: 60px;
    }
      .main {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding-top: 5vh;
        gap: 10vh;
      }
      .form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 3vh;
        padding-top: 5vh;
      }
      input {
        border: none;
        border-bottom: 1px solid var(--corPrincipal);
        padding: 1rem;

        transition: width 0.3s ease-in-out;

        width: 30rem;

        background-color: var(--textColor);
        color: var(--corPrincipal);
        outline: none;
      }
      input:focus {
        width: 35rem;
      }
      input::placeholder{
        color: var(--corPrincipal);
        font-size: 17px;
      }
      select{
          width: 30rem;
      }
      .buttonDefault {
        background-image: linear-gradient(
          to right,
          #0ba360,
          #3cba92,
          #30dd8a,
          #2bb673
        );
        box-shadow: 0 4px 15px 0 rgba(23, 168, 108, 0.75);

        color: var(--textColor);
        border: none;
        border-radius: 3px;

        width: 30rem;
        height: 5vh;

        cursor: pointer;

        padding: 1vh;
      }
      .buttonDefault:hover {
        transition: width 0.5s ease-in-out;
        width: 35rem;
      }
      h1 {
        color: var(--corPrincipal);
        font-family: 'Open Sans', sans-serif;
      }
      .show{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 3vh;
      }
      .mostrar{
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: row;
        flex-wrap: wrap;
        gap: 1rem;
      }
      .card{
        display: flex;
        flex-direction: row;
        align-items: center;
        
        height: 12rem;
        width: 25rem;
        
        border: 1px solid var(--corPrincipal);
      }
      button{
    	background: none;
    	color: inherit;
    	border: none;
    	padding: 0;
    	font: inherit;
    	cursor: pointer;
    	outline: inherit;
      }
      .text{
          margin-left: 2rem;
      }
    </style>
  </head>
  <body>
  <header class="header">
      <div class="textLogo"><span>AdInfinitum</span></div>
    </header>
    
    <div class="main">
        <div class="form">
            <h1>Cadastrar Empréstimo</h1>
                <form action="" method="post" class="form" name="generox">
                    <label for="usuario">Selecione o usuário</label>
                    <select name="usuario">
                        <?php
                            MostrarUsuarioOff();
                        ?>
                    </select>
                    <label for="livro">Selecione o livro</label>
                    <select name="livro">
                        <?php
                            MostrarLivroOff();
                        ?>
                    </select>
                    <label for="dt_prevista">Selecione a data do prazo de devolução</label>
                    <input type="date" name="dt_prevista">
                    <button class="buttonDefault" name="cadEmp">Enviar</button>
                    <?php
                        if(isset($_POST['cadEmp'])){
                            echo '';
                            CadastrarEmprestimo($_POST['usuario'], $_POST['dt_prevista']);
                            CdEmp($_POST['usuario']);
                            CadastrarLivroEmprestimo($_POST['livro']);
                        } 
                    ?>
                </form>
        </div>
        <div class="show">
            <h1>Empréstimos</h1>
                <?php
                /*
                echo '<div class="mostrar">';
                    MostrarEmpAtivo();
                echo '</div>';
                */?>
            <a href="pageAdm.php" style="margin-bottom: 10vh;"><button class="buttonDefault">Voltar</button></a>
        </div>
    </div>
  </body>
</html>

