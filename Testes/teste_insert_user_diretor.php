<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

// Carregando automaticamente a classe
function __autoload($class_name) {
    require_once '../admin/modelo/'. $class_name . '.php';
}

$usuario_diretor = new UsuarioDiretorPDO();

try {
    $usuario_diretor->setTb_user_directors_nome("Idalete");
    $usuario_diretor->setTb_user_directors_login("idalete");
    $usuario_diretor->setTb_user_directors_pass("idalete");
    $usuario_diretor->setTb_user_directors_ativo(1);
    
    $usuario_diretor->insert();
    
    echo "Legal, dados salvos com sucesso";
    
} catch (Exception $exc) {
    
    echo "Opps! Algo deu errado"."<br>";
    echo $exc->getTraceAsString()."<br>";
    echo $exc->getMessage();
}
