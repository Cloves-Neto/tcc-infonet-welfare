<?php

    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $contato = $_POST['contato'];
    $email = $_POST['email'];
    $medico = $_POST['selectmedico'];
    $especialidade = $_POST['especialidade'];
    $hora = $_POST['hora'];
    $data = $_POST['data'];

    $query = "UPDATE `consulta`
    SET 
    `nome_paciente`='$nome',
    `estado_consulta`= 'consultar' ,
    `dt_consulta`='$data',
    `hora_consulta`='$hora',
    `cargo_funcionario`='medico',
    `nome_medico`='$medico',
    `especialidade`='$especialidade'
    `emai_paciente` = '$email',
    `contato_paciente`='$contato'";

    $result = $conn->prepare($query);
    $result->execute();

    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //     $nome_paciente = $_POST['nome_paciente'] ?? '';
    //     $email = $_POST['email'] ?? '';
    //     $contato_paciente = $_POST['contato_paciente'] ?? '';
    //     $dt_nascimento_paciente = $_POST['dt_nascimento_paciente'] ?? '';
    
    //     $sqlUpdate = "UPDATE paciente SET nome_paciente = :nome_paciente, email = :email, contato_paciente = :contato_paciente, dt_nascimento_paciente = :dt_nascimento_paciente WHERE cpf_paciente = :cpf_paciente";
    //     $stmt = $conexao->prepare($sqlUpdate);
    //     $stmt->bindParam(':nome_paciente', $nome_paciente);
    //     $stmt->bindParam(':email', $email);
    //     $stmt->bindParam(':contato_paciente', $contato_paciente);
    //     $stmt->bindParam(':dt_nascimento_paciente', $dt_nascimento_paciente);
    //     $stmt->bindParam(':cpf_paciente', $cpf_paciente);
    
    //     if ($stmt->execute()) {
    //         header('Location: cadastrarpac_rec.php');
    //     } else {
    //         echo "Erro ao atualizar os dados.";
    //     }
    // }

?>