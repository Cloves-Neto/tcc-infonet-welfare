<?php

include_once('../conexao.php');


class Mensagem
{

    private $txtmensagem, $idmensagem;


    //====== Instanciando String do Textarea txtmensagem =======// 
    public function getTxtmensagem()
    {
        return $this->Mensagem;
    }

    public function setTxtmensagem($txtmensagem)
    {
        $this->Mensagem = $txtmensagem;
    }

    // ====== Instanciando Valor de ID do BD ========= //
    public function getIdmensagem()
    {
        return $this->Id;
    }
    public function setIdmensagem($idmensagem)
    {
        $this->Id = $idmensagem;
    }

    // =======================================================

    public function SalvaMensagem(){
        
        require '../conexao.php';
        
        $msg = $this->Mensagem;
        $query = "INSERT INTO mensagem (msg) VALUES (?)";
        
        $stm = $conexao->prepare($query);
        $stm->bindValue(1,$msg);

        $stm->execute();
        return $stm->rowCount();
    }

    public function ExcluiMensagem(){
        require '../conexao.php';   
        
        $msg = $this->Id;
        $query = "DELETE FROM mensagem WHERE id_msg=?";
        
        $stm = $conexao->prepare($query);
        $stm->bindValue(1,$msg);

        $stm->execute();
        return $stm->rowCount();        
    }
}

?>