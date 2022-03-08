<?php
/**
 * @file apuracao.php
 *
 * Responsável por apurar os votos e retornar o total de votos recebidos
 * por cada candidato.
 *
 * PHP versão 7.4.3
 *
 * LICENSE: Esse arquivo está submetido à versão 3.01 da licença do PHP
 * essa licença está disponível na world-wide-web atráves do seguinte
 * endereço: https://www.php.net/license/3_01.txt
 * Caso você não tenha uma cópia da licença PHP e não seja possível
 * acessá-la através da internet, por favor relate o seu problema para
 * licence@php.net a fim de que seja possível recebê-la por email.
 *
 *
 * @author     Carla Moreno e Rebeca Fonseca
 * @since      07/03/2022
 * @copyright  2001-2022 The PHP Group
 * @license    https://www.php.net/license/3_01.txt PHP License 3.01
 * @version    1.0
 * @link       https://github.com/rebecabmfonseca/urna-eletronica
 * @deprecated Not aplicable
 */

include("conexao.php");

if (isset($_GET['reset'])) {
    $reset = $_GET['reset'];
    if ($reset) {
        $result = $conn->query("update candidatos set voto = 0;");
        echo "Eleições reiniciadas com sucesso!";
        $host = 'http://' . $_SERVER['SERVER_NAME'];
        header("Location: " . $host . "/urna-eletronica");
        die();
    }
} else {

    $result = $conn->query("SELECT * FROM candidatos where sou_vice=false and tipo=1 order by voto desc");

    // Caso o candidato tenha recebido algum voto, é retornado em tela seu
    // nome, número, partido e quantidade de votos. Caso não existam
    //candidatos com votos, é retornado a mensagem "Sem candidatos"
    if ($result->num_rows > 0) {
        echo "<table> <tr> <td>Vereador</td> <td>Número</td> <td>Partido</td> <td>Votos</td></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr> <td> " . $row["nome"] . "</td> <td> " . $row["numero"] . " </td> <td>" . $row["partido"] . "</td><td> " . $row["voto"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Sem candidatos Vereadores";
    }

    echo "<br><br>";

    $result = $conn->query("SELECT * FROM candidatos where sou_vice=false and tipo=2 order by voto desc");

    if ($result->num_rows > 0) {
        echo "<table> <tr> <td>Prefeito</td> <td>Número</td> <td>Partido</td> <td>Votos</td></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr> <td> " . $row["nome"] . "</td> <td> " . $row["numero"] . " </td> <td>" . $row["partido"] . "</td><td> " . $row["voto"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Sem candidatos Prefeitos";
    }

    echo "<br><br>";

    $result = $conn->query("SELECT * FROM candidatos where numero='branco' or numero='nulo' order by voto desc");
    if ($result->num_rows > 0) {
        echo "<table> <tr> <td>Votos inválidos</td>  <td>Votos</td></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr> <td> " . $row["nome"] . "</td> <td> " . $row["voto"] . "</td></tr>";
        }
        echo "</table>";
    }
    echo "<br><br>";
    $host = 'http://' . $_SERVER['SERVER_NAME'];
    echo "<a href='" . $host . "/urna-eletronica/php/apuracao.php?reset=true'> Encerrar as eleições.</a>";
}
mysqli_close($conn);
