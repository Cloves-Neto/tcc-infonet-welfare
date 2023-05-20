
<?php

class ConexaoBd
{
    private static $conexao;

    public static function getconexao()
    {
        if(!isset(self::$conexao)) //! é uma negação
        {      
            $hostdb = "localhost";
            $bd= 'sistema_welfare';
            $usuario = 'root';
            $senha = '';

            self::$conexao = new PDO('mysql:host='.$hostdb.';dbname='.$bd.';charset=utf8', $usuario, $senha); //PDO é uma classe do PHP que verifica a conexão com o banco de dados. Eu indico o tipo de banco de dados utilizado
            //localhost é o ip da máquina, dbname é o nome do banco de dados
            return self::$conexao;
        }
        else
        {
            return self::$conexao;
        }
    }
}

?>