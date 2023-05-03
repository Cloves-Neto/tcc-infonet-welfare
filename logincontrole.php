
<?php

include_once("conexao.php");

// Recebe os dados do formulário
$email_funcionario = $_POST['email_funcionario'];
$senha_funcionario = $_POST['senha_funcionario'];


try {

    // Faz a validação no banco de dados
    $sql = "SELECT * FROM funcionario WHERE email_funcionario = '$email_funcionario' AND senha_funcionario = '$senha_funcionario'";
    $resultado = $conexao->query($sql);

    if ($resultado->rowCount() == 1) {
        // Usuário autenticado com sucesso
        $usuario = $resultado->fetch(PDO::FETCH_ASSOC);
        session_start();
        $_SESSION['email_funcionario'] = $usuario['email_funcionario'];
        $_SESSION['senha_funcionario'] = $usuario['senha_funcionario'];
        header('Location: ./home/red.html');
    } else {
        // Login inválido
        header('Location: index.php');
        exit;
    }
} catch (PDOException $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}


function verificarLogin() {
    // Inicia a sessão
    session_start();

    // Verifica se a sessão está definida e se o usuário está logado
    if (!isset($_SESSION['email_funcionario']) || !isset($_SESSION['senha_funcionario'])) {
        // Se não estiver logado, redireciona para a página de login
        header('Location: index.php');
        exit;
    }
}
