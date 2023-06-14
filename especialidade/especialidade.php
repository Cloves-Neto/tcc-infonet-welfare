<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../cargo/cargo.css">
    <title>Welfare | Especalidade </title>
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
                var id = $(this).data("id_especialidade");
                $("#editPopup").dialog("open");
                $("#editPopup").load("editar-especialidade.php?id_especialidade=" + id);
            });
        });

        function confirmDelete(id) {
            var result = confirm("Tem certeza que deseja excluir?");

            if (result) {
                // Redireciona para delete_cargo.php com o ID selecionado
                window.location.href = "delete_especialidade.php?id=" + id;
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
                <a href="../img/editar_foto.php" class="user-img" aria-label="area de informaçãoes do usuario">
                    <img src="../assets/user.png" alt="imagem de usuario">
                </a>
            </div>
            <ul>
                <li>
                    <a href="../mensagem/mensagem.php">Mensagem</a>
                </li>
                <li>
                    <a href="../cadastro/cadastrarpac.php">Paciente</a>
                </li>
                
                <li>
                    <a href="../especialidade/especialidade.php">Especialidade</a>
                </li>
                
                <li>
                    <a href="../cargo/cargo.php">Cargo</a>
                </li>
                <li>
                    <a href="../registro/registro.html">Funcionario</a>
                </li>
                <li>
                    <a href="../agenda/agenda.php">Agenda</a>
                </li>
                <!-- <li>
                    <a href="../financeiro/financeiro.php">Financeiro</a>
                </li>
                <li>
                    <a href="../relatorio/relatorio.php">Relatório</a>
                </li> -->
                <li>
                    <a href="../index.php">
                        <ion-icon name="exit-outline" style="color: white; "></ion-icon>
                    </a>
                </li>
            </ul>
            </nav>
        </aside>
        <section class="infosite">
            <header>
                <h2>Especialidade</h2>
            </header>
            <main>
                <div class="cadastrar-area">
                    <?php
                echo "<h2>Adicionar nova especialidade</h2>";

                    // Hidden div that contains the add form
                    echo "<div id='addFormContainer'>";
                    echo "<form method='POST' action='add_especialidade.php'>";
                    echo "<input type='text' name='tipo_especialidade' placeholder='Digite a nova especialidade...' required>";
                    echo "<input type='submit' name='add' value='Adicionar'>";
                    echo "</form>";
                    echo "</div>";
                    ?>
                </div>
                <div class="row-data">
                    <table>
                        <?php
                        require "../conexao.php";

                        $query = "SELECT * FROM especialidade";
                        $result = $conexao->query($query);
                        $rows = $result->fetchAll(PDO::FETCH_ASSOC);

                        if (count($rows) > 0) {
                            foreach ($rows as $row) {
                                echo "<tr>";
                                echo "<td>" . $row["tipo_especialidade"] . "</td>";
                                echo "<td><a href='#' class='edit-link' data-id_especialidade='" . $row["id_especialidade"] . "'>Editar</a></td>";
                                echo "<td><a href='#' onclick='confirmDelete(" . $row["id_especialidade"] . ")'>Excluir</a></td>";
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
