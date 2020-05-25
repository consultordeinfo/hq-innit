<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

// Carregando automaticamente a classe
function __autoload($class_name) {
    require_once '../admin/modelo/'. $class_name . '.php';
}


$data = date("Ymd");
$hora = date("H:i:s");
$log = new Logs();


try {
    $log->setTb_log_name("delete_log");
    $log->setTb_log_tipo_acesso("open_chamado");
    $log->setTb_log_directors_id(4);
    $log->setTb_log_user_id(4);
    $log->setTb_log_date($data);
    $log->setTb_log_hour($hora);
    
    $log->insert();
    
    echo "Legal, dados salvos com sucesso";
    
} catch (Exception $exc) {
    
    echo "Opps! Algo deu errado"."<br>";
    echo $exc->getTraceAsString()."<br>";
    echo $exc->getMessage();
}
