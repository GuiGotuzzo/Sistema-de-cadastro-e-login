<?php 
include '../database/connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();

        if(password_verify($senha, $row['senha'])){
            echo "login realizado!";
        }else{
            echo "Senha incorreta!";
        }
    }else{
        echo "Usuario inexistente!";
    }
}
?>