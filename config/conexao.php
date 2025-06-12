<?php
$servername = "localhost";
$username = "root";  // usuário padrão do XAMPP
$password = "";      // senha em branco no XAMPP
$database = "aerostore";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
