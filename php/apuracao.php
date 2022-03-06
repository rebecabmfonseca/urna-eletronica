<?php
include("conexao.php");

$result = $conn->query("SELECT * FROM candidatos order by voto desc");

if($result->num_rows > 0){
    echo "<table> <tr> <td>Nome</td> <td>Número</td> <td>Partido</td> <td>Votos</td></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr> <td> " . $row["nome"]. "</td> <td> ".$row["numero"]." </td> <td>" . $row["partido"]. "</td><td> " . $row["voto"]. "</td></tr>";
    }
    echo "</table>";
}else{
    echo "Sem candidatos";
}


?>