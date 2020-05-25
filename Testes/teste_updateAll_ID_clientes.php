<?php

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

// Carregando automaticamente a classe
function __autoload($class_name) {
    require_once '../admin/modelo/' . $class_name . '.php';
}

try {
    
    $clientes = new ClientePDO();

    $clientes->setTb_clientes_razao_social("SHALOM");
    $clientes->setTb_clientes_endereco("Av. Tenente Marques");
    $clientes->setTb_clientes_numero("1212");
    $clientes->setTb_clientes_complemento("Sala 12");
    $clientes->setTb_clientes_bairro("Polvilho");
    $clientes->setTb_clientes_cidade("Cajamar");
    $clientes->setTb_clientes_estado("Sao Paulo");
    $clientes->setTb_clientes_estado("88.888.888/8888-88");
    $clientes->setTb_clientes_ie("333.333.333");
    $clientes->setTb_clientes_im("444.444.444");

    $clientes->update(2);
    
    echo "Dados atualizados com sucesso!";
    
} catch (Exception $exc) {
    
    echo "DEU MERDA!";
    echo $exc->getTraceAsString()."<br>";
    echo $exc->getMessage()."<br>";
    
}



