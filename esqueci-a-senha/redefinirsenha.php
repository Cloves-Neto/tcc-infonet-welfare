<?php
    require '../conexao.php';

    $id = $_GET['id_funcionario'];
    $senha = $_GET['nova_senha'];

    // Consulta o banco de dados para obter o nome e a foto do funcionário com base no email
    $query = "UPDATE funcionario SET senha_funcionario='$senha' WHERE id_funcionario = '$id'";
    $stmt = $conexao->prepare($query);
    $stmt->execute();

    // Redireciona o usuário para a página de login ou trata o caso em que o usuário não está logado
    echo'<script>
        alert("Senha alaterada com sucesso!");
        setTimeout(()=>{
            window.location.href="http://localhost/welfare/index.php";
        }, 1000)
    </script>';
    
?>