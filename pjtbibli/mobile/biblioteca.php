<?php
  $user = 'bairpfhw_infinit';
  $pass = '1234554321';
  $banco = 'bairpfhw_biblioteca';
  $server = 'localhost';
  $conn = new mysqli($server, $user, $pass, $banco);
  if(!$conn){
    echo "Erro de conexão ".$conn->error;
  }
  /* Metodos do CRUD do Administrador */
  function Login($email, $senha, $tipo){
      $sql = 'SELECT * FROM usuario WHERE email = "'.$email.'" AND senha = "'.$senha.'"';
      $res  = $GLOBALS['conn']->query($sql);
      if($res->num_rows > 0){
          $retorno['erro'] = false;
          $user = $res->fetch_object();
          $retorno['dados'] = $user;
      } else{
          $retorno ['erro'] = true;
      }
      if($tipo == 'json'){
        echo json_encode($retorno);
      }else {
        echo $retorno;
      }
      }
          function cadastrarUsuario($rm,$nome,$email,$senha,$userstatus,$adm){
        $sql = 'INSERT INTO usuario(rm, nome, email, senha, user_status, adm) VALUES ('.$rm.',"'.$nome.'","'.$email.'","'.$senha.'","'.$userstatus.'","'.$adm.'")';
        $destino = 'usuario/fotos/'.$rm;
        if (is_dir($destino)){
            mkdir($destino, 0777);
        }
        $res = $GLOBALS['conn']->query($sql);
        if($res){
          echo "Usuário cadastrado com sucesso!";
        }else{
          echo "Erro ao cadastrar ADM";
        }
        }
  function ExcluirUsuario($rm){
    $sql = 'DELETE FROM usuario WHERE rm = '.$rm;
    $res = $GLOBALS['conn']->query($sql);

    if($res)
      echo "Excluído com sucesso!";
    else 
      echo "Erro ao excluir";
  }
  function AtualizarUsuario($rm,$nome,$nasc,$gen,$tel){
    $sql = 'UPDATE usuario SET nome = "'.$nome.'",dt_nascimento = "'.$nasc.'", genero = "'.$gen.'", telefone = "'.tel.'" WHERE rm ='.$rm;
    $res = GLOBALS ['conn']-> query($sql);
    if($res)
      echo "Atualizado com sucesso!";
    else
      echo "Erro ao atualizar";
  }
  function TrocarFoto($rm,$foto){
    $destino = 'usuario/fotos/'.$rm.'/'.$foto['name'];
    if(move_uploaded_file($foto['tmp_name'], $destino)){
      $sql = 'SELECT * FROM usuario WHERE rm = '.$rm;
      $res = $GLOBALS['conn']->query($sql);
      $user = $res->fetch_array();
      unlink($user['perfil']);
      $sql = 'UPDATE usuario SET perfil "'.$destino.'" WHERE rm = '.$rm;
      $res = $GLOBALS['conn']->query($sql);
      if($res){
        echo "Atualizado com sucesso";
      }
      else{
        echo "Erro ao atualizar foto";
      }
    }
  }
  function TrocarSenha(){
    $nova_senha = ""; //fazer método
    $sql = 'UPDATE usuario SET senha ="'.$nova_senha.'" WHERE rm = '.$rm;
    $res = GLOBALS['conn']->query($sql);
    $user = $res->fetch_array();
    if(mail($user['email'], "Biblioteca [nova senha]",$msg)){
      $sql = 'UPDATE usuario SET senha = "'.$nova_senha.'" WHERE rm = '.$rm;
      $res = $GLOBALS['conn']->query($sql);
      if($res){
        echo "Nova senha encaminhada para seu email!";
      } else{
        echo "Erro ao trocar a senha. Tente novamente";
      }
    }
  }
  function CadastrarGenero($nome){
    $sql = 'INSERT INTO genero VALUES (null, "'.$nome.'")';
    $res  = $GLOBALS['conn']->query($sql);
    if($res){
      echo "Gênero cadastrado :p";
    } else {
      echo "Erro ao cadastrar gênero ;-;"; 
    }
  }
  function ExcluirGenero($cd){
    $sql = 'DELETE FROM genero WHERE cd ='.$cd;
    $res = $GLOBALS['conn']->query($sql);
    if($res){
      echo "Gênero excluído";
    } else {
      echo "Erro ao excluir, verifique se há livros utilizando.";
    }
  }
  function CadastrarEditora($nome){
    $sql = 'INSERT INTO editora VALUES (null, "'.$nome.'")';
    $res  = $GLOBALS['conn']->query($sql);
    if($res){
      echo "Editora cadastrada";
    } else {
      echo "Erro ao cadastrar"; 
    }
  }
  function ExcluirEditora($cd){
    $sql = 'DELETE FROM editora WHERE cd= '.$cd;
    $res  = $GLOBALS['conn']->query($sql);
    if($res){
      echo "Editora excluída";
    } else {
      echo "Erro ao excluir, verifique se há livros usando"; 
    }
  }
  function CadastrarAutor($nome){
    $sql = 'INSERT INTO autor VALUES (null, "'.$nome.'")';
    $res  = $GLOBALS['conn']->query($sql);
    if($res){
      echo "Autor cadastrado";
    } else {
      echo "Erro ao cadastrar"; 
    }
  }
  function ExcluirAutor($cd){
    $sql = 'DELETE FROM autor WHERE cd= '.$cd;
    $res  = $GLOBALS['conn']->query($sql);
    if($res){
      echo "Autor excluído";
    } else {
      echo "Erro ao excluir, verifique se há livros usando"; 
    }
  }
  function MostrarAutor(){
    $sql = "SELECT * FROM autor";
    $result = $GLOBALS['conn']->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo 
            '<h3>
                <table>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Opção</th>
                    </tr>
                    <tr>
                        <td>' . $row["cd"]. ' </td>
                        <td>' . $row["nm_autor"]. ' </td>
                        <td> 
                            <a href="cadAut.php?cd='.$row["cd"].'" style="text-decoration: underline; cursor: pointer;">Excluir</a>
                        </td>
                    </tr>
                </table>
            </h3>';
      }
      if(isset($_GET['cd'])){
        ExcluirAutor($_GET['cd']);
      }
    } else {
      echo "0 results";
    }
  }
  function MostrarUsuario(){
    $sql = "SELECT * FROM usuario";
    $result = $GLOBALS['conn']->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo 
            '<h3>
                <table>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Opção</th>
                    </tr>
                    <tr>
                        <td>' . $row["rm"]. ' </td>
                        <td>' . $row["nome"]. ' </td>
                        <td> 
                            <a href="cadUsu.php?rm='.$row["rm"].'" style="text-decoration: underline; cursor: pointer;">Excluir</a>
                        </td>
                    </tr>
                </table>
            </h3>';
      }
      if(isset($_GET['rm'])){
        ExcluirUsuario($_GET['rm']);
      }
    } else {
      echo "0 results";
    }
  }
  function MostrarGenero(){
    $sql = "SELECT * FROM genero";
    $result = $GLOBALS['conn']->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo 
            '<h3>
                <table>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Opção</th>
                    </tr>
                    <tr>
                        <td>' . $row["cd"]. ' </td>
                        <td>' . $row["nome"]. ' </td>
                        <td> 
                            <a href="cadGen.php?cd='.$row["cd"].'" style="text-decoration: underline; cursor: pointer;">Excluir</a>
                        </td>
                    </tr>
                </table>
            </h3>';
      }
      if(isset($_GET['cd'])){
        ExcluirGenero($_GET["cd"]);
      }
    } else {
      echo "0 results";
    }
  }
  function MostrarGeneroOff(){
    $sql = "SELECT * FROM genero";
    $result = $GLOBALS['conn']->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo 
            '<h3>
                <table>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                    </tr>
                    <tr>
                        <td>' . $row["cd"]. ' </td>
                        <td>' . $row["nome"]. ' </td>
                    </tr>
                </table>
            </h3>';
      }
      
    } else {
      echo "0 results";
    }
  }
  function MostrarEditora(){
    $sql = "SELECT * FROM editora";
    $result = $GLOBALS['conn']->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo 
            '<h3>
                <table>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Opção</th>
                    </tr>
                    <tr>
                        <td>' . $row["cd"]. ' </td>
                        <td>' . $row["nm_editora"]. ' </td>
                        <td> 
                            <a href="cadEd.php?cd='.$row["cd"].'" style="text-decoration: underline; cursor: pointer;">Excluir</a>
                        </td>
                    </tr>
                </table>
            </h3>';
      }
      if(isset($_GET['cd'])){
        ExcluirEditora($_GET["cd"]);
      }
    } else {
      echo "0 results";
    }
  }
  function MostrarEditoraOff(){
    $sql = "SELECT * FROM editora";
    $result = $GLOBALS['conn']->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo 
            '<h3>
                <table>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                    </tr>
                    <tr>
                        <td>' . $row["cd"]. ' </td>
                        <td>' . $row["nm_editora"]. ' </td>
                    </tr>
                </table>
            </h3>';
      }
    } else {
      echo "0 results";
    }
  }
  function CadastrarLivro($ano, $classificacao, $estado, $id_editora, $id_genero, $isbn, $qtd, $sinopse, $titulo){
    $sql = 'INSERT INTO livro(ano, capa, cd, classificacao, estado, id_editora, id_genero, isbn, qtd, sinopse, titulo) VALUES ("'.$ano.'", null, null, "'.$classificacao.'", "'.$estado.'", "'.$id_editora.'", "'.$id_genero.'", "'.$isbn.'", "'.$qtd.'", "'.$sinopse.'", "'.$titulo.'")';
    $res  = $GLOBALS['conn']->query($sql);
    if($res){
      echo "Livro cadastrado";
    } else {
      echo "Erro ao cadastrar"; 
    }
  }
  function ListarLivros(){
    $sql = "SELECT cd, titulo, capa FROM livro";
    $result = $GLOBALS['conn']->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo '<img href=" ' .$row["capa"]. ' ">';
        echo 
            '<h3>
                <table>
                    <tr>
                        <th>Código</th>
                        <th>Título</th>
                        <th>Opção</th>
                    </tr>
                    <tr>
                        <td>' . $row["cd"]. ' </td>
                        <td>' . $row["titulo"]. ' </td>
                        <td> 
                            <a href="cadLivro.php?cd='.$row["cd"].'" style="text-decoration: underline; cursor: pointer;">Excluir</a>
                        </td>
                    </tr>
                </table>
            </h3>';
      }
      if(isset($_GET['cd'])){
        ExcluirLivro($_GET["cd"]);
      }
    } else {
      echo "0 results";
    }
  }
  
  function ListarLivro($cd){
      $sql = 'SELECT * FROM livro';
      if($cd>0){
          $sql.='WHERE cd='.$cd;
      }
      $res = $GLOBALS['conn']->query($sql);
      return $res;
  }
  function ExcluirLivro($cd){
    $sql = 'DELETE FROM livro WHERE cd= '.$cd;
    $res  = $GLOBALS['conn']->query($sql);
    if($res){
      echo "Livro excluído";
    } else {
      echo "Erro ao excluir"; 
    }
  }
?>