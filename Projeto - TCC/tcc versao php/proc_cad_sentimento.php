<?php
	require 'conexao.php';

if(isset($_POST['register'])) {
	$errMsg = '';

$cod_sent= $_POST['cod_sentimento'];
$nome_sent= $_POST['nome_sentimento'];

# Se o campo "Código do sentimento" estiver vazio, o sistema deve providenciar o código automáticamente
if($cod_sent==null or $cod_sent==0)
{try{
	$stmt = $connect->prepare('INSERT INTO sentimentos (nome_sentimento) VALUES (:nome_sentimento)');
	$stmt->execute(array(
		':nome_sentimento' => $nome_sent));

		$_SESSION['msg']= "Cadastro de sentimento realizado com sucesso";
	header('Location: cad_sentimento.php');
	exit;}

	catch(PDOException $e) {
		$_SESSION['msg']= $e->getMessage();
	
	$_SESSION['nsent']= $nome_sent;
	header('Location: cad_sentimento.php');
	exit;
	}}

# Se não estiver, o sistema deve cadastrar o sentimento com o código concedido
else{try{
	$stmt = $connect->prepare('INSERT INTO sentimentos (id_sentimento,nome_sentimento) VALUES (:cod_sentimento,:nome_sentimento)');
	$stmt->execute(array(
		':cod_sentimento' => $cod_sent,
		':nome_sentimento' => $nome_sent));

		$_SESSION['msg']= "Cadastro de sentimento realizado com sucesso";
	header('Location: cad_sentimento.php');
	exit;}

	catch(PDOException $e) {
		$_SESSION['msg']= $e->getMessage();
		
	$_SESSION['csent']= $cod_sent;
	$_SESSION['nsent']= $nome_sent;
	header('Location: cad_sentimento.php');
	exit;
	}}
}