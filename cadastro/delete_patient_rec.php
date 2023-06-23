<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Paciente?</title>
    <style>
        @import url(../var.css);
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 1.2rem;
            background-color: aliceblue;
            margin: 0;
            padding: 0;
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        form{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;

            width: 100%;
            max-width: 400px;
            height: 600px;
            background-color: white;
            border-radius: 10px;
            border: solid 2px var(--corPrincipal);
        }
        label{
            color: var(--corSuporte);
            font-size: 1.2em;
            font-weight: 600;
            text-transform: uppercase;
            display: flex;
            flex-direction: column;
            text-align: center;
            gap: 15px;
        }
        label input{
            width: 100%;
            height: 30px;
            padding: 5px;
            border: none;
            font-size: 1.2rem;
            color: var(--corPrincipal);
            border-bottom: solid 2px var(--corPrincipal);
            outline: none;
        }
        input[type="submit"]{
            width: 200px;
            height: 60px;
            border: solid 2px red;
            color: red;
            border-radius: 5px;
            letter-spacing: 2px;
            text-transform: uppercase;
            background-color: white;
            font-size: 1.2rem;
            margin-top: 100px;
            transition: .2s ease-in-out;
        }
        input[type="submit"]:hover{
            background-color: red;
            color: white;
            transition: .2s ease-in-out;
        }
        
    </style>
</head>
<body>
    <form method="POST" action="delete_patient.php">
        <label for="cpf_paciente">
            CPF do Paciente:
            <input type="text" name="cpf_paciente" id="cpf_paciente" required>
        </label>
        <input type="submit" value="Excluir">
    </form>
</body>
</html>


<?php
require "./conexao.php";
    
if (isset($_POST['cpf_paciente'])) {
    $cpf_paciente = $_POST['cpf_paciente'];

    // Executa a exclusão do paciente
    $sql = "DELETE FROM paciente WHERE cpf_paciente = :cpf_paciente";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':cpf_paciente', $cpf_paciente);

    if ($stmt->execute()) {
        echo "
        <script>
            alert('Paciente excluído com sucesso!');
            setTimeout(() => {
                window.location.href = 'http://localhost/welfare/cadastro/cadastrarpac_rec.php';
            }, 1000);
        </script>
        ";
    } else {
        $errorInfo = $stmt->errorInfo();
        echo "Erro ao excluir o paciente: " . $errorInfo[2];
    }

    $conexao = null;
}
?>
