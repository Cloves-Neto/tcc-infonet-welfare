<?php
require "../conexao.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Retrieve the cargo data based on the ID
    $query = "SELECT * FROM cargo WHERE id_cargo = :id";
    $statement = $conexao->prepare($query);
    $statement->bindValue(":id", $id);
    $statement->execute();
    $cargo = $statement->fetch(PDO::FETCH_ASSOC);

    if ($cargo) {
        // Display a link to open the edit form in a popup
        echo "<h2>Edit Cargo</h2>";
        echo "<a href='#' onclick='openEditForm(" . $cargo["id_cargo"] . ")'>Edit Cargo</a>";

        // Hidden div that contains the edit form
        echo "<div id='editFormContainer' style='display: none;'>";
        echo "<h2>Edit Cargo</h2>";
        echo "<form method='POST' action='update_cargo.php'>";
        echo "<input type='hidden' name='id' value='" . $cargo["id_cargo"] . "'>";
        echo "<input type='text' name='cargo' value='" . $cargo["cargo_funcionario"] . "' required>";
        echo "<input type='submit' name='update' value='Update'>";
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