<?php
session_start();
include_once("conexao.php");

if (empty($_SESSION['id']))
{header("Location: entrar.php");
exit;}
?>
<!DOCTYPE html>
<html lang="pt br">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Escute seu Coração</title>

  <!-- links CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/agency.min.css" rel="stylesheet">

    <style type="text/css">
    
    body {
    background-color: #1a1a1a;
}


  </style>

</head>

<body id="page-top">

  <?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
    }
    
    try {
      $query = $connect->prepare('SELECT id, usuario, senha, nome, email, sobrenome  FROM usuarios WHERE usuario = :usuario');
      $query->execute(array(
        ':usuario' => $_SESSION['usuario']
      ));
      $data = $query->fetch(PDO::FETCH_ASSOC);
      if($data == false) {
        $errMsg = "User $usuario not found.";
      }
      else {
        //echo $data['nome'];
        //echo "<br>";
        //echo $data['sobrenome'];
        //echo "<br>";
        //echo $data['usuario'];
        //echo "<br>";
        //echo $data['email'];
        //echo "<br>";
        //echo $data['senha'];
        //echo "<br>";
        
      }
    }
    catch(PDOException $e) {
      $errMsg = $e->getMessage();
    }
		
			
		
		?>


	<!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top"><font size="6"> Escute seu Coração</font> </a>

      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="logado.php#services">+info</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="logado.php#portfolio">Sentimentos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="logado.php#about">Como Acontece?</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="logado.php#team">Desenvolvedor</a>
          </li>
           <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="perfil.php">Perfil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="logout.php">Sair</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<br><br><br><br>


           
            
    <center><div class="card" style="width: 25rem;">
  
  <div class="card-body">
    <h2 class="card-title"><font color="pink"> Perfil</font></h2>
    <?php
    if ($_SESSION['tipo_usuario']==1)
    echo "<a href='adm.php'>Área de ADM</a>";
    ?>
   
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><strong> Nome: </strong> <br>
    <?php echo $data['nome'];?> </li>
    <li class="list-group-item"><strong>Sobrenome:</strong> <br>
    <?php echo $data['sobrenome'];?></li>
    <li class="list-group-item"><strong>Usuario:</strong><br>
    <?php echo $data['usuario'];?></li>
    <li class="list-group-item"><strong>E-mail:</strong><br>
    <?php echo $data['email'];?></li>
    <li class="list-group-item"><strong>Senha:</strong><br>
    <?php echo '****' ?></li>
  </ul>
  
  <div class="card-body">
  <!-- ?id=<?php echo $data['id'];?> -->
    <a href="edit_usuario.php" class="btn btn-info active" name='alterar' role="button" aria-pressed="true">Alterar</a>
  </div>
  
</div>
</center>

 <center>
		<!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4">
          <span class="copyright"><font color="white"> Copyright &copy; Escute seu Coração 2019</font></span>
        </div>

    <!-- /.container -->
  </footer>
</center>
	</body>
</html>
