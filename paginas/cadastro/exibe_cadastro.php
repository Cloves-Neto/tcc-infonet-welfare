<?php
include_once("conexao.php");
// Editar
if(!empty($_GET['id'])){

    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM paciente WHERE id_paciente=$id";
    $result = $conn->query($sqlSelect);

    while ($linha = mysqli_fetch_assoc($result)) {
        echo $linha["nome_paciente"] .
        "<br>" . $linha["email"] 
        . "<br>". $linha["cpf_paciente"] 
        . "<br>". $linha["dt_nascimento_paciente"] 
        . "<br>". $linha["contato_paciente"] 
        . "<br>";
    }
}
?>