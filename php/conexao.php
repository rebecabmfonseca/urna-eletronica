<?php
/**
 * @file conexao.php
 *
 * Responsável por estabelecer a conexão com o servidor.
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

// Variáveis
$servername = "localhost";
$username = "root";
$password = "MinhaNovaSenha123@";
$banco = "testando";

// Cria a conexão
$conn = new mysqli($servername, $username, $password);

// Checa a conexão
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$conn->query("use ".$banco);
//echo "Connected successfully\n";



?>
