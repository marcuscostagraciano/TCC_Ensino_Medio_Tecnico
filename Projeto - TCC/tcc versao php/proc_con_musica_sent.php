<?php
include_once("conexao.php");
$sent=$_GET['sent'];

if(empty($sent))
{$sent="%";

try{
$stmt= $connect->prepare(
"SELECT nome_musica,artista,album,duracao,GROUP_CONCAT(DISTINCT nome_sentimento SEPARATOR ', ') AS nome_sentimento,
link_original FROM musicas,musicas_sentimentos,sentimentos
WHERE id_musicas=musicas_id_musicas and sentimentos_id_sentimento=id_sentimento and nome_sentimento like('$sent')");
$stmt->execute(array(':sentimento' => $sent));

foreach ($stmt as $row){
echo "<tr><td>".$row["nome_musica"]."</td><td>".$row["artista"].
"<td>".$row["album"]."</td>"."<td>".$row["duracao"]."</td>".
"<td>".$row["nome_sentimento"]."</td>"."<td><a href='".$row["link_original"]."'>".$row["link_original"]."</td></tr>";
}}

catch(PDOException $e) {
$_SESSION['msg']= $e->getMessage();}
exit;}

$sent= "$sent%";

try{
$stmt= $connect->prepare(
"SELECT nome_musica,artista,album,duracao,nome_sentimento,
link_original FROM musicas,musicas_sentimentos,sentimentos
WHERE id_musicas=musicas_id_musicas and sentimentos_id_sentimento=id_sentimento and nome_sentimento like('$sent')");
$stmt->execute(array(':sentimento' => $sent));

foreach ($stmt as $row){
echo "<tr><td>".$row["nome_musica"]."</td><td>".$row["artista"].
"<td>".$row["album"]."</td>"."<td>".$row["duracao"]."</td>".
"<td>".$row["nome_sentimento"]."</td>"."<td><a href='".$row["link_original"]."'>".$row["link_original"]."</td></tr>";
}}

catch(PDOException $e) {
$_SESSION['msg']= $e->getMessage();}