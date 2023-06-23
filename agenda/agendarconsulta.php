<?php

include_once "../conexao.php";

$cpf = $_GET['cpf'];
$nome_paciente = $_GET['nome'];
$email_paciente = $_GET['email_paciente'];
$contato_paciente = $_GET['contato'];
$especialidade = $_GET['especialidade'];
$medico = $_GET['selectmedico'];
$data = $_GET['data'];
$hora = $_GET['hora'];

// Insere os dados no banco de dados


$query='INSERT INTO consulta
(`nome_medico`, `especialidade_medico`, `nome_paciente`, `hora_consulta`, `email_paciente`, `contato_paciente`, `dt_consulta`, `cpf`) 
VALUES (:medico, :especialidade, :nome, :hora, :email, :contato, :dt, :cpf)';


$stmt = $conexao->prepare($query);
$stmt->bindParam(':cpf', $cpf);
$stmt->bindParam(':nome', $nome_paciente);
$stmt->bindParam(':email', $email_paciente);
$stmt->bindParam(':contato', $contato_paciente);
$stmt->bindValue(':especialidade', $especialidade);
$stmt->bindValue(':medico', $medico);
$stmt->bindValue(':dt', $data);
$stmt->bindValue(':hora', $hora);
$stmt->execute();        


if ($stmt->execute()) {
    echo"
    <script>
        alert('Salvo com sucesso!');
        setTimeout( ()=>{
            window.location.href = 'http://localhost/welfare/agenda/agenda.php';
        }, 1000);
    </script>
    ";
} else {
    // Trate o caso de falha na inserção dos dados
    echo "Ocorreu um erro ao agendar a consulta. Por favor, tente novamente.";
}

?>
