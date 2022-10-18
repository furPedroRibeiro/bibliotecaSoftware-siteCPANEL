<?php
    include('protect.php');
    include('biblioteca.php');
?>
                    <?php
                        if(isset($_POST['editRm'])){
                            $sql = 'UPDATE usuario SET rm="'.$_POST['rm'].'" WHERE email = "'.$_SESSION['email'].'"';
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
                                $sql = 'UPDATE usuario SET nome="'.$_POST['nome'].'" WHERE email = "'.$_SESSION['email'].'"';
                                $res = $GLOBALS['conn']->query($sql);
                                if($res){
                                    echo 'Nome alterado com sucesso';
                                } else{
                                    echo 'Erro';
                                }
                            }
                    ?>        <?php
                            if(isset($_POST['editEmail'])){
                                $sql = 'UPDATE usuario SET email="'.$_POST['email'].'" WHERE email = "'.$_SESSION['email'].'"';
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
                                $sql = 'UPDATE usuario SET dt_nascimento='.$_POST['dt'].' WHERE email = "'.$_SESSION['email'].'"';
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
                                $sql = 'UPDATE usuario SET genero="'.$_POST['genero'].'" WHERE email = "'.$_SESSION['email'].'"';
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
                                $sql = 'UPDATE usuario SET telefone='.$_POST['telefone'].' WHERE email = "'.$_SESSION['email'].'"';
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
                                $sql = 'UPDATE usuario SET senha="'.$_POST['senha'].'" WHERE email = "'.$_SESSION['email'].'"';
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
        padding-top: 5vh;
        gap: 10vh;
        margin-bottom: 5rem;
      }
      .form {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        gap: 3vh;
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
        width: 50rem;
        
        
        padding: 3rem;
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
        <?php
            $sql = 'SELECT * FROM usuario WHERE email ="'.$_SESSION['email'].'"';
            $res = $GLOBALS['conn']->query($sql);
            if ($res->num_rows > 0) {
              // output data of each row
              while($row = $res->fetch_assoc()) {
                echo 
                    '<h3>
                        <div class="card">
                            <img width="100px" src="img/hect.png">
                                <div class="text">
                                    <p>RM: '.$row['rm'].'</p>
                                    <p>Nome: '.$row['nome'].'</p>
                                    <p>Email: '.$row['email'].'</p>
                                    <p>Data de nascimento: '.$row['dt_nascimento'].'</p>
                                    <p>Gênero: '.$row['genero'].'</p>
                                    <p>Telefone: '.$row['telefone'].'</p>
                                    <p>Senha: '.$row['senha'].'</p>
                                    <p>Perfil: '.$row['perfil'].'</p>
                                    <p>Status: '.$row['user_status'].'</p>
                                    <p>Observação: '.$row['obs'].'</p>
                                    <p>Administrador: Sim</p>
                                </div>
                        </div>
                    </h3>';
              }
            }
        ?>
        <a href="pageAdm.php" style="margin-bottom: 3vh;"><button class="buttonDefault">Voltar</button></a>
        <h1>Novos dados(nenhum campo abaixo é obrigatório de ser editado)</h1>
        <form method="post" class="form">
            <input type="text" name="rm" placeholder="Digite o novo RM:"></input>
            <button class="buttonDefault" name="editRm">Enviar</button>
        </form>
        
        <form method="post" class="form">
            <input type="text" name="nome" placeholder="Digite o novo Nome:"></input>
            <button class="buttonDefault" name="editNome">Enviar</button>
        </form>

        <form method="post" class="form">
            <input type="email" name="email" placeholder="Digite o novo email:"></input>
            <button class="buttonDefault" name="editEmail">Enviar</button>
        </form>

        <h3>Escolha a nova data de nascimento:</h3>
        <form method="post" class="form">
            <input type="date" name="dt"></input>
            <button class="buttonDefault" name="editDt">Enviar</button>
        </form>
        
        <h3>Escolha o novo gênero:</h3>
        <form method="post" class="form">
            <select name="genero">
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
                <option value="O">Outro</option>
            </select>
            <button class="buttonDefault" name="editGen">Enviar</button>
        </form>
        
        <form method="post" class="form">
            <input type="text" name="telefone" placeholder="Digite o novo Telefone:"></input>
            <button class="buttonDefault" name="editTel">Enviar</button>
        </form>
        
        <form method="post" class="form">
            <input type="password" name="senha" placeholder="Digite a nova senha:"></input>
            <button class="buttonDefault" name="editSenha">Enviar</button>
        </form>
        
        <a href="pageAdm.php" style="margin-bottom: 10vh;"><button class="buttonDefault">Voltar</button></a>
    </div>
  </body>
</html>