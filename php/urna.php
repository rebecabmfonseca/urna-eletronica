<?php
include("conexao.php");

header('Content-Type: application/json; charset=utf-8');

if(isset( $_GET['numero'])){
    $numeroVotado = $_GET['numero'];
    $sql = "update candidatos set voto = voto + 1 where numero=".$numeroVotado;
    echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "\ntrue";
  } else {
    echo "\nerror: " . $conn->error;
  }

}
?>