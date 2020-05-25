<?php

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

// Carregando automaticamente a classe
function __autoload($class_name) {
    require_once '../admin/modelo/' . $class_name . '.php';
}

try {
    
    $arquivos = new ArquivosPDO();

    $arquivos->setTb_user_id(1);
    $arquivos->setTb_user_directors_id(3);
    $arquivos->setTb_arquivos_boletos("boleto-mes-outubro");
    $arquivos->setTb_arquivos_contratos("Contrato2");
    $arquivos->setTb_arquivos_nfe("002/19");
    $arquivos->setTb_arquivos_sla("vigente ate o momento");
    $arquivos->setTb_arquivos_sla("compensado");

    $arquivos->update(1);
    
    echo "Dados atualizados com sucesso!";
    
} catch (Exception $exc) {
    
    echo "DEU MERDA!";
    echo $exc->getTraceAsString()."<br>";
    echo $exc->getMessage()."<br>";
    
}



