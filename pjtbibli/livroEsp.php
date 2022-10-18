<?php
    include('biblioteca.php');
    include('protect.php');
    $cd = $_SESSION['cd'];
    $_SESSION['acerto'] = " ";
    $_SESSION['acertoLivroAutor'] = " ";
            if(isset($_POST['editEstado'])){
                $sql = 'UPDATE livro SET estado="'.$_POST['estado'].'" WHERE cd ='.$cd;
                $res = $GLOBALS['conn']->query($sql);
                if($res){
                    $_SESSION['acerto'] = "Editado com sucesso";
                } else{
                    $_SESSION['erro'] = "Erro ao editar";
                }
            }
            if(isset($_POST['cadAut'])){
                livroAutor($_POST['autor'], $_SESSION['cd']);
            }
?>
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
      input {
        border: none;
        border-bottom: 1px solid var(--corPrincipal);
        padding: 0.7vw;

        transition: width 0.3s ease-in-out;

        width: 45vw;

        background-color: var(--textColor);
        color: var(--corPrincipal);
        outline: none;
      }
      input:focus {
        width: 50vw;
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

        width: 45vw;
        height: 2.85rem;

        cursor: pointer;

        padding: 1vh;
      }
      .buttonDefault:hover {
        transition: width 0.5s ease-in-out;
        width: 50vw;
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
        
        gap: 3rem;
        flex-wrap: wrap;
        
        width: 100vw;
      }
      .card{
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;
        
        width: 30rem;
        
        border: 1px solid var(--corPrincipal);
        
        -webkit-box-shadow: 7px 5px 3px rgba(27, 61, 38, 0.65);
		-moz-box-shadow:    7px 5px 3px rgba(27, 61, 38, 0.65);
		box-shadow:         7px 5px 3px rgba(27, 61, 38, 0.65);
      }
      .text{
          margin-left: 2rem;
      }
      .mostrar{
        text-align: justify;
        display: flex;
        justify-content: space-around;
        align-items: center;
        flex-direction: row;

        width: 40vw;

        gap: 2rem;
        padding: 2rem;
        
        border: 1px solid var(--corPrincipal);;
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
    </style>
  </head>
  <body>
  <header class="header">
      <div class="textLogo"><span>AdInfinitum</span></div>
    </header>
    
    <div class="main">
        <div class="show">
            <h1>Livro</h1>
                <?php
                    MostrarLivroEsp($cd);
                ?>
            <a href="acervo.php" style="margin-bottom: 3vh;"><button class="buttonDefault">Voltar</button></a>
        </div>
        <h1>Adicionar autor</h1>
        <form method="post" class="form">
            <label for="autor">Adicionar autor:</label>
            <?php
                echo '<select class="select" name="autor" id="autor">';
                    MostrarAutorOff();
                echo '</select>';
            ?>
            <button class="buttonDefault" name="cadAut">Enviar</button>
            <?php
                if(isset($_SESSION['acertoLivroAutor'])){
                    echo $_SESSION['acertoLivroAutor'];
                } else{
                    echo $_SESSION['erroLivroAutor'];
                }
            ?>
        </form>
        <h1>Editar estado</h1>
        <form method="post" class="form">
            <input type="text" name="estado" placeholder="Digite o novo Estado do livro:"></input>
            <button class="buttonDefault" name="editEstado">Enviar</button>
            <?php
                if(isset($_SESSION['acerto'])){
                    echo $_SESSION['acerto'];
                } else{
                    echo $_SESSION['erro'];
                }
            ?>
        </form>
        <a href="acervo.php" style="margin-bottom: 10vh;"><button class="buttonDefault">Voltar</button></a>
    </div>
  </body>
</html>