<?php
require "../conexao.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM especialidade WHERE id_especialidade = :id";
    $statement = $conexao->prepare($query);
    $statement->bindParam(':id', $id);

    if ($statement->execute()) {
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } else {
        echo "Erro ao deletar especialidade.";
    }
} else {
    echo "Especialidade não encontrada.";
}
?>