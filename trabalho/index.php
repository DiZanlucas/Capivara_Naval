<?php


error_reporting(E_ERROR | E_WARNING | E_PARSE);


include_once('modelos/Banco.php');
Banco::createSchema();


include_once('controladores/Login.php');
$controller = new LoginController();


switch ($_GET['acao']) {
    case 'ranking':
        $controller->ranking();
        break;
    case 'batalha':
        $controller->batalha();
        break;
    default:
        $controller->login();
}

?>
