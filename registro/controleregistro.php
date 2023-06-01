<?php
require_once '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome_funcionario = isset($_POST["nome_funcionario"]) ? $_POST["nome_funcionario"] : "";
    $email_funcionario = isset($_POST["email_funcionario"]) ? $_POST["email_funcionario"] : "";
    $cpf_funcionario = isset($_POST["cpf_funcionario"]) ? $_POST["cpf_funcionario"] : "";
    $cargo_funcionario = isset($_POST["cargo_funcionario"]) ? $_POST["cargo_funcionario"] : "";
    $senha_funcionario = isset($_POST["senha_funcionario"]) ? $_POST["senha_funcionario"] : "";

    try {
        $Comando = $conexao->prepare("INSERT INTO funcionario (nome_funcionario, email_funcionario, cpf_funcionario, cargo_funcionario, senha_funcionario)
        VALUES (?, ?, ?, ?, ?)");
        $Comando->bindParam(1, $nome_funcionario);
        $Comando->bindParam(2, $email_funcionario);
        $Comando->bindParam(3, $cpf_funcionario);
        $Comando->bindParam(4, $cargo_funcionario);
        $Comando->bindParam(5, $senha_funcionario);

        if ($Comando->execute()) {
            $RetornoJSON = json_encode(array('success' => true));
        } else {
            $RetornoJSON = json_encode(array('success' => false));
        }        
    } catch (PDOException $erro) {
        $RetornoJSON = "Erro: " . $erro->getMessage();
    }

    echo $RetornoJSON;
}
?>
