<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

// Carregando automaticamente a classe
function __autoload($class_name) {
    require_once '../admin/modelo/'. $class_name . '.php';
}

$usuarioDiretor = new UsuarioDiretorPDO;

foreach ($usuarioDiretor->selectAllID(1) as $user => $value){
    echo "Nome: ".$value->tb_user_directors_nome."<br>";
    echo "Login: ".$value->tb_user_directors_login."<br>";
    echo "Senha: ".$value->tb_user_directors_pass."<br>";
    echo "Ativo: ".$value->tb_user_directors_ativo."<br>";
}

