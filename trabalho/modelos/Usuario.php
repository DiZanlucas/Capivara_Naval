<?php

include_once("Banco.php");


class Usuario {

   
    private $nick;


    private $pontos;

   
    function __construct(string $nick, int $pontos) {
        $this->nick = $nick;
        $this->pontos = $pontos;
    }

    
    public function __get($campo) {
        return $this->$campo;
    }

   
    public function __set($campo, $valor) {
        return $this->$campo = $valor;
    }

    
    public function igual(string $nick) {
        return $this->nick === $nick;
    }

    
    public function salvar() {
        $db = Banco::getInstance();
        $stmt = $db->prepare('INSERT INTO Usuarios (nick, pontos) VALUES (:nick, :pontos)');
        $stmt->bindValue(':nick', $this->nick);
        $stmt->bindValue(':pontos', $this->pontos);
        $stmt->execute();
    }

    
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
