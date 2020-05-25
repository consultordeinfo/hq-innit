<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

// Carregando automaticamente a classe
function __autoload($class_name) {
    require_once '../admin/modelo/'. $class_name . '.php';
}

$usuario = new UsuarioPDO();

foreach ($usuario->selectAll() as $user => $value){
    echo "Nome: ".$value->tb_user_nome."<br>";
    echo "Sobre nome: ".$value->tb_user_sobrenome."<br>";
    echo "Celular: ".$value->tb_user_fone_celular."<br><br>";
}

