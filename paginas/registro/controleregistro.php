<?php
include_once ("conexao.php");

//obtendo os valores do formulário
$nome_funcionario = $_POST['nome_funcionario'];
$cpf_funcionario = $_POST['cpf_funcionario'];
$email_funcionario = $_POST['email_funcionario'];
$cargo_funcionario = $_POST['cargo_funcionario'];
$senha_funcionario = $_POST['senha_funcionario'];


//inserindo os valores no banco de dados
$sql = "INSERT INTO funcionario (nome_funcionario, cpf_funcionario, email_funcionario, cargo_funcionario, senha_funcionario) VALUES
                                ('$nome_funcionario', '$cpf_funcionario', '$email_funcionario', '$cargo_funcionario', '$senha_funcionario')";

if ($conn->query($sql) === TRUE) {
    echo "Dados inseridos com sucesso";
} else {
    echo "Erro ao inserir dados: " . $conn->error;
}

$conn->close();
?>
