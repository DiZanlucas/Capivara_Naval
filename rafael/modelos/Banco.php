<?php 


final class Banco {

    
    private static $conexao;

   
    private function __construct() {}

    
    public static function getInstance() {
        if (is_null(self::$conexao)) {
            self::$conexao = new PDO('sqlite:login.sqlite3');
            self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$conexao;
    }

   
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
