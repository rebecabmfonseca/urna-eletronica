<?php

$servername = "localhost";
$username = "root";
$password = "MinhaNovaSenha123@";
$banco = "testando";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$conn->query("use ".$banco);
//echo "Connected successfully\n";



?>