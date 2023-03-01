<?php
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "onbook";

// Criar conexão
$conn = mysqli_connect($localhost, $username, $password, $dbname);

// Verificar conexão
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}
?>