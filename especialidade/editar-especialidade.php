<?php
require "../conexao.php";

if (isset($_GET["id_especialidade"])) {
    $id = $_GET["id_especialidade"];

    // Retrieve the cargo data based on the ID
    $query = "SELECT * FROM especialidade WHERE id_especialidade = :id_especialidade";
    $statement = $conexao->prepare($query);
    $statement->bindValue(":id_especialidade", $id);
    $statement->execute();
    $especialidade = $statement->fetch(PDO::FETCH_ASSOC);

    if ($especialidade) {
        echo "<h2>Editar</h2>";

        // Hidden div that contains the edit form
        echo "<form method='POST' action='update_especialidade.php'>";
        echo "<input type='hidden' name='id' value='" . $especialidade["id_especialidade"] . "'>";
        echo "<input type='text' name='especialidade' value='" . $especialidade["tipo_especialidade"] . "' required>";
        echo "<input type='submit' name='update' value='Atualizar'>";
        echo "</form>";
        echo "</div>";
    } else {
        echo "Cargo not found.";
    }
} else {
    echo "Invalid request.";
}
?>
<script>
function openEditForm(id) {
    // Get the edit form container
    var editFormContainer = document.getElementById("editFormContainer");

    // Set the display property to block to show the popup
    editFormContainer.style.display = "block";
}
</script>