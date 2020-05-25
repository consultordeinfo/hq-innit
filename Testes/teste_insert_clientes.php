<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

// Carregando automaticamente a classe
function __autoload($class_name) {
    require_once '../admin/modelo/'. $class_name . '.php';
}

$cliente = new ClientePDO();

try {
    $cliente->setTb_clientes_razao_social("ANEXO AUTOMOTIVA");
    $cliente->setTb_clientes_endereco("Rua Rio de Janeiro");
    $cliente->setTb_clientes_numero(1000);
    $cliente->setTb_clientes_complemento("");
    $cliente->setTb_clientes_bairro("Parque Solar II");
    $cliente->setTb_clientes_cidade("Santana de Parnaíba");
    $cliente->setTb_clientes_estado("São Paulo");
    $cliente->setTb_clientes_cnpj("99.999.999/9999-99");
    $cliente->setTb_clientes_ie("222.222.222");
    $cliente->setTb_clientes_im("333.333.333");
    
    $cliente->insert();
    
    echo "Legal, dados salvos com sucesso!";
    
} catch (Exception $exc) {
    
    echo "Opps! DEU MERDA"."<br>";
    echo $exc->getTraceAsString()."<br>";
    echo $exc->getMessage();
}
