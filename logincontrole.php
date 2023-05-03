
<?php

include_once ("conexao.php");
// Recebe os dados do formulário
$email_funcionario = $_POST['email_funcionario'];
$senha_funcionario = $_POST['senha_funcionario'];

// Conecta ao banco de dados
$conexao = new PDO("mysql:host=localhost; dbname=$Bco", "$Usuario", "$Senha"); 

// Faz a validação no banco de dados
$sql = "SELECT id_funcionario, nome_funcionario, email_funcionario FROM funcionario WHERE email_funcionario = '$email_funcionario' AND senha_funcionario = '$senha_funcionario'";
$resultado = $conexao->query($sql);

if ($resultado->num_rows == 1) {
    // Usuário autenticado com sucesso
    $usuario = $resultado->fetch_assoc();
    session_start();
    $_SESSION['usuario_id'] = $usuario['id_funcionario'];
    $_SESSION['usuario_nome'] = $usuario['nome_funcionario'];
    $_SESSION['usuario_email'] = $usuario['email_funcionario'];
    header('Location: ./home/red.php');
} else {
    // Login inválido
    header('Location:  ./home/red.html');
    exit;
}