<?php

// Escode erros NOTICE
error_reporting(E_ERROR | E_WARNING | E_PARSE);

/**
* Conecta ao banco e cria o schema (tabela Usuários)
*/
include_once('modelos/Banco.php');
Banco::createSchema();

/**
* Cria uma instância do controlador para uso
*/
include_once('controladores/Login.php');
$controller = new LoginController();

/**
* Seleciona a rota correta.
*/
switch ($_GET['acao']) {
    case 'ranking':
        $controller->ranking();
        break;
    default:
        $controller->login();
}

?>
