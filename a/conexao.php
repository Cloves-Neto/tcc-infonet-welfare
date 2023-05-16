
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



// $hostdb = "localhost";

// $Bco= 'sistema_welfare';

// $Usuario = 'root';

// $Senha = '';

//     try
//     {
//         $conexao = new PDO("mysql:host=$hostdb; dbname=$Bco", "$Usuario", "$Senha"); 
//         $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
//         $conexao->exec("set names utf8");
//     }
//     catch (PDOException $erro)
//         {
//         echo "Erro na conexão:". $erro->getMessage();
//         }
?>