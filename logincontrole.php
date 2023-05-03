<?php

include_once ("../welfare1.1/conexao.php");

$email_funcionario = $_POST["email_funcionario"];
$senha_funcionario = $_POST["senha_funcionario"];

$sql = "SELECT id_funcionario, email_funcionario, senha_funcionario FROM funcionario WHERE email_funcionario = '$email_funcionario' AND senha_funcionario = '$senha_funcionario'";
$resultado = $conn->query($sql);

if ($resultado->num_rows == 1) {
    // Usuário autenticado com sucesso
    $usuario = $resultado->fetch_assoc();
    session_start();
    $_SESSION['id_funcionario'] = $usuario['id_funcionario'];
    $_SESSION['email_funcionario'] = $usuario['email_funcionario'];
    $_SESSION['senha_funcionario'] = $usuario['senha_funcionario'];
    header('Location: ./home/red.html');    
} else {
    echo "login invalido";
}


