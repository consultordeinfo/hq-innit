<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

// Carregando automaticamente a classe
function __autoload($class_name) {
    require_once '../admin/modelo/'. $class_name . '.php';
}

$arquivos = new ArquivosPDO();

foreach ($arquivos->selectAllID(1) as $file => $value){
    echo "ID do usuário: ".$value->tb_user_id."<br>";
    echo "ID do diretor: ".$value->tb_user_directors_id."<br>";
    echo "Boleto: ".$value->tb_arquivos_boletos."<br>";
    echo "Contratos: ".$value->tb_arquivos_contratos."<br>";
    echo "Notas Fiscais: ".$value->tb_arquivos_nfe."<br>";
    echo "SLA: ".$value->tb_arquivos_sla."<br>";
    echo "Status do Boleto: ".$value->tb_arquivos_status_boleto."<br>";
    echo "Data de cadastro no sistema: ".$value->tb_arquivos_date."<br>";
    echo "hora de cadastro no sistema: ".$value->tb_arquivos_hour."<br><br>";
}

