
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<h2>Tabela de Dados</h2>
<table>
    <tr>
        <th>Nome do Paciente</th>
        <th>Data de Nascimento</th>
        <th>CPF Paciente</th>
        <th>RG Paciente</th>
        <th>Sexo</th>
        <th>Contato</th>
        <th>Email</th>
        <th>Nome Responsável</th>
        <th>Data de Nascimento</th>
        <th>CPF Responsável</th>
        <th>RG Responsável</th>
        <th>Sexo</th>
        <th>UF</th>
        <th>Logadouro</th>
        <th>CEP</th>
        <th>N°</th>

    </tr>
    <?php
require "../conexao.php";

$query = "SELECT * FROM paciente WHERE id_paciente";
$result = $conexao->query($query);

$rows = $result->fetchAll(PDO::FETCH_ASSOC);

if (count($rows) > 0) {
    foreach ($rows as $row) {
        echo "<tr>";
        echo "<td>" . $row["nome_paciente"] . "</td>";
        echo "<td>" . $row["dt_nascimento_paciente"] . "</td>";
        echo "<td>" . $row["cpf_paciente"] . "</td>";
        echo "<td>" . $row["rg_paciente"] . "</td>";
        echo "<td>" . $row["sexo_paciente"] . "</td>";
        echo "<td>" . $row["contato_paciente"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["nome_responsavel"] . "</td>";
        echo "<td>" . $row["dt_nascimento_responsavel"] . "</td>";
        echo "<td>" . $row["cpf_responsavel"] . "</td>";
        echo "<td>" . $row["rg_responsavel"] . "</td>";
        echo "<td>" . $row["sexo_responsavel"] . "</td>";
        echo "<td>" . $row["uf"] . "</td>";
        echo "<td>" . $row["logradouro"] . "</td>";
        echo "<td>" . $row["cep_paciente"] . "</td>";
        echo "<td>" . $row["numero_casa_paciente"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='2'>Nenhum resultado encontrado.</td></tr>";
}
?>

</table>
    <form method="post" action="" id="cad_pac" name="cad_pac">
        <!-- wrap linha com os dados do form de cadastro  -->
        <div>
        <h5>INFORMAÇÕES DO PACIENTE</h5>
            <label for="">
                Nome
                <input type="text" id="nome_paciente" name="nome_paciente">
            </label><br>
            <label for="">
                Data de nascimento
                <input type="date" id="dt_nascimento_paciente" name="dt_nascimento_paciente">
            </label><br>
            <label for="">
                CPF
                <input type="text" id="cpf_paciente" name="cpf_paciente">
            </label><br>
            <label for="">
                RG
                <input type="text" id="rg_paciente" name="rg_paciente">
            </label><br>
            <label for="">
                Sexo <br>
                <input type="radio" id="sexo_paciente" name="sexo_paciente" value="f" >Feminino <br>
                <input type="radio" id="sexo_paciente" name="sexo_paciente" value="m">Masculino <br>
                <input type="radio" id="sexo_paciente" name="sexo_paciente" value="o">Outro <br>
            </label><br>

            <h5>INFORMAÇÕES DO RESPONSÁVEL</h5>
            <label for="">
                Nome
                <input type="text" id="nome_responsavel" name="nome_responsavel">
            </label><br>
            <label for="">
                Data de nascimento
                <input type="date" id="dt_nascimento_responsavel" name="dt_nascimento_responsavel">
            </label><br>
            <label for="">
                CPF
                <input type="text" id="cpf_responsavel" name="cpf_responsavel">
            </label><br>
            <label for="">
                RG
                <input type="text" id="rg_responsavel" name="rg_responsavel">
            </label><br>
            <label for="">
                Sexo <br>
                <input type="radio" id="sexo_responsavel" name="sexo_responsavel" value="f">Feminino <br>
                <input type="radio" id="sexo_responsavel" name="sexo_responsavel" value="m">Masculino <br>
                <input type="radio" id="sexo_responsavel" name="sexo_responsavel" value="o">Outro <br>
            </label><br>

            <h5>INFORMAÇÕES PARA CONTATO</h5>
            <label for="">
                Telefone
                <input type="text" id="contato_paciente" name="contato_paciente">
            </label><br>
            <label for="">
                Email
                <input type="text" id="email" name="email">
            </label><br><br>

            <h5>INFORMAÇÕES DE ENDEREÇO</h5>
            <label for="">
                UF
                <input type="text" id="uf" name="uf">
            </label><br>
            <label for="">
                Logadouro
                <input type="text" id="logradouro" name="logradouro">
            </label><br>
            <label for="">
                CEP
                <input type="text" id="cep_paciente" name="cep_paciente">
            </label><br>
            <label for="">
                N°
                <input type="text" id="numero_casa_paciente" name="numero_casa_paciente">
            </label>
        </div>
        <div id="resposta"></div> 
        <!-- BOTÃO CADASTRAR -->
        <input type="submit" id="cadastrar" name="cadastrar" value="cadastrar">
        <input type="button" value="Fechar" id="fecha">
    </form>


    <script>
        $(document).ready(function() {
            $('#cad_pac').submit(function(event) {
                event.preventDefault(); 
                var dados = $(this).serialize();
                
                $.ajax({
                    method: 'post',
                    url: 'cadastrar.php',
                    data: dados,
                    beforeSend: function() {
                        $("h2").html("Processo em andamento.");
                    }
                })
                .done(function(msg) {
                    $("h2").html("Retorno do cadastro..."); 
                    $("#resposta").html(msg);
                })
                .fail(function() {
                    alert("Falha ao acessar, tente novamente");
                });
            });

            $('#fecha').click(function() {
                // Lógica para fechar o formulário
            });
        });
    </script>
</body>
</html>