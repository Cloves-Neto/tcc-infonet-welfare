<?php

include_once ("conexao.php");

// inicia sessão
session_start();

// Recebe os dados do formulário
 $_SESSION['email_funcionario'] = $_POST['email_funcionario'];
$senha_funcionario = $_POST['senha_funcionario'];

// Faz a validação no banco de dados
$sql = "SELECT id_funcionario, nome_funcionario, email_funcionario FROM funcionario WHERE email_funcionario = '$email_funcionario' AND senha_funcionario = '$senha_funcionario'";
$resultado = $conn->query($sql);

if ($resultado->num_rows == 1) {
    // Usuário autenticado com sucesso
    header('Location: paginas/home/home.php');
    
} else {
    // Login inválido
    echo'
    <script>
        alert("Usuario ou senha inválido, verifique os dados e tente novamente!");
        window.setTimeout( window.location.href="index.php", 5000)
    </script>';
    // header('Location: index.php');
    exit;
}

