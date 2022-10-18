<?php
    include('protect.php');
    include('biblioteca.php');
    if(isset($_GET['rmForView'])){
        $_SESSION['rmForView'] = $_GET['rmForView'];
        header('Location: usuarioEspecifico.php');
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
        gap: 5vh;
      }
      .form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 3vh;
        padding-top: 5vh;
        
        width: 70vw;
      }
      input {
        border: none;
        border-bottom: 1px solid var(--corPrincipal);
        padding: 1rem;

        transition: width 0.3s ease-in-out;

        width: 70vw;

        background-color: var(--textColor);
        color: var(--corPrincipal);
        outline: none;
      }
      input:focus {
        width: 75vw;
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

        width: 70vw;
        height: 2.85rem;

        cursor: pointer;

        padding: 1vh;
      }
      .buttonDefault:hover {
        transition: width 0.5s ease-in-out;
        width: 75vw;
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
        width: 75vw;
      }
      .mostrar{
        display: flex;
        align-items: center;
        flex-direction: row;
        justify-content: space-around;
        flex-wrap: wrap;
        gap: 3rem;
      }
      .card{
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-around;
        
        height: 13rem;
        width: 23rem;
        
        border: 1px solid var(--corPrincipal);
        border-radius: 7px;
        
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
          display: flex;
          flex-direction: column;
          align-items: start;
          justify-content: center;
          width: 13rem;
      }
      .divImg{
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          width: 10rem;
      }
      select{
          width: 70vw;
      }
      .ftPerfil{
          border-radius: 50px;
          height: 100px;
      }
    </style>
  </head>
  <body>
  <header class="header">
      <div class="textLogo"><span>AdInfinitum</span></div>
    </header>
    
    <div class="main">
                <div class="form">
                  <h1>Cadastrar usuário</h1>
                      <form action="" method="post" class="form" name="usuario" enctype="multipart/form-data">
                        <input
                          type="text"
                          name="rm"
                          id="rm"
                          placeholder="Digite o rm: "
                        />
                        <input
                          type="text"
                          name="nome"
                          id="nome"
                          placeholder="Digite o nome: "
                        />
                        <input
                          type="email"
                          name="email"
                          id="email"
                          placeholder="Digite o email: "
                        />
                        <label for="dt">Selecione a data de nascimento:</label>
                        <input
                          type="date"
                          name="dt"
                          id="dt"
                        />
                        <label for="genero">Selecione o gênero?</label>
                        <select name="genero">
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                            <option value="O">Outro</option>
                        </select>
                        <input
                          type="text"
                          name="telefone"
                          id="telefone"
                          placeholder="Digite o telefone: "
                        />
                        <input type="password" name="senha" id="senha" placeholder="Digite a senha:">
                        <label for="fileToUpload">Foto de perfil:</label>
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        <input type="text" name="userStatus" id="userStatus" placeholder="Status:">
                        <input type="text" name="obs" id="obs" placeholder="Observação:">
                        <label for="adm">É um administrador?</label>
                        <select name="adm" id="adm">
                          <option value="0">Não</option>
                          <option value="1">Sim</option>
                        </select>
                        <button class="buttonDefault" name="cadastroUsu">Enviar</button>
                        <?php
                            if(isset($_POST['nome'])){
                                $target_dir = "img/perfis/";
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
                                    $resultado = cadastrarUsuario($_POST['rm'], $_POST['nome'], $_POST['email'], $_POST['dt'], $_POST['genero'], $_POST['telefone'], $_POST['senha'], $_SESSION['nm_arquivo'], $_POST['userStatus'], $_POST['obs'], $_POST['adm']); 
                            }
                        ?>
                      </form>
              </div>
                 <a href="pageAdm.php"><button class="buttonDefault" name="livro">Voltar</button></a>
                <h1>Pesquisar usuário</h1>
                    <form method="post" class="form" name="pesquisaForm">
                        <input type="text" name="pesquisa"  id="pesquisa" placeholder="Pesquisar usuário: "/>
                        <button class="buttonDefault" name="pesquisaBtn">Pesquisar</button>
                        <?php
                                if(isset($_POST['pesquisa'])){
                                    PesquisarUsuario($_POST['pesquisa']);
                                } 
                            ?>
                    </form>
                <a href="pageAdm.php"><button class="buttonDefault">Voltar</button></a>
                 <div class="show">
                    <h1>Usuários</h1>
                        <?php
                        
                        echo '<div class="mostrar">';
                            MostrarUsuario();
                        echo '</div>';
                        ?>
                    <a href="pageAdm.php" style="margin-bottom: 10vh;"><button class="buttonDefault">Voltar</button></a>
                </div>
      </div>
    </div>
  </body>
</html>

