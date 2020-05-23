<?php 

require 'controladores/Controlador.php';
require 'modelos/Usuario.php';

/**
* Controlador do login.
*/
class LoginController extends Controller  {
    
    /**
    * armazena o usuário 1 logado na partida.
    */    
    private $usuario1;

    /**
    * armazena o usuário 2 logado na partida.
    */ 
    private $usuario2;

    /**
    *  Construtor da classe. 
    *  Inicia a sessão dos usuários.
    */
    function __construct() {
        session_start();
        if (isset($_SESSION['user1'])) $this->usuario1 = $_SESSION['user1'];
        if (isset($_SESSION['user2'])) $this->usuario2 = $_SESSION['user2'];
    }
    
    /**
    *  Método que trata as requisições:
    *  POST - busca pelo usuário no banco se existir loga, se não cria um novo.
    *  Se os nicks forem iguais retorna ao login, se um dos nicks for vazio também.
    */
    public function login() {
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             if (empty($_POST['nick1']) or  empty($_POST['nick2'])){
		$this->view('login');

              }else {
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
                   header('Location: index.php?acao=batalha');
               }else {
            	   $this->view('login');

               }
            
            }
        }else {
            $this->view('login');

        }
    }

    /**
    *  Chama ranking() que retorna um vetor com os 5 usuários com maior pontuação, e salva em $rank para ser listado.
    */
   public function ranking() {
        $rank = Usuario::ranking();
	
        $this->view('ranking', $rank);   
    }

    /**
    *  Após os usuários serem logados direciona para a view do campo de batalha.
    */
   public function batalha() {
        
	
        $this->view('campobatalha');   
    }

   
}

?>
