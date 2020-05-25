<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

// Carregando automaticamente a classe
function __autoload($class_name) {
    require_once '../admin/modelo/'. $class_name . '.php';
}

$usuario = new UsuarioPDO();

try {
    $usuario->setTb_user_nome("Helio");
    $usuario->setTb_user_sobrenome("Santos de Alencar");
    $usuario->setTb_user_login("helio");
    $usuario->setTb_user_pass("123456");
    $usuario->setTb_user_fone_celular("11-94400-1302");
    $usuario->setTb_user_fone_fixo("11-94400-1302");
    $usuario->setTb_user_email("heliosantos@gmail.com");
    $usuario->setTb_user_empresa("HQ-InnIT");
    $usuario->setTb_user_ativo(1);
    
    $usuario->insert();
    
    echo "Legal, dados salvos com sucesso";
    
} catch (Exception $exc) {
    
    echo "Opps! Algo deu errado"."<br>";
    echo $exc->getTraceAsString()."<br>";
    echo $exc->getMessage();
}
