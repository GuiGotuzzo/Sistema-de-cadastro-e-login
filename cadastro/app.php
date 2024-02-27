<?php 
include '../database/connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $hash_senha = password_hash($senha, PASSWORD_DEFAULT);

    function capitalizarPalavra($palavra){
        //Primeira letra da palavra se torna maiúscula e o restante fica minúscula
        $palavra_capitalizada = ucwords(strtolower($palavra));

        return $palavra_capitalizada;
    }
    $nome = capitalizarPalavra($_POST["nome"]);
    $sobrenome = capitalizarPalavra($_POST["sobrenome"]);
    $data_nascimento = $_POST["data_nascimento"];

    $verificar_email = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($verificar_email);

    if($result->num_rows > 0){ //Verificando se o email digitado já foi registrado
        echo "Um usuário já foi registrado com este email !!";
    }else{ 
        $sql = "INSERT INTO user(email, senha, nome, sobrenome, data_nascimento) VALUES('$email', '$hash_senha', '$nome', '$sobrenome', '$data_nascimento')";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: ../login/index.php");
        } else {
            echo "Erro ao inserir dados: " . $conexao->error;
        }
    }
}else{
    //Se o formulário não for enviado,vai ser redireciodado para a página de formulário
    header("Location: index.php");
    exit();
}

?>