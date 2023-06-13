<?php
require "../conexao.php";

if (isset($_GET["id_cargo"])) {
    $id = $_GET["id_cargo"];

    // Retrieve the cargo data based on the ID
    $query = "SELECT * FROM cargo WHERE id_cargo = :id_cargo";
    $statement = $conexao->prepare($query);
    $statement->bindValue(":id_cargo", $id);
    $statement->execute();
    $cargo = $statement->fetch(PDO::FETCH_ASSOC);

    if ($cargo) {
        echo "<h2>Editar Cargo</h2>";

        // Hidden div that contains the edit form
        echo "<form method='POST' action='update_cargo.php'>";
        echo "<input type='hidden' name='id' value='" . $cargo["id_cargo"] . "'>";
        echo "<input type='text' name='cargo' value='" . $cargo["cargo_funcionario"] . "' required>";
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