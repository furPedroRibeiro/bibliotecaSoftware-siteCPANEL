<?php
    include('protect.php');
    include('biblioteca.php');
                        if(isset($_POST['titulo'])){
                            $target_dir = "img/capas/";
                            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                            $uploadOk = 1;
                            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                            
                            
                            
                                // Check if $uploadOk is set to 0 by an error
                                if ($uploadOk == 0) {
                                  echo "Desculpe, seu arquivo não foi carregado.";
                                // if everything is ok, try to upload file
                                } else {
                                  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                    htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
                                  } else {
                                    echo "Desculpe, ocorreu um erro ao enviar seu arquivo.";
                                  }
                                }
                                $_SESSION['nm_arquivo'] = basename($_FILES["fileToUpload"]["name"]);
                                $resultado = cadastrarLivro($_POST['ano'], $_SESSION['nm_arquivo'], $_POST['classif'], $_POST['estado'], $_POST['editora'], $_POST['genero'], $_POST['isbn'], $_POST['qtd'], $_POST['sinopse'], $_POST['titulo']); 
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
        gap: 3.5rem;
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

        width: 70rem;

        background-color: var(--textColor);
        color: var(--corPrincipal);
        outline: none;
      }
      input:focus {
        width: 75rem;
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

        width: 70rem;
        height: 2.85rem;

        cursor: pointer;

        padding: 1vh;
      }
      .buttonDefault:hover {
        transition: width 0.5s ease-in-out;
        width: 75rem;
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
        width: 100vw;
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
        
        width: 20rem;
        
        
        border: 1px solid var(--corPrincipal);
        
        -webkit-box-shadow: 7px 5px 3px rgba(27, 61, 38, 0.65);
		-moz-box-shadow:    7px 5px 3px rgba(27, 61, 38, 0.65);
		box-shadow:         7px 5px 3px rgba(27, 61, 38, 0.65);
      }
      .mostrarLi{
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
      }
      .livro{
          display: flex;
          align-items: center;
          flex-direction: row;
          
          width: 27rem;
          
          gap: 1rem;
          
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
      select{
          width: 70rem;
          height: 3rem;
          
          border: 1px solid var(--textColor);
          border-bottom: 1px solid var(--corPrincipal);
          background-color: var(--textColor);
          
          color: var(--corPrincipal);
          font-size: 17px;
      }
      select option{
          color: var(--corPrincipal);
          font-size: 17px;
      }
      .parte1{
        display: flex;
        flex-direction: row;
        gap: 5rem;
        
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
            <a href="acervo.php"><button class="buttonDefault">Ver acervo</button></a>
            <a href="pageAdm.php"><button class="buttonDefault">Voltar</button></a>
            <div class="formCad">
                <h1>Cadastrar Livro</h1>
                  <form action="" method="post" class="form"enctype="multipart/form-data">
                    <input
                      type="text"
                      name="titulo"
                      id="titulo"
                      placeholder="Digite o título do livro: "
                    />
                    <label for="ano">Ano do livro:</label>
                    <input type="date" name="ano" id="ano">
                    <label for="genero">Capa do livro:</label>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="text" name="classif" id="classif" placeholder="Classificação do livro:">
                    <input type="text" name="estado" id="estado" placeholder="Digite o estado do livro:">
                    <label for="genero">Gênero do livro:</label>
                    <?php
                    echo '<select class="select" name="genero" id="genero">';
                        MostrarGeneroOff();
                    echo '</select>';
                    ?>
                    <label for="editora">Editora do livro:</label>
                    <?php
                    echo '<select class="select" name="editora" id="editora">';
                        MostrarEditoraOff();
                    echo '</select>';
                    ?>
                    <!--  <input type="text" name="autor" id="autor" placeholder="Digite o código do autor:"> -->
                    <input type="text" name="isbn" id="isbn" placeholder="ISBN do livro:">
                    <input type="text" name="qtd" id="qtd" placeholder="Quantidade de livros:">
                    <input type="text" name="sinopse" id="sinopse" placeholder="Sinopse do livro:">
                    <button class="buttonDefault" name="livro">Enviar</button>
                  </form>
            </div>
                <a href="pageAdm.php" style="margin-bottom: 5vh"><button class="buttonDefault">Voltar</button></a>
                <?php
                    /*if(isset($_SESSION['acertoLivro'])){
                        echo $_SESSION['acertoLivro'];
                    }*/
                ?>
    </div>
  </body>
</html>