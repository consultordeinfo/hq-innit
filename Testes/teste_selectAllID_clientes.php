<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

// Carregando automaticamente a classe
function __autoload($class_name) {
    require_once '../admin/modelo/'. $class_name . '.php';
}

$clientes = new ClientePDO();

foreach ($clientes->selectAllID(2) as $user => $value){
    echo "Nome: ".$value->tb_clientes_razao_social."<br>";
    echo "Endereço: ".$value->tb_clientes_endereco."<br>";
    echo "Numero: ".$value->tb_clientes_numero."<br>";
    echo "Complemento: ".$value->tb_clientes_complemento."<br>";
    echo "Bairro: ".$value->tb_clientes_bairro."<br>";
    echo "Cidade: ".$value->tb_clientes_cidade."<br>";
    echo "Estado: ".$value->tb_clientes_estado."<br>";
    echo "Cnpj: ".$value->tb_clientes_cnpj."<br>";
    echo "IE: ".$value->tb_clientes_ie."<br>";
    echo "IM: ".$value->tb_clientes_im."<br>";
}

