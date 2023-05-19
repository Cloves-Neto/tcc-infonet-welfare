<?php
require_once '../conexao.php';

$nome_paciente = $_POST["nome_paciente"];
$dt_nascimento_paciente = $_POST["dt_nascimento_paciente"];
$cpf_paciente = $_POST["cpf_paciente"];
$rg_paciente = $_POST["rg_paciente"];
$sexo_paciente = $_POST["sexo_paciente"];
$contato_paciente = $_POST["contato_paciente"];
$email = $_POST["email"];
$nome_responsavel = $_POST["nome_responsavel"];
$dt_nascimento_responsavel = $_POST["dt_nascimento_responsavel"];
$cpf_responsavel = $_POST["cpf_responsavel"];
$rg_responsavel = $_POST["rg_responsavel"];
$sexo_responsavel = $_POST["sexo_responsavel"];
$uf = $_POST["uf"];
$logradouro = $_POST["logradouro"];
$cep_paciente = $_POST["cep_paciente"];
$numero_casa_paciente = $_POST["numero_casa_paciente"];


    $Comando = $conexao->prepare("INSERT INTO paciente (nome_paciente, dt_nascimento_paciente, cpf_paciente, rg_paciente, sexo_paciente, contato_paciente, email,
    nome_responsavel, dt_nascimento_responsavel, cpf_responsavel, rg_responsavel, sexo_responsavel, uf, logradouro, cep_paciente, numero_casa_paciente)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $Comando->bindParam(1, $nome_paciente);
    $Comando->bindParam(2, $dt_nascimento_paciente);
    $Comando->bindParam(3, $cpf_paciente);
    $Comando->bindParam(4, $rg_paciente);
    $Comando->bindParam(5, $sexo_paciente);
    $Comando->bindParam(6, $contato_paciente);
    $Comando->bindParam(7, $email);
    $Comando->bindParam(8, $nome_responsavel);
    $Comando->bindParam(9, $dt_nascimento_responsavel);
    $Comando->bindParam(10, $cpf_responsavel);
    $Comando->bindParam(11, $rg_responsavel);
    $Comando->bindParam(12, $sexo_responsavel);
    $Comando->bindParam(13, $uf);
    $Comando->bindParam(14, $logradouro);
    $Comando->bindParam(15, $cep_paciente);
    $Comando->bindParam(16, $numero_casa_paciente);

    if ($Comando->execute()) {
        $RetornoJSON = "Cadastro feito com sucesso!";
    } else {
        $RetornoJSON = "Erro ao tentar efetivar cadastro";
    }


?>