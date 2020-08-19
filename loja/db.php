<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "registar";

// Crear a conexao
$con = mysqli_connect($servername, $username, $password,$db);

// Sair da conexao
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>