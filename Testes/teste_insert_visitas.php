<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

// Carregando automaticamente a classe
function __autoload($class_name) {
    require_once '../admin/modelo/'. $class_name . '.php';
}

$visitas = new VisitaPDO();

//Pegando a data e hora atual
$data = date("d-m-Y");

//Pegando a hora atual
$hora = date("H:i:s");


try {
    $visitas->setTb_user_id(2);
    $visitas->setTb_user_directors_id(2);
    $visitas->setTb_visita_dia_preventiva("10-12-2009");
    $visitas->setTb_visita_status("Previsto");
    $visitas->setTb_visita_date($data);
    $visitas->setTb_visita_hour($hora);
    
    $visitas->insert();
    
    echo "Dados salvos com sucesso!";
    
} catch (Exception $exc) {
    
    echo "Opps! DEU MERDA!"."<br>";
    echo $exc->getTraceAsString()."<br>";
    echo $exc->getMessage();
}
