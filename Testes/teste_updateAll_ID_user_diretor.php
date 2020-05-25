<?php

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

// Carregando automaticamente a classe
function __autoload($class_name) {
    require_once '../admin/modelo/' . $class_name . '.php';
}

try {
    
    $usuarioDiretor = new UsuarioDiretorPDO;

    $usuarioDiretor->setTb_user_directors_nome("Rafaela");
    $usuarioDiretor->setTb_user_directors_ativo("0");

    $usuarioDiretor->update(2);
    
    echo "Dados atualizados com sucesso!";
    
} catch (Exception $exc) {
    
    echo "DEU MERDA!";
    echo $exc->getTraceAsString()."<br>";
    echo $exc->getMessage()."<br>";
    
}



