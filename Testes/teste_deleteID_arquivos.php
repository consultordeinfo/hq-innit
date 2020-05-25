<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

// Carregando automaticamente a classe
function __autoload($class_name) {
    require_once '../admin/modelo/'. $class_name . '.php';
}

$arquivos = new ArquivosPDO();

try {
    if(isset($_POST['delete']) && isset($_POST['hash'])){
        $caminho = '../area/file_tools/'.$_POST['hash'];
        unlink($caminho);
        
        $var = $_POST['delete'];
        $arquivos->delete($var);
        
        echo "Arquivo deletado com sucesso";
    }
} catch (Exception $exc) {
    echo "DEU MERDA!"."<br>";
    echo $exc->getTraceAsString();
}



