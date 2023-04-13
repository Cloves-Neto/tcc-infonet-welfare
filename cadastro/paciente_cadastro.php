<?php
include_once ("conexao.php");

//obtendo os valores do formulário
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$dtnas = $_POST['dtnas'];
$rg = $_POST['rg'];



//inserindo os valores no banco de dados
$sql = "INSERT INTO paciente (nome_paciente, cpf_paciente, email, contato_paciente, dt_nascimento_paciente, rg_paciente ) VALUES
                                ('$nome', '$cpf', '$email', '$tel', '$dtnas', '$rg')";

if ($conn->query($sql) === TRUE) {
    echo "
    <script>
        alert('Dados cadastrados com sucesso!');
        window.location.href='./cadastro.php';
    </script>
    ";

} else {
    echo "Erro ao inserir dados: " . $conn->error;
}

$conn->close();
?>
