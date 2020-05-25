<!DOCTYPE html>
<?php
//Criando uma sessão
session_start();

//Verificando se a sessão existe
require_once 'class/seguranca.php';

//Função que localiza automaticamente todas as Classes
function __autoload($class_name) {
    require_once './class/' . $class_name . '.php';
}
?>

<html>
    <head>
        <?php require_once './class/header.php'; //Requisitando configurações externas  ?>

        <meta charset="UTF-8">
        <title>Área do Cliente</title>
    </head>
    <body class="">
        <?php require_once './class/menu.php'; // Requisitando menu de funções  ?>

        <?php require_once './class/idUser.php'; // Requisitando identificação do usuário  ?>

        <?php
        // Verificando se o botão perfil foi clicado
        if (isset($_GET['profile']) && base64_decode($_GET['profile']) == "on") {
            require_once './view/profiles.php';

            // Verificando se o botão inicio foi clicado
        } else if (isset($_GET['start']) && base64_decode($_GET['start']) == "on") {
            require_once './view/main.php';
            
        } else if (isset($_GET['file']) && base64_decode($_GET['file']) == "on") {
            require_once './view/files.php';
            
        } else if (isset($_GET['ticket']) && base64_decode($_GET['ticket']) == "on") {
            require_once './view/open_ticket.php';
            
        } else if (isset($_GET['contrato']) && base64_decode($_GET['contrato']) == "on") {
            require_once '../area/view/contrato.php';
            
        } else if (isset($_GET['fiscais']) && base64_decode($_GET['fiscais']) == "on") {
            require_once '../area/view/boleto_nfe.php';
            
        } else if (isset($_GET['docs']) && base64_decode($_GET['docs']) == "on") {
            require_once '../area/view/verification_docs.php';
            
        } else if (isset($_GET['sla']) && base64_decode($_GET['sla']) == "on") {
            require_once '../area/view/sla.php';
            
        } else if (isset($_GET['down']) && base64_decode($_GET['down']) == "on") {
            require_once '../area/view/downloads_restritos.php';
            
        } else {
            require_once './view/main.php';
        }
        ?>


        <?php require_once './class/footer.php'; // Requisitando barra de Status ?>
    </body>
</html>
