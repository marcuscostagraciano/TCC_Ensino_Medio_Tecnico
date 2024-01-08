<?php
session_start();
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
  <nav class="navbar navbar-expand navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="index.php"><font size="6"> Escute seu Coração</font> </a>

      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>


      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="entrar.php">login</a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="cadastro.php">Cadastro</a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php">sair</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  


<br><br><br><br><br><br><br>
 <center><h2><font color="white"> Cadastro</font></h2></center>


<?php
    if(isset($_SESSION['msg'])){
      echo $_SESSION['msg'];
      unset($_SESSION['msg']);
    }
    ?>
    
    <center>

    <form method="POST" action="proc_cad_usuario.php">
  <div class="form-row justify-content-center">
    <div class="col-md-3 mb-3">

      <label for="validationDefault01"></label>
      <input type="text" name="nome" class="form-control" id="validationDefault01" placeholder="Nome" value="<?php if(isset($_POST['nome'])) echo $_POST['nome'] ?>"required>
    </div>

    <div class="col-md-3 mb-3">
      <label for="validationDefault02"></label>
      <input type="text" name="sobrenome" class="form-control" id="validationDefault02" placeholder="Sobrenome" value="<?php if(isset($_POST['sobrenome'])) echo $_POST['sobrenome'] ?>" required>
    </div>
    <br>
    <div class="col-md-3 mb-3">
      <label for="validationDefaultUsername"></label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend2">@</span>
        </div>
        <input type="text" name="usuario" class="form-control" id="validationDefaultUsername" placeholder="usuario"
         value="<?php if(isset($_POST['usuario'])) echo $_POST['usuario'] ?>" aria-describedby="inputGroupPrepend2" required>
      </div>
    </div>
  </div>

  <div class="form-row justify-content-center">
    <div class="col-md-3 mb-3">
      <label for="validationDefault03"></label>
      <input type="email" name="email" class="form-control" id="validationDefault03" placeholder="E-mail" value="<?php if(isset($_POST['email'])) 
      echo $_POST['email'] ?>" required>
    </div>
    
    <div class="col-md-3 mb-3">
      <label for="validationDefault04"></label>
      <input type="password" name="senha" class="form-control" id="validationDefault04" placeholder="Senha" value="<?php if(isset($_POST['senha'])) 
      echo $_POST['senha'] ?>" required>
  </div>
</div>
</div>
</div>
<h9 style="color:white"><input type="checkbox" onclick="mostraSenha()"> Mostrar senha</h9>
   <br><br>
  <button class="btn btn-primary" name= 'register'  type="submit">Cadastrar-se</button>
</form>

<br><br><br><br><br>
 
  <!-- Footer -->
  <footer class="py-5 bg-black">
    <div class="container">
      <p class="m-0 text-center text-white small">Escute seu coração &copy; Criado em 2019</p>
    </div>
  </footer>
	  
<script>
function mostraSenha() {
var x = document.getElementById("validationDefault04");
if (x.type === "password") 
{x.type = "text";} 

else
{x.type = "password";}}
</script>
</body>
</html>