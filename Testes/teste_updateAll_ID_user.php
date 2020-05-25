<?php

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

// Carregando automaticamente a classe
function __autoload($class_name) {
    require_once '../admin/modelo/' . $class_name . '.php';
}

try {
    
    $usuario = new UsuarioPDO();

    $usuario->setTb_user_nome("Cynthia");
    $usuario->setTb_user_sobrenome("Felix Alves");
    $usuario->setTb_user_fone_celular("11-99999-9999");
    $usuario->setTb_user_fone_fixo("11-88888-8888");
    $usuario->setTb_user_email("carlos@ig.com.br");
    $usuario->setTb_user_empresa("HQ-InnIT");

    $usuario->update(4);
    
    echo "Dados atualizados com sucesso!";
    
} catch (Exception $exc) {
    
    echo "DEU MERDA!";
    echo $exc->getTraceAsString()."<br>";
    echo $exc->getMessage()."<br>";
    
}



