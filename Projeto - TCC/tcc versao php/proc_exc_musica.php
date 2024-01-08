<?php
include("conexao.php");

$id_musicas= $_POST['musica'];

try{
    $stmt = $connect->prepare('DELETE FROM musicas WHERE id_musicas=:id_musicas');
    $stmt->execute(array(
        ':id_musicas' => $id_musicas
    ));
    
    $_SESSION['msg']= "Exclusão de musica realizada com sucesso";
    header('Location: exclui_musica.php');
    exit;}
    
    catch(PDOException $e) {
    $_SESSION['msg']= $e->getMessage();
    header('Location: exclui_musica.php');
    exit;
    }