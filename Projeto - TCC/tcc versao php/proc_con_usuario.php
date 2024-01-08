<?php
include("conexao.php");

try{
$stmt= $connect->prepare(
"SELECT id,nome,sobrenome,usuario,email,senha,created,modified,desct_tip_user
FROM usuarios,tipo_usuario 
WHERE tipo_usuario_tipo_user=tipo_user order by id asc");
$stmt->execute();

foreach ($stmt as $row){
    echo "<tr><td>".$row["id"]."</td><td>".$row["nome"].
    "<td>".$row["sobrenome"]."</td>"."<td>".$row["usuario"]."</td>".
    "<td>".$row["email"]."</td>"."<td>".$row["senha"]."</td>".
    "<td>".$row["created"]."</td><td>".$row["modified"]."</td>".
    "<td>".$row["desct_tip_user"]."</td></tr>";
}}

catch(PDOException $e) {
$_SESSION['msg']= $e->getMessage();
header('Location: consulta_musica.php');
exit;
}