<?php
include_once('./conexao.php');

if(isset($_POST['update'])){

    $nome_funcionario = $_POST['nome_funcionario'];
    $cpf_funcionario = $_POST['cpf_funcionario'];
    $email_funcionario = $_POST['email_funcionario'];
    $cargo_funcionario = $_POST['cargo_funcionario'];
    $senha_funcionario = $_POST['senha_funcionario'];

    $sqlUpdate = "UPDATE paciente SET  "
}



?>