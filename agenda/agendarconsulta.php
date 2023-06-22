<?php
session_start(); // Inicia a sessão

include_once "../conexao.php";

$cpf = $_POST['cpf']; // Obtém o CPF enviado via formulário
$nome = $_POST['nome']; // Obtém o nome enviado via formulário
$contato = $_POST['contato']; // Obtém o contato enviado via formulário
$email = $_POST['email']; // Obtém o email enviado via formulário

// Verifica se o usuário está logado
if (isset($_SESSION['email_funcionario'])) {
    $email_funcionario = $_SESSION['email_funcionario'];

    // Resto do seu código...

    if (isset($_POST['agenda'])) {
        // Recupera os valores do formulário
        $cpf = $_POST['cpf'];
        $nome_paciente = $_POST['nome'];
        $email_paciente = $_POST['email'];
        $contato_paciente = $_POST['contato'];
        $especialidade = $_POST['especialidade'];
        $id_medico = $_POST['selectmedico'];
        $data = $_POST['data'];
        $hora = $_POST['hora'];

        // Insere os dados no banco de dados
        $query = "INSERT INTO consulta (cpf_paciente, nome_paciente, contato_paciente, email, contato, especialidade, id_medico, especialidade,) VALUES (:cpf, :nome, :contato, :email)";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':contato', $contato);
        $stmt->bindParam(':email', $email);
        $stmt->bindValue(':especialidade', $especialidade);
        $stmt->bindValue(':id_medico', $id_medico);
        $stmt->bindValue(':data', $data);
        $stmt->bindValue(':hora', $hora);
        $stmt->execute();        


        if ($stmt->execute()) {
            // Redireciona o usuário para a página de agenda
            header("Location: agenda.php");
            exit();
        } else {
            // Trate o caso de falha na inserção dos dados
            echo "Ocorreu um erro ao agendar a consulta. Por favor, tente novamente.";
        }
    }
} else {
    // Redireciona o usuário para a página de login ou trata o caso em que o usuário não está logado
    header("Location: index.php");
    exit();
}
?>

<?php
include_once "../conexao.php";

$cpf = $_POST['cpf']; // Obtém o CPF enviado via formulário
$nome = $_POST['nome']; // Obtém o nome enviado via formulário
$contato = $_POST['contato']; // Obtém o contato enviado via formulário
$email = $_POST['email']; // Obtém o email enviado via formulário

// Insere as informações no banco de dados
$query = "INSERT INTO paciente (cpf_paciente, nome_paciente, contato_paciente, email) VALUES (:cpf, :nome, :contato, :email)";
$stmt = $conexao->prepare($query);
$stmt->bindParam(':cpf', $cpf);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':contato', $contato);
$stmt->bindParam(':email', $email);
$stmt->execute();

// Verifica se a inserção foi bem-sucedida
if ($stmt->rowCount() > 0) {
    echo "Informações inseridas com sucesso!";
} else {
    echo "Erro ao inserir as informações no banco de dados.";
}
?>
