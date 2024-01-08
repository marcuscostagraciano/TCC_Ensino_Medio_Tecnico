<?php
include("conexao.php");

$id_sentimento= $_POST['sentimentos'];

try{
$stmt = $connect->prepare('DELETE FROM sentimentos WHERE id_sentimento=:id_sentimento');
$stmt->execute(array(
    ':id_sentimento' => $id_sentimento
));

$_SESSION['msg']= "Exclusão de sentimento realizada com sucesso";
header('Location: exclui_sentimento.php');
exit;}

catch(PDOException $e) {
$_SESSION['msg']= $e->getMessage();
header('Location: exclui_sentimento.php');
exit;
}