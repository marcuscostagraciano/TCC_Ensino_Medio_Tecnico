<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<title>Escute seu coração</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="#">Escute seu coração - ADM</a>

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNav">
<ul class="navbar-nav">
<a class="navbar-brand" href="logado.php">Usuário comum</a>
<li class="nav-item active">
<a class="nav-link" href="logout.php"><font color="red">SAIR</font> <span class="sr-only">(current)</span></a>
</li>

</ul>
</div>
</nav><br>


<div class="container">
<div class="row">
<div class="col">
<!-- Cadastrar -->
<h1>Cadastrar:</h1></div><br>
<div class="w-100"></div>
<div class="col"> <a href="cad_sentimento.php"> Sentimentos </a><br></div>
<div class="container">
<div class="row">
<div class="col">  <a href="cad_musica.php"> Músicas </a><br>
<div class="row">
<div class="col">  <a href="cad_mustosent.php"> Ligar música - sentimento </a>
<br><br>

<!-- Consultar -->
<h1>Consultar:</h1></div><br>
<div class="w-100"></div>
<div class="col"> <a href="consulta_sentimento.php"> Sentimentos </a><br></div>
<div class="container">
<div class="row">
<div class="col"><a href="consulta_musica.php"> Músicas </a><br>
<a href="consulta_usuario.php"> Usuários </a><br>
<a href="consulta_musicasentimento.php"> Ligação música - sentimento </a>
<br><br>

<!-- Excluir -->
<h1>Excluir:</h1></div><br>
<div class="w-100"></div>
<div class="col"> <a href="exclui_sentimento.php"> Sentimentos </a><br></div>
<div class="container">
<div class="row">
<div class="col">  <a href="exclui_musica.php"> Músicas </a><br>
<a href="exclui_usuario.php"> Usuários </a>

<br><br><br>
<footer><center>Copyright © Escute seu Coração 2021 Política de Privacidade Termos de Uso</center></footer>
<footer class="py-5 bg-black">
<div class="container">
<p class="m-0 text-center text-white small">Abrindo portas &copy; Criado em 2019</p>
</div></footer>
</body></html>