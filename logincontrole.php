<?php

include "conexao.php";

if(isset($_GET["nome_funcionario"])){$nome=$_GET["nome_funcionario"];}
if(isset($_GET["email_funcionario"])){$email=$_GET["email_funcionario"];}
if(isset($_GET["cpf_funcionario"])){$cpf=$_GET["cpf_funcionario"];}
if(isset($_GET["cargo_funcionario"])){$cargo=$_GET["cargo_funcionario"];}
if(isset($_GET["senha_funcionario"])){$senha=$_GET["senha_funcionario"];}

try
{
    $Comando=$conexao->prepare("Insert into funcionario (nome_funcionario, email_funcionario, cpf_funcionario, cargo_funcionario, senha_funcionario) values (?, ?, ?, ?, ?)");
    $Comando->bindParam(1, $nome);
    $Comando->bindParam(2, $email);
    $Comando->bindParam(3, $cpf);
    $Comando->bindParam(4, $cargo);
    $Comando->bindParam(5, $senha);


    $Comando->execute();

    if($Comando->rowCount() > 0)
    {
        $nome = null;
        $email = null;
        $cpf = null;
        $cargo = null;
        $senha = null;

        $RetornoJSON = "Inclusão efetuada com sucesso!";
    }
    else
    {
        $RetornoJSON = "Erro ao tentar efetivar cadastro";
    }
}
catch (PDOException $erro)
{
    $RetornoJSON = "Erro:" . $erro->getMessage();
}

echo $RetornoJSON;
?>