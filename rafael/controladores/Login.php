<?php 

require 'controladores/Controlador.php';
require 'modelos/Usuario.php';

/**
* Controlador do login.
*/
class LoginController extends Controller  {
    
    /**
    * @var Usuario armazena o usuário logado no momento.
    */
    private $usuario1;

     /**
    * @var Usuario armazena o usuário logado no momento.
    */
    private $usuario2;

    /**
    *  Construtor da classe. 
    *  Inicia/recupera a sessão do usuário e recupera o usuário logado.
    */
    function __construct() {
        session_start();
        if (isset($_SESSION['user1'])) $this->usuario1 = $_SESSION['user1'];
        if (isset($_SESSION['user2'])) $this->usuario2 = $_SESSION['user2'];
    }
    
    /**
    *  Método que trata as requisições:
    *  POST - busca pelo email no banco e confere se a senha é igual. Se sim, usuário logado!
    *  GET  - se não logado, abre a página de login, senão mostra as informações do usuário
    */
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST['nick1'] != $_POST['nick2']){
		$usuario1 = Usuario::buscar($_POST['nick1']);
            	$usuario2 = Usuario::buscar($_POST['nick2']);
            
	    	if (!is_null($usuario1)) {
                	$_SESSION['user1'] = $this->usuario1 = $usuario1;
            	}else{
		 	$usuario1 = new Usuario($_POST['nick1'], 0);
                 	$usuario1->salvar();
            	}
             
	    	if (!is_null($usuario2)) {
                	$_SESSION['user2'] = $this->usuario2 = $usuario2;
            	}else{
 			$usuario2 = new Usuario($_POST['nick2'], 0);
                	$usuario2->salvar();
            	}
                header('Location: index.php?acao=ranking');
            }else{
            	$this->view('login');

            }
            
            
        } else {
            $this->view('login');
        }
    }

   public function ranking() {
        $rank = Usuario::ranking();
	
        $this->view('ranking', $rank);   
    }

   
}

?>
