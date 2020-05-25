<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

// Carregando automaticamente a classe
function __autoload($class_name) {
    require_once '../admin/modelo/'. $class_name . '.php';
}

$arquivos = new ArquivosPDO();

//Pegando a data e hora atual
$data = date("d-m-Y");

//Pegando a hora atual
$hora = date("H:i:s");

try {
    $arquivos->setTb_user_id(2);
        $arquivos->setTb_user_directors_id(2);
        $arquivos->setTb_arquivos_venc_boleto("10-10-2019");
        $arquivos->setTb_arquivos_hash_boleto("asfvafgagagasgas");
        $arquivos->setTb_arquivos_vigencia_contrato("20-03-2020");
        $arquivos->setTb_arquivos_hash_contrato("fadsgfasdgasdadsgas");
        $arquivos->setTb_arquivos_proposta("20-03-2020");
        $arquivos->setTb_arquivos_hash_proposta("fadsgfasdgasdadsgas");
        $arquivos->setTb_arquivos_hash_nfe("fadsgfasdgasdadsgas");
        $arquivos->setTb_arquivos_hash_sla("fadsgfasdgasdadsgas");
        $arquivos->setTb_arquivos_status_boleto("Aguardando pagamento");
        $arquivos->setTb_arquivos_date($data);
        $arquivos->setTb_arquivos_hour($hora);
    
    $arquivos->insert();
    
    echo "Legal, dados salvos com sucesso";
    
} catch (Exception $exc) {
    
    echo "Opps! DEU MERDA!"."<br>";
    echo $exc->getTraceAsString()."<br>";
    echo $exc->getMessage();
}
