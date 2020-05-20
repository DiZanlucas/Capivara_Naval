<?php 

require 'controladores/Controlador.php';
require 'modelos/Usuario.php';


class LoginController extends Controller  {
    
    
    private $usuario1;

     
    private $usuario2;

    
    function __construct() {
        session_start();
        if (isset($_SESSION['user1'])) $this->usuario1 = $_SESSION['user1'];
        if (isset($_SESSION['user2'])) $this->usuario2 = $_SESSION['user2'];
    }
    
    
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

   public function ranking() {
        $rank = Usuario::ranking();
	
        $this->view('ranking', $rank);   
    }

   public function batalha() {
        
	
        $this->view('campobatalha');   
    }

   
}

?>
