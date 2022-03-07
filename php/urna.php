<?php
/**
 * @urna.php
 *
 * O código a seguir é responsável por guardar cada voto no banco de
 * dados.
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

header('Content-Type: application/json; charset=utf-8');

// Recebe o número do candidato votado e incrementa em uma unidade o
// número total de votos recebidos por esse candidato no banco
if(isset( $_GET['numero'])){
    $numeroVotado = $_GET['numero'];
    $sql = "update candidatos set voto = voto + 1 where numero='".$numeroVotado."'";
    echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "\ntrue";
  } else {
    echo "\nerror: " . $conn->error;
  }

}

mysqli_close($conn);
?>
