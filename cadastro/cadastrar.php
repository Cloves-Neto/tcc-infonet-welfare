<?php
require_once '../conexao.php';

//obtendo os valores do formulário
$nome_paciente = $_POST['nome_paciente'];
$dt_nascimento_paciente = $_POST['dt_nascimento_paciente'];
$cpf_paciente = $_POST['cpf_paciente'];
$rg_paciente = $_POST['rg_paciente'];
$sexo_paciente = $_POST['sexo_paciente'];
$contato_paciente = $_POST['contato_paciente'];
$email = $_POST['email'];
$nome_responsavel = $_POST['nome_responsavel'];
$dt_nascimento_responsavel = $_POST['dt_nascimento_responsavel'];
$cpf_responsavel = $_POST['cpf_responsavel'];
$rg_responsavel = $_POST['rg_responsavel'];
$sexo_responsavel = $_POST['sexo_responsavel'];
$uf = $_POST['uf'];
$logradouro = $_POST['logradouro'];
$cep_paciente = $_POST['cep_paciente'];
$numero_casa_paciente = $_POST['numero_casa_paciente'];


//inserindo os valores no banco de dados
$conexao->prepare"INSERT INTO paciente (nome_paciente, dt_nascimento_paciente, cpf_paciente, rg_paciente, sexo_paciente, contato_paciente,  email,
nome_responsavel, dt_nascimento_responsavel, cpf_responsavel, rg_responsavel, sexo_responsavel, uf, logradouro, cep_paciente, numero_casa_paciente) VALUES
('$nome_paciente', '$dt_nascimento_paciente', '$cpf_paciente', '$rg_paciente', '$sexo_paciente', '$contato_paciente', '$email',
'$nome_responsavel', '$dt_nascimento_responsavel', '$cpf_responsavel', '$rg_responsavel', '$sexo_responsavel', '$uf', '$logradouro', '$cep_paciente', '$numero_casa_paciente')";

if ($conexao->query($sql) === TRUE) {
    echo "
    <script>
        alert('Dados cadastrados com sucesso!');
        window.location.href='./cadastro.php';
    </script>
    ";

} else {
    echo "Erro ao inserir dados: ";
}

?>
