<?php
function logout() {
  include_once ("../welfare1.1/conexao.php");

  // salva as informações da sessão que precisam ser mantidas
  $email_funcionario = $_SESSION['email_funcionario'];

  // destrói todas as informações da sessão
  session_destroy();
  
  // inicia uma nova sessão
  session_start();

  // restaura as informações da sessão que precisam ser mantidas
  $_SESSION['email_funcionario'] = $email_funcionario;

  // redireciona o usuário para a página de login
  echo "
  <script>
    window.loacation.href='../registro/registro.html'
  </script>
  ";
  exit();
}

?>