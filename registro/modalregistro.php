<php
class Prod
{
    private $codprod, $descr, $venc, $valor;

     //======================================
     public function getcodprod(){
        return $this->codprod;

    }

    public function setcodprod($codprod){
        $this->codprod = $codprod;
    }
     //======================================
    public function getdescr(){
        return $this->descr;

    }

    public function setdescr($descr){
        $this->descr = $descr;
    }
     //======================================
     public function getvenc(){
        return $this->venc;

    }

    public function setvenc($venc){
        $this->venc = $venc;
    }
     //======================================
     public function getvalor(){
        return $this->valor;

    }

    public function setvalor($valor){
        $this->valor = $valor;
    }

     //=====================================metodo
     public function inserir()
     {
             $bd = new conexao(); //virou objeto// instanciado*
             $con = $bd->getconexao();

             //faz a conexão
             $Sql = "insert into produtos (codprod,descr,venc,valor) values (?,?,?,?);"; // valores tem que ser iguais ao banco de dados
             //stm é a preparacao do comando que vai ser executado

             $stm = $con->prepare($Sql);
             $stm->bindvalue(1, $this->codprod);
             $stm->bindvalue(2, $this->descr);
             $stm->bindvalue(3, $this->venc);
             $stm->bindvalue(4, $this->valor);

             //executa e retorna a execução
             $stm->execute();
             return $stm->rowCount();
     }
}
?>