<?php 

$host = "127.0.0.1";
$username = "root";
$password = "";
$database = "account";

//Criando a conexão
$conn = new mysqli($host, $username, $password, $database);

if($conn->connect_error){
    die("A conexão falhou: " . $conn->connect_error);
}

?>
