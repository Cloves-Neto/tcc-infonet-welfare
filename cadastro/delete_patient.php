<form method="POST" action="delete_patient.php">
    <label for="cpf_paciente">CPF do Paciente:</label>
    <input type="text" name="cpf_paciente" id="cpf_paciente" required>
    <input type="submit" value="Excluir">
</form>

<?php
require "./conexao.php";
    
if (isset($_POST['cpf_paciente'])) {
    $cpf_paciente = $_POST['cpf_paciente'];

    // Executa a exclusão do paciente
    $sql = "DELETE FROM paciente WHERE cpf_paciente = :cpf_paciente";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':cpf_paciente', $cpf_paciente);

    if ($stmt->execute()) {
        echo "Paciente excluído com sucesso!";
    } else {
        $errorInfo = $stmt->errorInfo();
        echo "Erro ao excluir o paciente: " . $errorInfo[2];
    }

    $conexao = null;
}
?>
