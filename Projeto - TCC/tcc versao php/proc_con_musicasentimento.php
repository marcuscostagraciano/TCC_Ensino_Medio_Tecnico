<?php
include("conexao.php");

try{
$stmt= $connect->prepare(
"SELECT id_musicas,nome_musica,GROUP_CONCAT(DISTINCT id_sentimento SEPARATOR ', ') AS id_sentimento,
GROUP_CONCAT(DISTINCT nome_sentimento SEPARATOR ', ') AS nome_sentimento FROM musicas,musicas_sentimentos,sentimentos
WHERE id_sentimento=sentimentos_id_sentimento  and id_musicas=musicas_id_musicas ");
$stmt->execute();

foreach ($stmt as $row){
    if(empty($row["id_musicas"])){
        echo "<tr><td style='text-align:center' colspan='4'>Não há ligação entre músicas e sentimentos</td></tr>";}
    
    else{
    echo "<tr><td>".$row["id_musicas"]."</td><td>".$row["nome_musica"].
    "<td>".$row["id_sentimento"]."</td><td>".$row["nome_sentimento"]."</td></tr>";}
}}

catch(PDOException $e) {
$_SESSION['msg']= $e->getMessage();
header('Location: consulta_musicasentimento.php');
exit;
}