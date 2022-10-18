<?php
    include('biblioteca.php');
    include('protect.php');
    if(isset($_GET['rmForBloq'])){
          BloquearUsuario($_GET['rmForBloq']);
      }
      if(isset($_GET['rmForDesbloq'])){
          DesbloquearUsuario($_GET['rmForDesbloq']);
      }
?>
<?php
                        if(isset($_POST['editRm'])){
                            $sql = 'UPDATE usuario SET rm="'.$_POST['rm'].'" WHERE rm = "'.$_SESSION['rmForView'].'"';
                            $res = $GLOBALS['conn']->query($sql);
                            if($res){
                                echo 'RM alterado com sucesso';
                            } else{
                                echo 'Erro';
                            }
                        }
                    ?>
                    <?php
                            if(isset($_POST['editNome'])){
                                $sql = 'UPDATE usuario SET nome="'.$_POST['nome'].'" WHERE rm = "'.$_SESSION['rmForView'].'"';
                                $res = $GLOBALS['conn']->query($sql);
                                if($res){
                                    echo 'Nome alterado com sucesso';
                                } else{
                                    echo 'Erro';
                                }
                            }
                    ?>        <?php
                            if(isset($_POST['editEmail'])){
                                $sql = 'UPDATE usuario SET email="'.$_POST['email'].'" WHERE rm = "'.$_SESSION['rmForView'].'"';
                                $res = $GLOBALS['conn']->query($sql);
                                if($res){
                                    echo 'Email alterado com sucesso';
                                } else{
                                    echo 'Erro';
                                }
                            }
                    ?>
                    <?php
                            if(isset($_POST['editDt'])){
                                $sql = 'UPDATE usuario SET dt_nascimento='.$_POST['dt'].' WHERE rm = "'.$_SESSION['rmForView'].'"';
                                $res = $GLOBALS['conn']->query($sql);
                                if($res){
                                    echo 'Data alterada com sucesso';
                                } else{
                                    echo 'Erro';
                                }
                            }
                    ?>
                    
                    <?php
                            if(isset($_POST['editGen'])){
                                $sql = 'UPDATE usuario SET genero="'.$_POST['genero'].'" WHERE rm = "'.$_SESSION['rmForView'].'"';
                                $res = $GLOBALS['conn']->query($sql);
                                if($res){
                                    echo 'Gênero alterado com sucesso';
                                } else{
                                    echo 'Erro';
                                }
                            }
                    ?>
                    
                    <?php
                            if(isset($_POST['editTel'])){
                                $sql = 'UPDATE usuario SET telefone='.$_POST['telefone'].' WHERE rm = "'.$_SESSION['rmForView'].'"';
                                $res = $GLOBALS['conn']->query($sql);
                                if($res){
                                    echo 'Telefone alterado com sucesso';
                                } else{
                                    echo 'Erro';
                                }
                            }
                    ?>
                    
                    <?php
                            if(isset($_POST['editSenha'])){
                                $sql = 'UPDATE usuario SET senha="'.$_POST['senha'].'" WHERE rm = "'.$_SESSION['rmForView'].'"';
                                $res = $GLOBALS['conn']->query($sql);
                                if($res){
                                    echo 'Senha alterada com sucesso';
                                } else{
                                    echo 'Erro';
                                }
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
        padding-top: 5rem;
        gap:3 rem;
      }
      .form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 3rem;
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
        width: 50rem;
        
        
        padding: 3rem;
        gap: 3vh;
        border: 1px solid var(--corPrincipal);
        
        -webkit-box-shadow: 7px 5px 3px rgba(27, 61, 38, 0.65);
		-moz-box-shadow:    7px 5px 3px rgba(27, 61, 38, 0.65);
		box-shadow:         7px 5px 3px rgba(27, 61, 38, 0.65);
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
      .forms{
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
          gap: 3rem;
      }
      select{
          width: 45vw;
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
        <div class="show">
            <h1>Usuário</h1>
                <?php
                echo '<div class="mostrar">';
                $rm = $_SESSION['rmForView'];
                    MostrarUsuarioEsp($rm);
                echo '</div>';
                ?>
            <a href="cadUsu.php" style="margin-bottom: 10vh;"><button class="buttonDefault">Voltar</button></a>
        </div>
        <div class="forms">
        <h1>Editar usuário</h1>
            <div class="divForm">
            <form method="post" class="form">
                <input type="text" name="rm" placeholder="Digite o novo RM:"></input>
                <button class="buttonDefault" name="editRm">Enviar</button>
            </form>
            </div>
            <div class="divForm">
            <form method="post" class="form">
                <input type="text" name="nome" placeholder="Digite o novo Nome:"></input>
                <button class="buttonDefault" name="editNome">Enviar</button>
            </form>
            </div>
            <div class="divForm">
            <form method="post" class="form">
                <input type="email" name="email" placeholder="Digite o novo email:"></input>
                <button class="buttonDefault" name="editEmail">Enviar</button>
            </form>
            </div>
            <div class="divForm">
            <form method="post" class="form">
                <h3>Escolha a nova data de nascimento:</h3>
                <input type="date" name="dt"></input>
                <button class="buttonDefault" name="editDt">Enviar</button>
            </form>
            </div>
            <div class="divForm">
            <form method="post" class="form">
            <h3>Escolha o novo gênero:</h3>
                <select name="genero">
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                    <option value="O">Outro</option>
                </select>
                <button class="buttonDefault" name="editGen">Enviar</button>
            </form>
            </div>
            <div class="divForm">
            <form method="post" class="form">
                <input type="text" name="telefone" placeholder="Digite o novo Telefone:"></input>
                <button class="buttonDefault" name="editTel">Enviar</button>
            </form>
            </div>
            <div class="divForm">
            <form method="post" class="form">
                <input type="password" name="senha" placeholder="Digite a nova senha:"></input>
                <button class="buttonDefault" name="editSenha">Enviar</button>
            </form>
            </div>
            <a href="cadUsu.php" style="margin-bottom: 10vh;"><button class="buttonDefault">Voltar</button></a>
        </div>
    </div>
  </body>
</html>