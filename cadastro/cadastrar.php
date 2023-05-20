<?php
require_once '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome_paciente = isset($_POST["nome_paciente"]) ? $_POST["nome_paciente"] : "";
    $dt_nascimento_paciente = isset($_POST["dt_nascimento_paciente"]) ? $_POST["dt_nascimento_paciente"] : "";
    $cpf_paciente = isset($_POST["cpf_paciente"]) ? $_POST["cpf_paciente"] : "";
    $rg_paciente = isset($_POST["rg_paciente"]) ? $_POST["rg_paciente"] : "";
    $sexo_paciente = isset($_POST["sexo_paciente"]) ? $_POST["sexo_paciente"] : "";
    $contato_paciente = isset($_POST["contato_paciente"]) ? $_POST["contato_paciente"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $nome_responsavel = isset($_POST["nome_responsavel"]) ? $_POST["nome_responsavel"] : "";
    $dt_nascimento_responsavel = isset($_POST["dt_nascimento_responsavel"]) ? $_POST["dt_nascimento_responsavel"] : "";
    $cpf_responsavel = isset($_POST["cpf_responsavel"]) ? $_POST["cpf_responsavel"] : "";
    $rg_responsavel = isset($_POST["rg_responsavel"]) ? $_POST["rg_responsavel"] : "";
    $sexo_responsavel = isset($_POST["sexo_responsavel"]) ? $_POST["sexo_responsavel"] : "";
    $uf = isset($_POST["uf"]) ? $_POST["uf"] : "";
    $logadouro = isset($_POST["logadouro"]) ? $_POST["logadouro"] : "";
    $cep_paciente = isset($_POST["cep_paciente"]) ? $_POST["cep_paciente"] : "";
    $numero_casa_paciente = isset($_POST["numero_casa_paciente"]) ? $_POST["numero_casa_paciente"] : "";

try {
    $Comando = $conexao->prepare("INSERT INTO paciente (nome_paciente, dt_nascimento_paciente, cpf_paciente, rg_paciente, sexo_paciente, contato_paciente, email,
    nome_responsavel, dt_nascimento_responsavel, cpf_responsavel, rg_responsavel, sexo_responsavel, uf, logadouro, cep_paciente, numero_casa_paciente)
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
    $Comando->bindParam(14, $logadouro);
    $Comando->bindParam(15, $cep_paciente);
    $Comando->bindParam(16, $numero_casa_paciente);

    if ($Comando->execute()) {
        $RetornoJSON = "Cadastro feito com sucesso!";
    } else {
        $RetornoJSON = "Erro ao tentar efetivar cadastro";
    }
}
catch (PDOException $erro)
{
    $RetornoJSON = "Erro:" . $erro->getMessage();
}

echo $RetornoJSON;
}
?>