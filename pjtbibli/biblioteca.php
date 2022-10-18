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
        return json_encode($retorno);
      }else {
        return $retorno;
      }
      }
    function cadastrarUsuario($rm,$nome,$email,$dt_nascimento,$genero,$telefone,$senha,$perfil,$userstatus,$obs,$adm){
        $sql = 'INSERT INTO usuario(rm, nome, email, dt_nascimento, genero, telefone, senha, perfil, user_status, obs, adm) VALUES ("'.$rm.'","'.$nome.'","'.$email.'","'.$dt_nascimento.'","'.$genero.'","'.$telefone.'","'.$senha.'","'.$perfil.'","'.$userstatus.'","'.$obs.'","'.$adm.'")';
        $res = $GLOBALS['conn']->query($sql);
        if($res){
          echo "Usuário cadastrado com sucesso!";
        }else{
          echo "Erro ao cadastrar ADM".$sql;
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
  function MostrarGenero(){
    $sql = "SELECT * FROM genero";
    $result = $GLOBALS['conn']->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo 
            '<h3>
                <div class="card">
                    <img width="100px" src="img/capaGen.png">
                        <div class="text">
                            <p>Código: '.$row['cd'].'</p>
                            <p>Gênero: '.$row['nome'].'</p>
                            <p>
                                <a href="cadGen.php?cdforremove='.$row["cd"].'" style="text-decoration: underline; cursor: pointer;"><img src="img/lixeira.png" width="30px"/></a>
                            </p>
                        </div>
                </div>
            </h3>';
      }
      if(isset($_GET['cdforremove'])){
        ExcluirGenero($_GET["cdforremove"]);
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
                <option value="'.$row['cd'].'">'.$row['nome'].'</option>
            </h3>';
      }
    } else {
      echo "0 results";
    }
  }
  function PesquisarGenero($pesquisa){
    $sql = 'SELECT cd, nome FROM genero WHERE nome LIKE "%'.$pesquisa.'%"';
    $result = $GLOBALS['conn']->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo 
            '<h3>
                <div class="card">
                    <img width="100px" src="img/capaGen.png">
                        <div class="text">
                            <p>Código: '.$row['cd'].'</p>
                            <p>Gênero: '.$row['nome'].'</p>
                            <p>
                                <a href="cadGen.php?cdforremove='.$row["cd"].'" style="text-decoration: underline; cursor: pointer;"><img src="img/lixeira.png" width="30px"/></a>
                            </p>
                        </div>
                </div>
            </h3>';
      }
      if(isset($_GET['cdforremove'])){
        ExcluirGenero($_GET["cdforremove"]);
      }
    } else {
      echo "0 results";
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
  function MostrarEditora(){
    $sql = "SELECT * FROM editora";
    $result = $GLOBALS['conn']->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo 
            '<h3>
                <div class="card">
                    <img width="100px" src="img/edit.png">
                        <div class="text">
                            <p>Código: '.$row['cd'].'</p>
                            <p>Editora: '.$row['nm_editora'].'</p>
                            <p>
                                <a href="cadEd.php?cdforremove='.$row["cd"].'" style="text-decoration: underline; cursor: pointer;"><img src="img/lixeira.png" width="30px"/></a>
                            </p>
                        </div>
                </div>
            </h3>';
      }
      if(isset($_GET['cdforremove'])){
        ExcluirEditora($_GET["cdforremove"]);
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
                <option value="'.$row['cd'].'">'.$row['nm_editora'].'</option>
            </h3>';
      }
    } else {
      echo "0 results";
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
  function PesquisarEditora($pesquisa){
    $sql = 'SELECT cd, nm_editora FROM editora WHERE nm_editora LIKE "%'.$pesquisa.'%"';
    $result = $GLOBALS['conn']->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo 
            '<h3>
                <div class="card">
                    <img width="100px" src="img/edit.png">
                        <div class="text">
                            <p>Código: '.$row['cd'].'</p>
                            <p>Editora: '.$row['nm_editora'].'</p>
                            <p>
                                <a href="cadEd.php?cdforremove='.$row["cd"].'" style="text-decoration: underline; cursor: pointer;"><img src="img/lixeira.png" width="30px"/></a>
                            </p>
                        </div>
                </div>
            </h3>';
      }
      if(isset($_GET['cdforremove'])){
        ExcluirAutor($_GET["cdforremove"]);
      }
    } else {
      echo "0 results";
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
                <div class="card">
                    <img width="100px" src="img/autor.png">
                        <div class="text">
                            <p>Código: '.$row['cd'].'</p>
                            <p>Autor: '.$row['nm_autor'].'</p>
                            <p>
                                <a href="cadAut.php?cdforremove='.$row["cd"].'" style="text-decoration: underline; cursor: pointer;"><img src="img/lixeira.png" width="30px"/></a>
                            </p>
                        </div>
                </div>
            </h3>';
      }
      if(isset($_GET['cdforremove'])){
        ExcluirAutor($_GET['cdforremove']);
      }
    } else {
      echo "0 results";
    }
  }
  function MostrarAutorOff(){
    $sql = "SELECT * FROM autor";
    $result = $GLOBALS['conn']->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo 
            '<h3>
                <option value="'.$row['cd'].'">'.$row['nm_autor'].'</option>
            </h3>';
      }
    } else {
      echo "0 results";
    }
  }
  function PesquisarAutor($pesquisa){
    $sql = 'SELECT cd, nm_autor FROM autor WHERE nm_autor LIKE "%'.$pesquisa.'%"';
    $result = $GLOBALS['conn']->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo 
            '<h3>
                <div class="card">
                    <img width="100px" src="img/autor.png">
                        <div class="text">
                            <p>Código: '.$row['cd'].'</p>
                            <p>Autor: '.$row['nm_autor'].'</p>
                            <p>
                                <a href="cadAut.php?cdforremove='.$row["cd"].'" style="text-decoration: underline; cursor: pointer;"><img src="img/lixeira.png" width="30px"/></a>
                            </p>
                        </div>
                </div>
            </h3>';
      }
      if(isset($_GET['cdforremove'])){
        ExcluirAutor($_GET["cdforremove"]);
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
                <div class="card">
                    <img class="ftPerfil" width="100px" src="img/perfis/'.$row["perfil"].'">
                        <div class="text">
                            <p style="font-weight: normal;">RM: '.$row['rm'].'</p>
                            <p style="font-weight: bold; font-size: 21.7px;">'.$row['nome'].'</p>
                            <p>
                                <a href="cadUsu.php?rm='.$row["rm"].'" style="text-decoration: underline; cursor: pointer;"><img src="img/lixeira.png" width="30px"/></a>
                                <a href="cadUsu.php?rmForView='.$row["rm"].'" style="text-decoration: underline; cursor: pointer;"><img src="img/view.png" width="30px"/></a>
                            </p>
                        </div>
                </div>
            </h3>';
      }
      if(isset($_GET['rm'])){
        ExcluirUsuario($_GET['rm']);
      }
    } else {
      echo "0 results";
    }
  }
  function MostrarUsuarioEsp($rm){
        $sql = 'SELECT * FROM usuario WHERE rm="'.$rm.'"';
        $res = $GLOBALS['conn']->query($sql);
            if ($res->num_rows > 0) {
              // output data of each row
              while($row = $res->fetch_assoc()) {
                if($row['adm']==1){
                    $adm = "Sim";
                } else{
                    $adm = "Não";
                }
                echo 
                    '<h3>
                        <div class="card">
                            <div class="divImg">
                                <img class="ftPerfil" width="100px" src="img/perfis/'.$row["perfil"].'">
                            </div>
                            <div class="text">
                                <p>RM: '.$row['rm'].'</p>
                                <p>Nome: '.$row['nome'].'</p>
                                <p>Email: '.$row['email'].'</p>
                                <p>Data de nascimento: '.$row['dt_nascimento'].'</p>
                                <p>Gênero: '.$row['genero'].'</p>
                                <p>Telefone: '.$row['telefone'].'</p>
                                <p>Senha: '.$row['senha'].'</p>
                                <p>Status: '.$row['user_status'].'</p>
                                <p>Observação: '.$row['obs'].'</p>
                                <p>Administrador: '.$adm.'</p>
                                <p>
                                <a href="usuarioEspecifico.php?rmForBloq='.$row["rm"].'" style="text-decoration: underline; cursor: pointer;"><img src="img/bloqueado.png" width="30px"/></a>
                                <a href="usuarioEspecifico.php?rmForDesbloq='.$row["rm"].'" style="text-decoration: underline; cursor: pointer;"><img src="img/desbloqueado.png" width="30px"/></a>
                                </p>
                            </div>
                        </div>
                    </h3>';
              }
    } else{
        echo '0 results'.$sql;
    }
  }
  function MostrarUsuarioOff(){
    $sql = "SELECT * FROM usuario";
    $result = $GLOBALS['conn']->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo 
            '<h3>
                <option value="'.$row['rm'].'">'.$row['nome'].'</option>
            </h3>';
      }
    } else {
      echo "0 results";
    }
  }
  function PesquisarUsuario($pesquisa){
        $sql = 'SELECT rm, nome, perfil FROM usuario WHERE nome LIKE "%'.$pesquisa.'%"';
        $result = $GLOBALS['conn']->query($sql);
        
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            echo 
                '<h3>
                    <div class="card">
                        <img class="ftPerfil" width="100px" src="img/perfis/'.$row["perfil"].'">
                            <div class="text">
                                <p>RM: '.$row['rm'].'</p>
                                <p>Nome: '.$row['nome'].'</p>
                                <p>
                                    <a href="cadUsu.php?rm='.$row["rm"].'" style="text-decoration: underline; cursor: pointer;"><img src="img/lixeira.png" width="30px"/></a>
                                    <a href="cadUsu.php?rmForView='.$row["rm"].'" style="text-decoration: underline; cursor: pointer;"><img src="img/view.png" width="30px"/></a>
                                </p>
                            </div>
                    </div>
                </h3>';
          }
          if(isset($_GET['rm'])){
            ExcluirUsuario($_GET['rm']);
          }
        } else {
          echo "0 results";
        }
  }
  function BloquearUsuario($rm){
    $sql = 'UPDATE usuario SET user_status= "bloqueado" WHERE rm="'.$rm.'"';
    $result = $GLOBALS['conn']->query($sql);
    if($result){
        
    } else{
        echo 'Erro ao bloquear usuário!!'.$sql;
    }    
  }
  function DesbloquearUsuario($rm){
    $sql = 'UPDATE usuario SET user_status= "ativo" WHERE rm="'.$rm.'"';
    $result = $GLOBALS['conn']->query($sql);
    if($result){
        
    } else{
        echo 'Erro ao desbloquear usuário!!'.$sql;
    }    
  }
  
  function CadastrarLivro($ano, $capa, $classificacao, $estado, $id_editora, $id_genero, $isbn, $qtd, $sinopse, $titulo){
    session_start();
    $sql = 'INSERT INTO livro(ano, cd, capa, classificacao, estado, id_editora, id_genero, isbn, qtd, sinopse, titulo) VALUES ("'.$ano.'", null, "'.$capa.'", "'.$classificacao.'", "'.$estado.'", "'.$id_editora.'", "'.$id_genero.'", "'.$isbn.'", "'.$qtd.'", "'.$sinopse.'", "'.$titulo.'")';
    $res  = $GLOBALS['conn']->query($sql);
    if($res){
      $_SESSION['acertoLivro'] = 'Livro cadastrado';
    } else {
      $_SESSION['erroLivro'] = 'Erro ao cadastrar livro';
    }
  }
  function livroAutor($id_autor, $cdLivro){
    session_start();
    $sql = 'INSERT INTO autor_livro (id_livro, id_autor) VALUES ('.$cdLivro.', '.$id_autor.')';
    $res  = $GLOBALS['conn']->query($sql);
    if($res){
      $_SESSION['acertoLivroAutor'] = 'Autor cadastrado';
    } else {
      $_SESSION['erroLivroAutor'] = 'Erro ao cadastrar autor';
    }
  }
  function ListarLivros(){
    $sql = "SELECT cd, titulo, capa FROM livro";
    $result = $GLOBALS['conn']->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo 
            '
            <h3>
                <div class="card">
                <img height="250px" src="img/capas/'.$row["capa"].'">
                                <div class="text">
                                    <p>Código: '.$row['cd'].'</p>
                                    <p>Título: '.$row['titulo'].'</p>
                                    <p>
                                        <a href="acervo.php?cdforshow='.$row["cd"].'" style="text-decoration: underline; cursor: pointer;"><img src="img/view.png" width="30px"/></a>
                                        <a href="acervo.php?cdforremove='.$row["cd"].'" style="text-decoration: underline; cursor: pointer;"><img src="img/lixeira.png" width="30px"/></a>
                                    </p>
                              </div>
                          </div>
            </h3>';
      }
      if(isset($_GET['cdforremove'])){
        ExcluirLivroAutor($_GET['cdforremove']);
        ExcluirLivro($_GET["cdforremove"]);
      }
    } else {
      echo "0 results";
    }
  }
  function MostrarLivroOff(){
    $sql = "SELECT * FROM livro";
    $result = $GLOBALS['conn']->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo 
            '<h3>
                <option value="'.$row['cd'].'">'.$row['titulo'].'</option>
            </h3>';
      }
    } else {
      echo "0 results";
    }
  }
  function nmGen($idGen){
        $sql = "SELECT nome FROM genero WHERE cd=".$idGen;
        $result = $GLOBALS['conn']->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '
                        <p>Gênero: '.$row['nome'].'</p>
                    ';
                }
            }
  }
  function nmEd($idEd){
        $sql = "SELECT nm_editora FROM editora WHERE cd=".$idEd;
        $result = $GLOBALS['conn']->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '
                        <p>Editora: '.$row['nm_editora'].'</p>
                    ';
                }
            }
  }
  function nmAut($cdAut){
        $sql = "SELECT nm_autor FROM autor WHERE cd=".$cdAut;
        $result = $GLOBALS['conn']->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '
                        <p>Autor: '.$row['nm_autor'].'</p>
                    ';
                }
            }
  }
  function idAut($cdLivro){
        $sql = "SELECT id_autor FROM autor_livro WHERE id_livro=".$cdLivro;
        $result = $GLOBALS['conn']->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    nmAut($row['id_autor']);
                }
            }
  }
   function MostrarLivroEsp($cd){
    $sql = "SELECT capa, cd, titulo, sinopse, qtd, isbn, id_genero, id_editora, estado, classificacao, ano FROM livro WHERE cd = ".$cd;
    $result = $GLOBALS['conn']->query($sql);
                    
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo 
                    '
                    <div class="mostrar">
                    <img width="200px" src="img/capas/'.$row['capa'].'">
                    <h3>
                        <div class="text">
                            <p>Código: '.$row['cd'].'</p>
                            <p>Título: '.$row['titulo'].'</p>
                            <p>Sinopse: 
                            <hr>
                                <p>'.$row['sinopse'].'</p>
                            </p>
                            <hr>
                            <p>Quantidade: '.$row['qtd'].'</p>
                            <p>ISBN: '.$row['isbn'].'</p>
                            ';
                            nmGen($row['id_genero']);
                            nmEd($row['id_editora']);
                            idAut($row['cd']);
                echo            
                        '    
                            <p>Estado: '.$row['estado'].'</p>
                            <p>Classificação: '.$row['classificacao'].'</p>
                            <p>Ano: '.$row['ano'].'</p>
                            <p><a href="livroEsp.php?cdforremove='.$row["cd"].'" style="text-decoration: underline; cursor: pointer;"><img src="img/lixeira.png" width="30px"/></a></p>
                        </div>
                    </h3>
                    </div>';
            }
            if(isset($_GET['cdforremove'])){
                ExcluirLivroAutor($_GET["cdforremove"]);
                ExcluirLivro($_GET["cdforremove"]);
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
  /*funções relacionadas a pesquisa de livro*/
  
  function PesquisarLivro($pesquisa, $type){
    /*pesquisando livro pelo titulo*/
    if($type == 'titulo'){
        $sql = 'SELECT cd, titulo, capa FROM livro WHERE titulo LIKE "%'.$pesquisa.'%"';
        $result = $GLOBALS['conn']->query($sql);
        
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            echo 
                '
                <h3>
                    <div class="card">
                    <img height="250px" src="img/capas/'.$row["capa"].'">
                                    <div class="text">
                                        <p>Código: '.$row['cd'].'</p>
                                        <p>Título: '.$row['titulo'].'</p>
                                        <p>
                                            <a href="acervo.php?cdforshow='.$row["cd"].'" style="text-decoration: underline; cursor: pointer;"><img src="img/view.png" width="30px"/></a>
                                            <a href="acervo.php?cdforremove='.$row["cd"].'" style="text-decoration: underline; cursor: pointer;"><img src="img/lixeira.png" width="30px"/></a>
                                        </p>
                                  </div>
                              </div>
                </h3>';
          }
          if(isset($_GET['cdforremove'])){
            ExcluirLivro($_GET["cdforremove"]);
          }
        } else {
          echo "0 results";
        }
    } else if($type == 'genero'){
        $sql = 'SELECT cd, titulo, capa FROM vwLivros WHERE genero LIKE "%'.$pesquisa.'%"';
        $result = $GLOBALS['conn']->query($sql);
        
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            echo 
                '
                <h3>
                    <div class="card">
                    <img height="250px" src="img/capas/'.$row["capa"].'">
                                    <div class="text">
                                        <p>Código: '.$row['cd'].'</p>
                                        <p>Título: '.$row['titulo'].'</p>
                                        <p>
                                            <a href="acervo.php?cdforshow='.$row["cd"].'" style="text-decoration: underline; cursor: pointer;"><img src="img/view.png" width="30px"/></a>
                                            <a href="acervo.php?cdforremove='.$row["cd"].'" style="text-decoration: underline; cursor: pointer;"><img src="img/lixeira.png" width="30px"/></a>
                                        </p>
                                  </div>
                              </div>
                </h3>';
          }
          if(isset($_GET['cdforremove'])){
            ExcluirLivro($_GET["cdforremove"]);
          }
        } else {
          echo "0 results";
        }
    } else if($type == 'autor'){
        $sql = 'SELECT cd, titulo, capa FROM vwLivros WHERE autor LIKE "%'.$pesquisa.'%"';
        $result = $GLOBALS['conn']->query($sql);
        
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            echo 
                '
                <h3>
                    <div class="card">
                    <img height="250px" src="img/capas/'.$row["capa"].'">
                                    <div class="text">
                                        <p>Código: '.$row['cd'].'</p>
                                        <p>Título: '.$row['titulo'].'</p>
                                        <p>
                                            <a href="acervo.php?cdforshow='.$row["cd"].'" style="text-decoration: underline; cursor: pointer;"><img src="img/view.png" width="30px"/></a>
                                            <a href="acervo.php?cdforremove='.$row["cd"].'" style="text-decoration: underline; cursor: pointer;"><img src="img/lixeira.png" width="30px"/></a>
                                        </p>
                                  </div>
                              </div>
                </h3>';
          }
          if(isset($_GET['cdforremove'])){
            ExcluirLivro($_GET["cdforremove"]);
          }
        } else {
          echo "0 results";
        }
    } else{}
  }
        /*pesquisando livro pelo genero*/
    function PesquisarLivroPorGenero($pesquisa){
        idGen($pesquisa);
        session_start();
        $sql = 'SELECT cd, titulo, capa FROM livro WHERE id_genero LIKE "%'.$_SESSION['cdGen'].'%"';
        $result = $GLOBALS['conn']->query($sql);
        
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            echo 
                '
                <h3>
                    <div class="card">
                    <img height="250px" src="img/capas/'.$row["capa"].'">
                                    <div class="text">
                                        <p>Código: '.$row['cd'].'</p>
                                        <p>Título: '.$row['titulo'].'</p>
                                        <p>
                                            <a href="acervo.php?cdforshow='.$row["cd"].'" style="text-decoration: underline; cursor: pointer;"><img src="img/view.png" width="30px"/></a>
                                            <a href="acervo.php?cdforremove='.$row["cd"].'" style="text-decoration: underline; cursor: pointer;"><img src="img/lixeira.png" width="30px"/></a>
                                        </p>
                                  </div>
                              </div>
                </h3>';
          }
          if(isset($_GET['cdforremove'])){
            ExcluirGenero($_GET["cdforremove"]);
          }
        } else {
          echo "0 results";
        }
    }
        /*pesquisando livro pelo autor*/
 function PesquisarLivroPorAutor($pesquisa){
        idAut($pesquisa);
        cdLivro($_SESSION['cdAut']);
        $sql = 'SELECT cd, titulo, capa FROM livro WHERE cd LIKE "%'.$_SESSION['cdLivro'].'%"';
        $result = $GLOBALS['conn']->query($sql);
        
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            echo 
                '
                <h3>
                    <div class="card">
                    <img height="250px" src="img/capas/'.$row["capa"].'">
                                    <div class="text">
                                        <p>Código: '.$row['cd'].'</p>
                                        <p>Título: '.$row['titulo'].'</p>
                                        <p>
                                            <a href="acervo.php?cdforshow='.$row["cd"].'" style="text-decoration: underline; cursor: pointer;"><img src="img/view.png" width="30px"/></a>
                                            <a href="acervo.php?cdforremove='.$row["cd"].'" style="text-decoration: underline; cursor: pointer;"><img src="img/lixeira.png" width="30px"/></a>
                                        </p>
                                  </div>
                              </div>
                </h3>';
          }
          if(isset($_GET['cdforremove'])){
            ExcluirAutor($_GET["cdforremove"]);
          }
        } else {
          echo "0 results";
        }
    }
        /*pesquisando livro pela classificação*/
    function PesquisarLivroPorClassificacao($pesquisa){
        $sql = 'SELECT cd, titulo, capa FROM livro WHERE classificacao LIKE "%'.$pesquisa.'%"';
        $result = $GLOBALS['conn']->query($sql);
        
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            echo 
                '
                <h3>
                    <div class="card">
                    <img height="250px" src="img/capas/'.$row["capa"].'">
                                    <div class="text">
                                        <p>Código: '.$row['cd'].'</p>
                                        <p>Título: '.$row['titulo'].'</p>
                                        <p>
                                            <a href="acervo.php?cdforshow='.$row["cd"].'" style="text-decoration: underline; cursor: pointer;"><img src="img/view.png" width="30px"/></a>
                                            <a href="acervo.php?cdforremove='.$row["cd"].'" style="text-decoration: underline; cursor: pointer;"><img src="img/lixeira.png" width="30px"/></a>
                                        </p>
                                  </div>
                              </div>
                </h3>';
          }
          if(isset($_GET['cdforremove'])){
            ExcluirAutor($_GET["cdforremove"]);
          }
        } else {
          echo "0 results";
        }
    }
    function ExcluirLivroAutor($cd_livro){
          $sql = 'DELETE FROM autor_livro WHERE id_livro='.$cd_livro;
          $res = $GLOBALS['conn']->query($sql);
          if(!$res){
              echo 'Erro ao excluir!!!!'.$sql;
          }
      }
  function ExcluirLivro($cd){
    $sql = 'DELETE FROM livro WHERE cd= '.$cd;
    $res  = $GLOBALS['conn']->query($sql);
    if($res){
      echo "Livro excluído";
    } else {
      echo "Erro ao excluir".$sql; 
    }
  }
    function CadastrarEmprestimo($id_usuario, $dt_prevista){
        $sql = 'INSERT INTO emprestimo VALUES (null, CURDATE(), '.$dt_prevista.', null, "Devendo", '.$id_usuario.')';
        $res = $GLOBALS['conn']->query($sql);
        if($res){
            echo "Empréstimo realizado com sucesso";
        } else{
            echo "Erro ao realizar empréstimo";
        }
    }
    function cdEmp($idUsu){
        $sql = "SELECT cd FROM emprestimo WHERE id_usuario=".$idUsu;
        $result = $GLOBALS['conn']->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    session_start();
                    $_SESSION['codEmp'] = $row['cd'];
                }
            }
  }
    function CadastrarLivroEmprestimo($id_livro){
        session_start();
        $sql = 'INSERT INTO livro_emprestimo VALUES ('.$_SESSION['codEmp'].', '.$id_livro.', null)';
        $res = $GLOBALS['conn']->query($sql);
        if($res){
            echo "Livro cadastrado com sucesso";
        }
    }

?>