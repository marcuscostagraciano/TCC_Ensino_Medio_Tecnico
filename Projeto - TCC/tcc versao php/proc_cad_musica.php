<?php
	require 'conexao.php';
	
if(isset($_POST['register'])){
	$errMsg = '';

$cod_musica= $_POST['cod_musica'];
$nome_musica= $_POST['nome_musica'];
$nome_artista= $_POST['artista'];
$nome_album= $_POST['album'];
$duracao_musica= $_POST['duracao'];
$link_original= $_POST['link'];

# Se o campo "Código do música" estiver vazio, o sistema deve providenciar o código automáticamente
if($cod_musica==null or $cod_musica==0)
{try{
	$stmt = $connect->prepare('INSERT INTO musicas (nome_musica,artista,album,duracao,link_original) 
	VALUES (:nome_musica,:artista,:album,:duracao,:link_original)');
	$stmt->execute(array(
		':nome_musica' => $nome_musica,
		':artista' => $nome_artista,
		':album' => $nome_album,
		':duracao' => $duracao_musica,
		':link_original' => $link_original
	));

		$_SESSION['msg']="Cadastro de música realizado com sucesso";
	header('Location: cad_musica.php');
	exit;}

	catch(PDOException $e) {
		$_SESSION['msg']= $e->getMessage();
	header('Location: cad_musica.php');
	exit;
	}}

# Se não estiver, o sistema deve cadastrar o música com o código concedido
else {try{
	$stmt = $connect->prepare('INSERT INTO musicas (id_musicas,nome_musica,artista,album,duracao,link_original) 
	VALUES (:cod_musicas,:nome_musica,:artista,:album,:duracao,:link_original)');
	$stmt->execute(array(
		':cod_musicas' => $cod_musica,
		':nome_musica' => $nome_musica,
		':artista' => $nome_artista,
		':album' => $nome_album,
		':duracao' => $duracao_musica,
		':link_original' => $link_original
	));

		$_SESSION['msg']="Cadastro de música realizado com sucesso";
	header('Location: cad_musica.php');
	exit;}

	catch(PDOException $e) {
		$_SESSION['msg']= $e->getMessage();

	$_SESSION['cmusic']= $cod_musica;
	$_SESSION['nmusic']= $nome_musica;
	$_SESSION['nartis']= $nome_artista;
	$_SESSION['nalbum']= $nome_album;
	$_SESSION['duracao']= $duracao_musica;
	$_SESSION['link']= $link_original;
	header('Location: cad_musica.php');
	exit;
	}
}
}