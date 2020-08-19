<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "registar";
$conexao = mysqli_connect($hostname,$username,$password,$database);

if(!$conexao){
    print "Falha na conexao com a Base de Dados";
}

?>