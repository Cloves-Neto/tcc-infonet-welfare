

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
        <!-- Menu de navegação -->
        <nav aria-label="menu de navegação principal do sistema" class="menu">
            <ul>
                <li>
                    <a href="#"></a>
                </li>
            </ul>
        </nav>
        <!-- Conteudo principal do sistema -->
        <main class="principal">
            <!-- Cabeçalho da main -->
            <header class="header">
                <h1>Cadastro Paciente</h1>
                <div>
                    <span>26/04/2023</span>
                    <br>
                    <span>H 19:36</span>
                </div>
            </header>
            <!-- Lista de contato dos funcionarios da clinica -->
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
//
                    </tbody>
                </table>
            </div>
            <!-- Aside que exibe conteudo do botão ver mais -->
            <aside class="view">
                <!-- cabeçalho - menu de busca -->
                <header class="procurar">
                    <label for="busca">
                        <input type="search" name="busca" id="busca">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </header>
                <!-- Sessão que exibe dados do botão (ver+) da lista -->
                <section class="exibe">
                    <!-- >>>>> exibe o conteúdo aqui <<<<< -->
                </section>
            </aside>
            <!-- rodapé que contém o botão de cadastro -->
            <div class="footer">
                <input type="button" id="cadastra" value="Cadastrar" onclick="abre()">
            </div> 

            <!-- Div >>> POP UP <<< que é exibida deposi da rotina JS  -->
        </main>

        <div id="popup" class="popup cadastro" >
                <!-- Formulario de cadastro paciente -->
                <form  method="post" action="cadastrar.php">
                    <!-- wrap linha com os dados do form de cadastro  -->
                    <div class="wrap">
                        <h5>Informações Paciente</h5>
                        <label for="">
                            NOME COMPLETO
                            <input type="text" id="nome_paciente" name="nome_paciente">
                        </label><br>
                        <label for="">
                            DATA DE NASCIMENTO
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
                            SEXO <br>
                            <input type="radio" id="sexo_paciente" name="sexo_paciente" value="f" >Feminino <br>
                            <input type="radio" id="sexo_paciente" name="sexo_paciente" value="m">Masculino <br>
                            <input type="radio" id="sexo_paciente" name="sexo_paciente" value="o">Outro <br>
                        </label><br>

                        <label for="">
                            TELEFONE
                            <input type="text" id="contato_paciente" name="contato_paciente">
                        </label><br>
                        <label for="">
                            EMAIL
                            <input type="text" id="email" name="email">
                        </label><br><br>

                        <h5>Informações responsável</h5>
                        <label for="">
                            NOME COMPLETO
                            <input type="text" id="nome_responsavel" name="nome_responsavel">
                        </label><br>
                        <label for="">
                            DATA DE NASCIMENTO
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
                            SEXO <br>
                            <input type="radio" id="sexo_responsavel" name="sexo_responsavel" value="f" >Feminino <br>
                            <input type="radio" id="sexo_responsavel" name="sexo_responsavel" value="m">Masculino <br>
                            <input type="radio" id="sexo_responsavel" name="sexo_responsavel" value="o">Outro <br>
                        </label><br>

                        <h5>Endereço</h5>
                        <label for="">
                            UF
                            <input type="text" id="uf" name="uf">
                        </label><br>
                        <label for="">
                            LOGADOURO
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
                    <!-- BOTÃO CADASTRAR -->
                    <input type="submit" id="salvar" name="salvar" value="salvar">
                    <input type="button" value="Fechar" id="fecha" onclick="voltar()">
                </form>
        </div>
    </div>


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
    const  cadastrar = document.getElementById('cadastra');
    const fechar = document.getElementById('fecha');
    function abre(){
        cadastrar.addEventListener("click", ()=>{
            document.getElementById('popup').classList.add('ativo');
        })
    }
    function voltar(){
        fechar.addEventListener("click", ()=>{
            document.getElementById('popup').classList.remove('ativo');
        })
    }
</script>
</body>
</html> 

