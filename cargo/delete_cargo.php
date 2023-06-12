<?php
require "../conexao.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM cargo WHERE id_cargo = :id";
    $statement = $conexao->prepare($query);
    $statement->bindParam(':id', $id);

    if ($statement->execute()) {
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } else {
        echo "Error deleting the data.";
    }
} else {
    echo "No ID specified for deletion.";
}
?>