<?php
include_once '../conexao.php';
session_start(); // Inicia a sessão

// Verifica se o usuário está logado
if(isset($_SESSION['email_funcionario'])) {
    // Limpa todas as variáveis de sessão
    $_SESSION = array();

    // Destroi a sessão
    session_destroy();
}

// Redireciona o usuário para a página de login (ou qualquer outra página)
header("Location: ../index.php");
exit();
?>
