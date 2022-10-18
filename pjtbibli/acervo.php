<?php
    include('biblioteca.php');
    include('protect.php');
    if(isset($_GET['cdforshow'])){
        $_SESSION['cd'] = $_GET['cdforshow'];
        header('Location: livroEsp.php');
    }
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
        gap: 2rem;
      }
      .form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 3vh;
        padding-top: 5vh;
      }
      .radio{
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: start;
      }
      #pesquisa {
        border: none;
        border-bottom: 1px solid var(--corPrincipal);
        padding: 0.7vw;

        transition: width 0.3s ease-in-out;

        width: 80vw;

        background-color: var(--textColor);
        color: var(--corPrincipal);
        outline: none;
      }
      #pesquisa:focus {
        width: 85vw;
      }
      #pesquisa::placeholder{
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

        width: 80vw;
        height: 2.85rem;

        cursor: pointer;

        padding: 1vh;
      }
      .buttonDefault:hover {
        transition: width 0.5s ease-in-out;
        width: 85vw;
      }
      h1 {
        color: var(--corPrincipal);
        font-family: 'Open Sans', sans-serif;
      }
      .show{
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-around;
        
        gap: 2rem;
        flex-wrap: wrap;
        
        width: 80vw;
      }
      .card{
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;
        
        width: 25rem;
        
        border: 1px solid var(--corPrincipal);
        
        -webkit-box-shadow: 7px 5px 3px rgba(27, 61, 38, 0.65);
		-moz-box-shadow:    7px 5px 3px rgba(27, 61, 38, 0.65);
		box-shadow:         7px 5px 3px rgba(27, 61, 38, 0.65);
      }
      .text{
          margin-left: 2rem;
      }
      p{
         margin-block: 0.5vh;
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
      .pesquisa{
          display: flex;
          align-items: center;
          justify-content: center;
          flex-direction: column;
          width: 70rem;
          gap: 2.5rem;
      }
      .barraPesquisa{
          display: flex;
          align-items: center;
          justify-content: center;
          flex-direction: row;
      }
      select{
          width: 80vw;
      }
    </style>
  </head>
  <body>
  <header class="header">
      <div class="textLogo"><span>AdInfinitum</span></div>
    </header>
    
    <div class="main">
        <div class="pesquisa">
                <h1>Pesquisar livro por</h1>
                <form method="post" class="form" name="pesquisaForm">
                    <select name="typeSearch">
                        <option value="titulo">Título</option>
                        <option value="genero">Gênero</option>
                        <option value="autor">Autor</option>
                        <option value="classif">Classificação</option>
                    </select>
                    <input type="text" name="pesquisa"  id="pesquisa" placeholder="Pesquisar livro: "/>
                    <button class="buttonDefault" name="pesquisaBtn">Pesquisar</button>
                    <?php
                            if(isset($_POST['pesquisa'])){
                                PesquisarLivro($_POST['pesquisa'], $_POST['typeSearch']);
                            } 
                        ?>
                </form>
                <a href="cadLivro.php" style="margin-bottom: 5vh"><button class="buttonDefault">Voltar</button></a>
            </div>
        <h1>Livros</h1>
            <div class="show">
                    <?php
                        ListarLivros();
                    ?>
            </div>
        <a href="cadLivro.php" style="margin-bottom: 10vh;"><button class="buttonDefault">Voltar</button></a>
    </div>
  </body>
</html>