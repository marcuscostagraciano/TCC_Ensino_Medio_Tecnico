<?php
include "conexao.php";

$id_musica= $_POST['musicas'];
$id_sentimento= $_POST['sentimentos'];

try{
$stmt = $connect->prepare('INSERT INTO musicas_sentimentos (musicas_id_musicas,sentimentos_id_sentimento) VALUES(:id_musica,:id_sentimento)');
$stmt->execute(array(
        ':id_musica' => $id_musica,
        ':id_sentimento' => $id_sentimento
    ));

$_SESSION['msg']= "Ligação de música ao sentimento feito com sucesso";
header('Location: cad_mustosent.php');
exit;}

catch(PDOException $e) {
$_SESSION['msg']= $e->getMessage();

header('Location: cad_mustosent.php');
exit;
}