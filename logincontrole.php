
<?php

include_once("conexao.php");

// Recebe os dados do formulário
$email_funcionario = $_POST['email_funcionario'];
$senha_funcionario = $_POST['senha_funcionario'];

<<<<<<< Updated upstream
=======
// Conecta ao banco de dados
// $conexao = new PDO("mysql:host=localhost; dbname=$Bco", "$Usuario", "$Senha"); 
>>>>>>> Stashed changes

try {

<<<<<<< Updated upstream
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
=======
if ($resultado->num_rows == 1) {
    // Usuário autenticado com sucesso
    $usuario = $resultado->fetch_assoc();
    session_start();
    $_SESSION['email_funcionario'] = $usuario['email_funcionario'];
    $_SESSION['senha_funcionario'] = $usuario['senha_funcionario'];
    header('Location: ./home/red.php');
} else {
    // Login inválido
    echo'<script>
    alert ("Login invalido verifique suas credenciais")
    </script>';
    header('Location: index.php');
    exit;
}
>>>>>>> Stashed changes
