<?php 

/**
* Classe responsável pela conexão com o banco de dados.
*/
final class Banco {

    /**
    * PDO armazena a conexão e retorna quando solicitado.
    */
    private static $conexao;

    /**
    *  Construtor privado.
    */
    private function __construct() {}

    /**
    *  Função (estática) na qual usuários podem obter a conxão. 
    *  Somente uma será criada.
    *
    *  retorna PDO conexão com o banco
    */
    public static function getInstance() {
        if (is_null(self::$conexao)) {
            self::$conexao = new PDO('sqlite:login.sqlite3');
            self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$conexao;
    }

    /**
    *  Função para criação do modelo do banco. 
    */
    public static function createSchema() {
        $db = self::getInstance();
        $db->exec('
            CREATE TABLE IF NOT EXISTS Usuarios (
                nick TEXT PRIMARY KEY,
                pontos int
            )
        ');
    }
}

?>
