<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

// Carregando automaticamente a classe
function __autoload($class_name) {
    require_once '../admin/modelo/'. $class_name . '.php';
}
$access = "access_log";
$log = new Logs();

foreach ($log->selectAccessLog($access) as $logs => $value){
    echo "ID: ".$value->tb_log_id."<br>";
    echo "Nome: ".$value->tb_log_name."<br>";
    echo "Tipo de Acesso: ".$value->tb_log_tipo_acesso."<br>";
    echo "Diretor: ".$value->tb_log_directors_id."<br>";
    echo "Usuário: ".$value->tb_log_user_id."<br>";
    echo "Data: ".$value->tb_log_date."<br>";
    echo "Hora: ".$value->tb_log_hour."<br><br>";
}

