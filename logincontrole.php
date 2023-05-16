<?php
include 'conexao.php';

// Recebe os dados do formulário
$email_funcionario = $_POST['email_funcionario'];
$senha_funcionario = $_POST['senha_funcionario'];

try {
    // Faz a validação no banco de dados
    $sql = "SELECT * FROM funcionario WHERE email_funcionario = :email_funcionario AND senha_funcionario = :senha_funcionario";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':email_funcionario', $email_funcionario);
    $stmt->bindParam(':senha_funcionario', $senha_funcionario);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        // Usuário autenticado com sucesso
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        session_start();
        $_SESSION['email_funcionario'] = $usuario['email_funcionario'];
        $_SESSION['senha_funcionario'] = $usuario['senha_funcionario'];

        if ($usuario['cargo_funcionario'] == '1') {
            header('Location: ./home/home-adm.php');
            exit;
        } elseif ($usuario['cargo_funcionario'] == '2') {
            header('Location: ../home/home.php');
            exit;
        } elseif ($usuario['cargo_funcionario'] == '3') {
            header('Location: ./home/home.php');
            exit;
        } else {
            echo "cadastro não encontrado";
        }
    } else {
        // Login inválido
        header('Location: index.php');
        exit;
    }
} catch (PDOException $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}
?>