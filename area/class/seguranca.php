<?php

//Abrindo uma sessão com objeto
ob_start();

//Testando se objetos não estão vazios
if (($_SESSION['user_id'] == "") 
        || ($_SESSION['user_login'] == "")  
        || ($_SESSION['user_ativo'] == "")) {

    $_SESSION['loginErro'] = "Área restrita para clientes!";
    header('Location: ../client_area.php');
}

?>