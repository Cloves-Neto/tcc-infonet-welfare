<?php

include '../a/conexao.php';
$conexao = new PDO("mysql:host=localhost; dbname=$Bco", "$Usuario", "$Senha"); 

session_start();

// Consulta SQL
$sql = "SELECT funcionario FROM nome_funcionario WHERE nome_funcionario = '$id'";

// Executa a consulta
$resultado = mysqli_query($conexao, $sql);

// Verifica se há resultados e exibe o nome do usuário
if (mysqli_num_rows($resultado) > 0) {
    $row = mysqli_fetch_assoc($resultado);
    echo "Bem-vindo, " . $row["nome_funcionario"] . "!";
} else {
    echo "Usuário não encontrado.";
}

// Fecha a conexão
mysqli_close($conexao);
?>
