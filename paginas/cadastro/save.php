<?php
include_once("./conexao.php");

if(isset($_POST['alterar'])){

    $id = $_POST['id'];
    $nome= $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $dtnas = $_POST['dtnas'];

    $sqlUpdate = "UPDATE paciente SET nome_paciente = '$nome', cpf_paciente = '$cpf', email = '$email', contato_paciente = '$tel', dt_nascimento_paciente = '$dtnas' WHERE id_paciente = '$id'";

    $result = $conn->query($sqlUpdate); 

}
header('Location: cadastro.php');



?>