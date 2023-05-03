
<?php
session_start(); // Inicia a sessão

if(isset($_SESSION['logged_in'])) { // Verifica se o usuário já está logado
    header('Location: home/red.html'); // Redireciona para a página de home
    exit;
}

if(isset($_POST['login'])) { // Verifica se o formulário de login foi submetido
    $email = $_POST['email_funcionario'];
    $password = $_POST['senha_funcionario'];

    // Verifica se o email e senha estão corretos
    $sql = "SELECT email_funcionario, senha_funcionario FROM funcionario WHERE email_funcionario = '$email_funcionario' AND senha_funcionario = '$senha_funcionario'";
    $resultado = $conexao->query($sql);
    
    if ($email_funcionario == 'email_funcionario' && $senha_funcionario == 'senha_funcionario') {
        $_SESSION['logged_in'] = true; // Marca o usuário como logado
        header('Location: home/red.html'); // Redireciona para a página de home
        exit;
    } else {
        $error = 'Email ou senha incorretos'; // Mensagem de erro para exibir no formulário
    }
}
?>



