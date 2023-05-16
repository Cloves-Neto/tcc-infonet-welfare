<?php

include_once('../a/conexao.php');


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
        
        $bd = new ConexaoBd();
        $conn = $bd->getconexao();
        $msg = $this->Mensagem;
        $query = "INSERT INTO salvamsg (msg) VALUES (?)";
        
        $stm = $conn->prepare($query);
        $stm->bindValue(1,$msg);

        $stm->execute();
        return $stm->rowCount();
    }

    public function ExcluiMensagem(){
        $bd = new ConexaoBd();
        $conn = $bd->getconexao();
        $msg = $this->Id;
        $query = "DELETE FROM salvamsg WHERE id_msg=?";
        $stm = $conn->prepare($query);
        $stm->bindValue(1,$msg);

        $stm->execute();
        return $stm->rowCount();        
    }
}

?>