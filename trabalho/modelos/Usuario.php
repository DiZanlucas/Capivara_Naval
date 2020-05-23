<?php

include_once("Banco.php");

/**
*  Classe para representar os usuarios com seu nick e pontos
*/
class Usuario {

   /**
   *  String do nick do usuário.
   */
    private $nick;

   /**
   *  int dos pontos do usuário.
   */
    private $pontos;

   /**
   *  Construtor da clase que recebe nick e pontos
   */
    function __construct(string $nick, int $pontos) {
        $this->nick = $nick;
        $this->pontos = $pontos;
    }

   /**
   *  método genérico para acessar os campos dessa classe
   */
    public function __get($campo) {
        return $this->$campo;
    }

   /**
   *  método genérico para alterar os campos dessa classe
   */
    public function __set($campo, $valor) {
        return $this->$campo = $valor;
    }

    /**
     *  Função parar salvar os dados do usuário no banco.
     */   
    public function salvar() {
        $db = Banco::getInstance();
        $stmt = $db->prepare('INSERT INTO Usuarios (nick, pontos) VALUES (:nick, :pontos)');
        $stmt->bindValue(':nick', $this->nick);
        $stmt->bindValue(':pontos', $this->pontos);
        $stmt->execute();
    }

     /**
     * Função estática, pois não depende do estado de uma instância,
     * para buscar um usuário no banco.
     * 
     * retorna uma instância de usuário ou null caso usuário não exista.
     */
    public static function buscar(string $nick) {
        $db = Banco::getInstance();

        $stmt = $db->prepare('SELECT * FROM Usuarios WHERE nick = :nick');
        $stmt->bindValue(':nick', $nick);
        $stmt->execute();

        $resultado = $stmt->fetch();

        if ($resultado) {
            $usuario = new Usuario($resultado['nick'], $resultado['pontos']);
            return $usuario;
        } else {
            return NULL;
        }
    }

     /**
     * Função estática, pois não depende do estado de uma instância,
     * buscar no banco os 5 usuários com mais pontos.
     * 
     * retorna um vetor com os usuários encontrados ou null caso não exista nenhum usuário.
     */
    public static function ranking() {
        $db = Banco::getInstance();

        $stmt = $db->prepare('SELECT * FROM Usuarios ORDER BY pontos DESC LIMIT 5');
        
        $stmt->execute();

        $resultado = $stmt->fetchAll();

        if ($resultado) {
	    $vetor = array();
            foreach ($resultado as &$u) {
		
                   $usuario = new Usuario($u['nick'], $u['pontos']);
                   
                   array_push($vetor, $usuario);
                
            }

            return $vetor;
        } else {
            return NULL;
        }
    }

 
	
}

?>
