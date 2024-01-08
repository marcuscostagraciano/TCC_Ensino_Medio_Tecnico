<?php
include("conexao.php");

try{
$stmt= $connect->prepare("SELECT * FROM sentimentos");
$stmt->execute();

foreach ($stmt as $row){
    echo "<tr><td>".$row["id_sentimento"]."</td>   <td>".$row["nome_sentimento"]."</td></tr>";
}}

catch(PDOException $e) {
$_SESSION['msg']= $e->getMessage();
header('Location: consulta_sentimento.php');
exit;
}