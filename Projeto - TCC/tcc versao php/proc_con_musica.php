<?php
include("conexao.php");

try{
$stmt= $connect->prepare(
"SELECT id_musicas,nome_musica,artista,album,duracao,link_original,vezes_reproduzida FROM musicas");
$stmt->execute();

foreach ($stmt as $row){
    echo "<tr><td>".$row["id_musicas"]."</td><td>".$row["nome_musica"].
    "<td>".$row["artista"]."</td>"."<td>".$row["album"]."</td>".
    "<td>".$row["duracao"]."</td>"."<td><a href='".$row["link_original"]."'>".$row["link_original"]."</td>".
    "<td>".$row["vezes_reproduzida"]."</td></tr>";
}}

catch(PDOException $e) {
$_SESSION['msg']= $e->getMessage();
header('Location: consulta_musica.php');
exit;
}