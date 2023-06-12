<?php
require "../conexao.php";

if (isset($_GET['id_cargo'])) {
    $id = $_GET['id_cargo'];

    $query = "DELETE FROM cargo WHERE id_cargo = :id_cargo";
    $statement = $conexao->prepare($query);
    $statement->bindParam(':id_cargo', $id);

    if ($statement->execute()) {
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } else {
        echo "Erro ao excluir os dados.";
    }
} else {
    echo "Nenhum ID especificado para exclusão.";
}
?>
