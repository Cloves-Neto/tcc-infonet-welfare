<?php
// Verifica se o ID do paciente foi fornecido
if (isset($_GET['id'])) {
    $patientId = $_GET['id'];

    // Recupere as informações do paciente do banco de dados usando o ID fornecido

    // Exiba um formulário com os dados do paciente para permitir a edição
    echo "<form method='post' action='update_patient.php'>";
    echo "<input type='hidden' name='id' value='" . $patientId . "'>";
    // Exiba os campos do formulário com os dados do paciente
    // ...
    echo "<input type='submit' value='Salvar'>";
    echo "</form>";
} else {
    echo "ID do paciente não fornecido.";
}
?>
