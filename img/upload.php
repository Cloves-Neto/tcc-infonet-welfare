<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['email_funcionario'])) {
    // Se não estiver logado, redireciona o usuário para a página de login
    header('Location: index.php');
    exit;
}

// Obtém o ID do usuário logado
$idFuncionario = $_SESSION['email_funcionario'];

// Verifica se um arquivo foi enviado
if (isset($_FILES['image'])) {
    // Obtém informações sobre o arquivo de imagem
    $nomeArquivo = $_FILES['image']['name'];
    $tamanhoArquivo = $_FILES['image']['size'];
    $tipoArquivo = $_FILES['image']['type'];
    $caminhoTemporario = $_FILES['image']['tmp_name'];

    // Verifica se o arquivo é uma imagem válida
    $extensoesPermitidas = array('jpg', 'jpeg', 'png');
    $extensaoArquivo = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
    if (!in_array($extensaoArquivo, $extensoesPermitidas)) {
        echo 'Erro: Apenas arquivos JPG, JPEG e PNG são permitidos.';
        exit;
    }

    // Lê o conteúdo do arquivo
    $conteudoArquivo = file_get_contents($caminhoTemporario);

    // Conexão com o banco de dados
    include_once '../conexao.php';

    // Atualiza o campo "foto_funcionario" na tabela "funcionario"
    $query = 'UPDATE funcionario SET foto_funcionario = :conteudo WHERE email_funcionario = :email_funcionario';
    $stmt = $conexao->prepare($query);
    $stmt->bindParam(':conteudo', $conteudoArquivo, PDO::PARAM_LOB);
    $stmt->bindParam(':email_funcionario', $idFuncionario);
    $stmt->execute();

    // Exibe uma mensagem de sucesso
    echo 'A imagem foi enviada e vinculada ao ID do funcionário.';
} else {
    // Nenhum arquivo enviado
    echo 'Erro: Nenhum arquivo enviado.';
}
?>
