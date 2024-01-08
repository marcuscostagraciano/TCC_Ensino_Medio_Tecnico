<?php
    require("conexao.php")
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
<body>

   <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="index.php"><font size="6"> Escute seu Coração</font> </a>

      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="entrar.php">Login</a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="cadastro.php">Cadastro</a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php">Sair</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<br><br>
<center>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h2 class="display-5"><font color="white"> Login</h2></font>
                    <br>
                    
                    <?php if(isset($_SESSION['errMsg']))
                    {echo "<h5 style='color:white;'>".$_SESSION['errMsg']."</h5><br>";
                    unset($_SESSION['errMsg']);}
                    ?>

                    <?php
                    if(isset($_SESSION['nao_autenticado'])):
                    ?>

                    <div class="notification is-danger">
                      <p>ERRO: Usuário ou senha inválidos.</p>
                    </div>
                    
                    <?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                    ?>


                    <div class="box">
                        <form action="login.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <input name="usuario" name="text" class="input is-large" placeholder="Usuário" autofocus=""
                                    
                                    value="<?php if(isset($_SESSION['usuarioe']))
                                            {echo $_SESSION['usuarioe'];
                                            unset($_SESSION['usuarioe']);}?>">>
                                </div>
                            </div>
                            <br>

                            <div class="field">
                                <div class="control">
                                    <input name="senha" class="input is-large" type="password" placeholder="Senha" id="senha"
                                    
                                    value="<?php if(isset($_SESSION['senhae']))
                                            {echo $_SESSION['senhae'];
                                            unset($_SESSION['senhae']);}?>">>
                                </div>
                                <br>
                                <h9 style="color:white"><input type="checkbox" onclick="mostraSenha()"> Mostrar senha</h9>
                            </div>
                            <br>
                               <button type="submit"  class="btn btn-primary btn-lg">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </center>

   
	<!-- Footer -->
  <footer class="py-5 bg-black">
    <div class="container">
      <p class="m-0 text-center text-white small">Escute seu coração &copy; Criado em 2019</p>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/agency.min.js"></script>


  <script>
function mostraSenha() {
  var x = document.getElementById("senha");
  if (x.type === "password") 
  {x.type = "text";} 

  else
  {x.type = "password";}}
</script>
</body>

</html>