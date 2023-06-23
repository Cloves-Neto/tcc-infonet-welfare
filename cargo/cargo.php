<?php
session_start(); // Inicia a sessão

include_once "../conexao.php";

// Verifica se o usuário está logado e recupera o nome
if (isset($_SESSION['email_funcionario'])) {
    $email_funcionario = $_SESSION['email_funcionario'];

    // Consulta o banco de dados para obter o nome e a foto do funcionário com base no email
    $query = "SELECT nome_funcionario, foto_funcionario FROM funcionario WHERE email_funcionario = :email";
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(':email', $email_funcionario);
    $stmt->execute();

    // Verifica se encontrou um funcionário com o email fornecido
    if ($stmt->rowCount() > 0) {
        $dados_funcionario = $stmt->fetch(PDO::FETCH_ASSOC);
        $nome_funcionario = $dados_funcionario['nome_funcionario'];
        $foto_funcionario = $dados_funcionario['foto_funcionario'];
    } else {
        // Redireciona o usuário para a página de login ou trata o caso em que o usuário não está logado
        header("Location: index.php");
        exit();
    }
} else {
    // Redireciona o usuário para a página de login ou trata o caso em que o usuário não está logado
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cargo.css">
    <title>Welfare | cargo</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $(function() {
            $("#editPopup").dialog({
                autoOpen: false,
                width: 400,
                height: 300,
                modal: true
            });

            $(".edit-link").on("click", function(e) {
                e.preventDefault();
                var id = $(this).data("id_cargo");
                $("#editPopup").dialog("open");
                $("#editPopup").load("editar-cargo.php?id_cargo=" + id);
            });
        });

        function confirmDelete(id) {
            var result = confirm("Tem certeza que deseja excluir?");

            if (result) {
                // Redireciona para delete_cargo.php com o ID selecionado
                window.location.href = "delete_cargo.php?id=" + id;
            }
        }
    </script>
    <script>
        function openEditForm(id) {
            // Get the edit form container
            var editFormContainer = document.getElementById("editFormContainer");

            // Set the display property to block to show the popup
            editFormContainer.style.display = "block";
        }
    </script>
</head>
<body>
    <div class="granbox">
    <aside class="menu">
        <nav>
        <div class="user-profile">
            <a href="../img/editar_foto.php" class="user-img" aria-label="área de informações do usuário">
            <?php 
                if(!empty($foto_funcionario)){
                echo'<img src="data:image/jpeg;base64,'.base64_encode($foto_funcionario).'" alt="Foto do funcionário">';
                }
            ?>
            </a>
        </div>


            <ul>
                <li>
                    <ion-icon name="home-outline"></ion-icon>
                    <a href="../home/home-adm.php">Início</a>
                </li>
                <li>
                    <ion-icon name="megaphone-outline"></ion-icon>
                    <a href="../mensagem/mensagem.php">Mensagem</a>
                </li>
                <li>
                    <ion-icon name="person-add-outline"></ion-icon>
                    <a href="../cadastro/cadastrarpac.php">Paciente</a>
                </li>
                
                <li>
                    <ion-icon name="pulse-outline"></ion-icon>
                    <a href="../especialidade/especialidade.php">Especialidade</a>
                </li>
                
                <li>
                    <ion-icon name="alert-circle-outline"></ion-icon>
                    <a href="../cargo/cargo.php">Cargo</a>
                </li>
                <li>
                    <ion-icon name="duplicate-outline"></ion-icon>
                    <a href="../registro/registro.html">Funcionario</a>
                </li>
                <li>
                    <ion-icon name="calendar-number-outline"></ion-icon>
                    <a href="../agenda/agenda.php">Agenda</a>
                </li>
                <!-- <li>
                    <ion-icon name="bar-chart-outline"></ion-icon>
                    <a href="../financeiro/financeiro.php">Financeiro</a>
                </li>
                <li>
                    <ion-icon name="reader-outline"></ion-icon>
                    <a href="../relatorio/relatorio.php">Relatório</a>
                </li> -->
            </ul>

            <a class="sair" href="../index.php">
                <ion-icon name="exit-outline"></ion-icon>
            </a>
        </nav>
    </aside>
        <section class="infosite">
            <header>
                <h2>Cargo</h2>
            </header>
            <main>
                <div class="cadastrar-area">
                    <?php
                echo "<h2>Adicionar novo cargo</h2>";

                    // Hidden div that contains the add form
                    echo "<div id='addFormContainer'>";
                    echo "<form method='POST' action='add_cargo.php'>";
                    echo "<input type='text' name='cargo_funcionario' placeholder='Digite o novo cargo...' required>";
                    echo "<input type='submit' name='add' value='Adicionar'>";
                    echo "</form>";
                    echo "</div>";
                    ?>
                </div>
                <div class="row-data">
                    <table>
                        <?php
                        require "../conexao.php";

                        $query = "SELECT * FROM cargo";
                        $result = $conexao->query($query);
                        $rows = $result->fetchAll(PDO::FETCH_ASSOC);

                        if (count($rows) > 0) {
                            foreach ($rows as $row) {
                                echo "<tr>";
                                echo "<td class='esp'>" . $row["cargo_funcionario"] . "</td>";
                                echo "<td><a href='#' class='edit-link' data-id_cargo='" . $row["id_cargo"] . "'>Editar</a></td>";
                                echo "<td><a href='#' class='excluir' onclick='confirmDelete(" . $row["id_cargo"] . ")'>Excluir</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>Nenhum resultado encontrado.</td></tr>";
                        }
                        ?>
                    </table>
                </div>
            </main>
        </section>
    </div>

    <!-- Popup de Edição -->
    <div id="editPopup" style="display: none;">
        <input type="text" name="editCargo" id="editCargo" placeholder="Digite o cargo...">
    </div>
</body>
</html>
