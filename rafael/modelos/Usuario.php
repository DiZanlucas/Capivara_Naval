<?php

include_once("Banco.php");

/**
*  Classe que representa os dados de um usuário do sistema
*/
class Usuario {

   
    private $nick;


    private $pontos;

    /**
    *  Construtor da classe que depende do email, senha e do nome.
    */
    function __construct(string $nick, int $pontos) {
        $this->nick = $nick;
        $this->pontos = $pontos;
    }

    /**
    *  Método mágico para acessar todos os campos
    */
    public function __get($campo) {
        return $this->$campo;
    }

    /**
    *  Método mágico para modificar todos os campos
    */
    public function __set($campo, $valor) {
        return $this->$campo = $valor;
    }

    /**
    *   Método que verifica se o email e senha providos são iguais ao da instância.
    *   Sua importância é devido ao fato da senha ser codificada.
    *
    *   @return bool Retorna TRUE se igual, senão FALSE
    */
    public function igual(string $nick) {
        return $this->nick === $nick;
    }

    /**
     *  Função que salva os dados de um usuário no banco.
     *  Esta função não sobrescreve dados.
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
     * @return Usuario retorna ums instância de usuário
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
