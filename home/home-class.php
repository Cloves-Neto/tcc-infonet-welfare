<?php


// session_start();



class executaHome{

    private $email_funcionario;


    // Email funcionario guardado no session
    public function getEmailFuncionario(){
        return $this->Email;
    }
    public function setEmailFuncionario($email_funcionario){
        $this->Email = $email_funcionario;
    }



    // ============RETORNA O NOME DO USUARIO LOGADO FAZENDO A VERIFICAÇÃO DO EMAIL===============//

    public function buscaNome(){
        require '../conexao.php';

        $bd = $conexao;

        // $email = $this->Email; //dados resgatados da sesseion
        
        $email = 'breno@email.com';

        // $query ="SELECT * FROM funcionario WHERE `email_funcionario`= ?"; //Busca e compara dados do bd com o session
        $query = "SELECT * FROM funcionario WHERE `email_funcionario`= ?"; //query para ser executada no bd (substitui o valor do email teste pelo $SESSION['email_funcionario'])

        
        $buscarusuario = $bd->prepare($query); // prepara a query criada para ser executada
        $buscarusuario->bindValue(1, $email);//insere o dado para o parametro de busca da query '?'
        
        $buscarusuario->execute(); // executa a query preparada diretamente com o metodo de conexao da class
        $user_data = $buscarusuario->fetch(PDO::FETCH_ASSOC); // retorna os dados em array pela funcão 'fetch-ASSOC'
        
        return $user_data;
    }


    // ================BUSCA OS DADOS SALVOS DE MENSAGENS NO BD=========//
    public function exibeMensagem(){

        $bd = new ConexaoBd();
        $pdo = $bd->getconexao(); 

        $query = "SELECT * FROM salvamsg"; //query para ser executada no bd (substitui o valor do email teste pelo $SESSION['email_funcionario'])

        $buscamsg = $pdo->prepare($query); // prepara a query criada para ser executada

        $buscamsg->execute(); // executa a query preparada diretamente com o metodo de conexao da class

        $msg_data = $buscamsg->fetch(PDO::FETCH_ASSOC); // retorna os dados em array pela funcão 'fetch-ASSOC'   

        return $msg_data; 
    }



}





?>