<?php
include("conexao.php");

$id_usuario= $_POST['usuarios'];

try{
$stmt = $connect->prepare('DELETE FROM usuarios WHERE id=:id_usuario');
$stmt->execute(array(
    ':id_usuario' => $id_usuario
));

$_SESSION['msg']= "Exclusão de usuário realizada com sucesso";
header('Location: exclui_usuario.php');
exit;}

catch(PDOException $e) {
$_SESSION['msg']= $e->getMessage();
header('Location: exclui_usuario.php');
exit;
}