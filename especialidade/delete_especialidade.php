<?php
require "../conexao.php";

if (isset($_GET['id_especialidade'])) {
    $id = $_GET['id_especialidade'];

    $query = "DELETE FROM especialidade WHERE id_especialidade = :id_especialidade";
    $statement = $conexao->prepare($query);
    $statement->bindParam(':id_especialidade', $id);

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