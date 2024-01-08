<?php
  require('conexao.php');

  $usuario = $_POST['usuario'];
  $senha = $_POST['senha'];

  if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	  header('Location: entrar.php');
	  exit();
  }

    try {
      $query = $connect->prepare('SELECT id, usuario, senha, tipo_usuario_tipo_user  FROM usuarios WHERE usuario = :usuario');
      $query->execute(array(':usuario' => $usuario));

      $data = $query->fetch(PDO::FETCH_ASSOC);
      if($data == false) {
        $errMsg = "User $usuario not found.";
      }
      else {
        if($senha == $data['senha']) {
          $_SESSION['id'] = $data['id'];
          $_SESSION['usuario'] = $data['usuario'];
          $_SESSION['senha'] = $data['senha'];
          $_SESSION['tipo_usuario'] = $data['tipo_usuario_tipo_user'];

          if ($_SESSION['tipo_usuario']==1){
            header('location:adm.php');
            exit();}
          
          header('Location: logado.php');
          exit;
        }
      }}

    catch(PDOException $e) {
      $_SESSION['errMsg']= $e->getMessage();
    }

    $_SESSION['errMsg']="Senha ou login inválidos";
    $_SESSION['usuarioe']=$usuario;
    $_SESSION['senhae']=$senha;
    header ('location:entrar.php');
    exit;
?>



  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>