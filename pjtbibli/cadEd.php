<?php
    include('protect.php');
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
        flex-wrap: wrap;
        gap: 10rem;
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

        width: 25rem;

        background-color: var(--textColor);
        color: var(--corPrincipal);
        outline: none;
      }
      input:focus {
        width: 30rem;
      }
      input::placeholder{
        color: var(--corPrincipal);
        font-size: 17px;
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

        width: 25rem;
        height: 2.85rem;

        cursor: pointer;

        padding: 1vh;
      }
      .buttonDefault:hover {
        transition: width 0.5s ease-in-out;
        width: 30rem;
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
        width: 70vw;
        gap: 3vh;
      }
      .mostrar{
        display: flex;
        align-items: center;
        justify-content: space-around;
        flex-direction: row;
        flex-wrap: wrap;
        
        gap: 3rem;
      }
      .card{
        display: flex;
        flex-direction: row;
        align-items: center;
        
        height: 12rem;
        width: 20rem;
        
        border: 1px solid var(--corPrincipal);
        
        -webkit-box-shadow: 7px 5px 3px rgba(27, 61, 38, 0.65);
		-moz-box-shadow:    7px 5px 3px rgba(27, 61, 38, 0.65);
		box-shadow:         7px 5px 3px rgba(27, 61, 38, 0.65);
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
      .parte1{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        width: 70vw;
        
        flex-wrap: wrap;
      }
      .formCad{
          display: flex;
          align-items: center;
          justify-content: center;
          flex-direction: column;
          width: 30rem;
          gap: 2.5rem;
      }
      .pesquisa{
          display: flex;
          align-items: center;
          justify-content: center;
          flex-direction: column;
          width: 30rem;
          gap: 2.5rem;
      }
    </style>
  </head>
  <body>
  <header class="header">
      <div class="textLogo"><span>AdInfinitum</span></div>
    </header>
    
    <div class="main">
        <div class="parte1">
            <div class="formCad">
                    <h1>Cadastrar editora</h1>
                    <form action="" method="post" class="form" name="editora">
                        <input
                          type="text"
                          name="nome"
                          id="nome"
                          placeholder="Digite o nome da editora: "
                        />
                        <button class="buttonDefault" name="editora">Enviar</button>
                        <?php
                        include('biblioteca.php');
                            if(isset($_POST['nome'])){
                                CadastrarEditora($_POST['nome']);
                            } 
                        ?>
                    </form>
                    <a href="pageAdm.php"><button class="buttonDefault">Voltar</button></a>
            </div>
            <div class="pesquisa">
                <h1>Pesquisar editora</h1>
                <form method="post" class="form" name="pesquisaForm">
                    <input type="text" name="pesquisa"  id="pesquisa" placeholder="Pesquisar editora: "/>
                    <button class="buttonDefault" name="pesquisaBtn">Pesquisar</button>
                    <?php
                            if(isset($_POST['pesquisa'])){
                                PesquisarEditora($_POST['pesquisa']);
                            } 
                        ?>
                </form>
                <a href="pageAdm.php"><button class="buttonDefault">Voltar</button></a>
            </div>
        </div>
        <div class="show">
                <h1>Editoras</h1>
                    <?php
                    echo '<div class="mostrar">';
                        MostrarEditora();
                    echo '</div>';
                    ?>
                <a href="pageAdm.php" style="margin-bottom: 10vh;"><button class="buttonDefault">Voltar</button></a>
        </div>
    </div>
  </body>
</html>

