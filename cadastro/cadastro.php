

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welfare | Cadastro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="cadastro.css">
</head>
<body>
    <!-- Menu dá página -->
    
    <!-- conteudo proncipal da página -->
    <div class="granbox">
        <nav class="menu">
            <ul>
                <li>
                    <a href="#"></a>
                </li>
            </ul>
        </nav>
        
        <main class="principal">
            <header class="header">
                <h1>Cadastro Paciente</h1>
                <div>
                    <span>26/04/2023</span>
                    <br>
                    <span>H 19:36</span>
                </div>
            </header>
            <div class="lista">
            <table class="table">
                    <!-- Cabeçalho da tabela -->
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Cpf</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Dt Nacimento</th>
                        </tr>
                    </thead>
                    <!-- Corpo da tabela -->
                    <tbody>
                        <tr>
                            <td scope='row'>#1</td>
                            <td scope='row'>Alana Huggart</td>
                            <td scope='row'>123.456.789.11</td>
                            <td scope='row'>exemplo@email.com</td>
                            <td scope='row'>(11)29458969</td>
                            <td scope='row'>10/20/23</td>
                            <td>
                                <a href='editar_cadastro.php?id=$user_data[id_paciente]'  class='btn-sm' name='editar' id='editar'><img src='../node_modules/bootstrap-icons/icons/pencil-fill.svg' alt='editar-icone'></a>
                                <a href='excluir_cadastro.php?id=$user_data[id_paciente]' class='btn-sm' name='excluir' id='excluir'><img src='../node_modules/bootstrap-icons/icons/trash-fill.svg' alt='ecluir-icone'></a>
                                <a href='exibe_cadastro.php?id=$user_data[id_paciente]' class='btn-sm' name='visualizar' id='visualizar'><img src='../node_modules/bootstrap-icons/icons/eye-fill.svg' alt='visualizar-icone'></a>
                            </td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
            <aside class="view">
                <header class="procurar">
                    <label for="busca">
                        <input type="search" name="busca" id="busca">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </header>
                <section class="exibe">

                </section>
            </aside>
            <div class="footer">
                <input type="button" value="Cadastrar">
            </div>
        </main>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html> 

