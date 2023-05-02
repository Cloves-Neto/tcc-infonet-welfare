<?php

include_once ("../welfare1.1/conexao.php");

  // Verifica se o formulário de login foi enviado
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email_funcionario = $_POST['email_funcionario'];
    $senha_funcionario = $_POST['senha_funcionario'];
  
    // Conecta ao banco de dados
    $pdo = new PDO('mysql:host=localhost;dbname=sistema_welfare', 'root', '');
  
    // Prepara uma consulta para verificar se o nome de usuário e senha estão corretos
    $stmt = $pdo->prepare('SELECT * FROM funcionario WHERE email_funcionario = ?');
    $stmt->execute([$email_funcionario]);
    $email_funcionario = $stmt->fetch();
  
    // Verifica se o nome de usuário e senha estão corretos
    if ($email_funcionario && password_verify($senha_funcionario, $email_funcionario['senha_funcionario'])) {
        // Se estiverem corretos, inicia uma sessão e redireciona o usuário para a página inicial
      $_SESSION['email_funcionario'] = $email_funcionario;
        echo "logado";
      exit;
    } else {
      // Se estiverem incorretos, exibe uma mensagem de erro
      $error = 'Nome de usuário ou senha incorretos';
    }
  }
  ?>
  
