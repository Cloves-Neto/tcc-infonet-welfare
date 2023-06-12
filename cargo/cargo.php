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
        $("#edit-dialog").dialog({
            autoOpen: false,
            width: 400,
            height: 300,
            modal: true
        });

        $(".edit-link").on("click", function(e) {
            e.preventDefault();
            var id = $(this).data("id_cargo");
            $("#edit-dialog").dialog("open");
            $("#edit-dialog").load("edit_cargo.php?id_cargo=" + id);
        });

        $(".delete-link").on("click", function(e) {
            e.preventDefault();
            var id = $(this).data("id_cargo");
            confirmDelete(id);
        });

        function confirmDelete(id) {
            var result = confirm("Tem certeza que deseja excluir?");

            if (result) {
                // Redireciona para delete_cargo.php com o ID selecionado
                window.location.href = "delete_cargo.php?id_cargo=" + id;
            }
        }
    });
    </script>
</head>
<body>
    <div class="granbox">
        <aside class="menu">
            <nav>
                <div class="user-profile">
                    <a href="#" class="user-img" aria-label="área de informações do usuário">
                        <img src="../assets/user.png" alt="imagem de usuário">
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
                        <a href="../cargo/cargo.html">Cargo</a>
                    </li>
                    <li>
                        <a href="../registro/registro.html">Funcionário</a>
                    </li>
                    <li>
                        <a href="../agenda/agenda.html">Agenda</a>
                    </li>
                    <li>
                        <a href="../financeiro/financeiro.php">Financeiro</a>
                    </li>
                    <li>
                        <a href="../relatorio/relatorio.php">Relatório</a>
                    </li>
                </ul>
            </nav>
        </aside>
        <section class="infosite">
            <header>
                <h2>Cargo</h2>
            </header>
            <main>
                <div class="cadastrar-area">
                    <input type="text" name="cargo" id="cargo" placeholder="Digite aqui o cargo...">
                    <input type="button" name="cadastrar" id="cadastrar" value="Cadastrar">
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
                                echo "<td>" . $row["cargo_funcionario"] . "</td>";
                                echo "<td><a href='edit_cargo.php?id=" . $row["id_cargo"] . "' class='edit-link'>Editar</a></td>";
                                echo "<td><a href='#' class='delete-link' data-id='" . $row["id_cargo"] . "'>Excluir</a></td>";
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
    <div id="edit-dialog" title="Editar Cargo" style="display: none;"></div>
</body>
</html>
