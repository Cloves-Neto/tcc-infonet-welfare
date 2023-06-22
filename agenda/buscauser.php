
<?php
include '../conexao.php';
session_start ();
// CPF recebido através da requisição AJAX
$cpf = $_POST['cpf'];
// $cpf = 47825938801;

// Consulta ao banco de dados
$sql = "SELECT * FROM paciente WHERE cpf_paciente = :cpf";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':cpf', $cpf);
$stmt->execute();

// Verifica se encontrou o paciente
if ($stmt->rowCount() > 0) {
    // Retorna os dados do paciente como resposta da requisição AJAX
    $paciente = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($paciente);
} else {
    echo json_encode(null);
}
?>