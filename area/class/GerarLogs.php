<?php

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

// Carregando automaticamente a classe
function __autoload($class_name) {
    require_once '../../admin/modelo/' . $class_name . '.php';
}

//Pegando data e Hora
$data = date("d-m-Y");
$hora = date("H:i:s");

//Estanciando objetos
$log = new Logs();

try {
    //Baixando arquivo de boleto e registrando log de acesso
    if (isset($_POST['log_boleto']) != null && isset($_POST['download']) != null) {
        //Gerando logs de acesso
        $log->setTb_log_name($_SESSION['down_boleto']);
        $log->setTb_log_user_id($_SESSION['user_id']);
        $log->setTb_log_directors_id($_SESSION['director_id']);
        $log->setTb_log_date($data);
        $log->setTb_log_hour($hora);

        $log->insert();

        //Pegando o post
        $caminho = $_POST['download'];
        // informa o tamanho do arquivo ao navegador
        header("Content-Length: " . filesize($caminho));

        // informa ao navegador que é tipo anexo e faz abrir a janela de download, 
        //tambem informa o nome do arquivo
        header("Content-Disposition: attachment; filename=" . basename($caminho));

        readfile($caminho); // lê o arquivo
    
    //Baixando arquivo de NF-e e registrando log de acesso
    } else if (isset($_POST['log_nfe']) != null && isset($_POST['download']) != null) {
        //Gerando logs de acesso
        $log->setTb_log_name($_SESSION['down_nfe']);
        $log->setTb_log_user_id($_SESSION['user_id']);
        $log->setTb_log_directors_id($_SESSION['director_id']);
        $log->setTb_log_date($data);
        $log->setTb_log_hour($hora);

        $log->insert();

        //Pegando o post
        $caminho = $_POST['download'];
        // informa o tamanho do arquivo ao navegador
        header("Content-Length: " . filesize($caminho));

        // informa ao navegador que é tipo anexo e faz abrir a janela de download, 
        //tambem informa o nome do arquivo
        header("Content-Disposition: attachment; filename=" . basename($caminho));

        readfile($caminho); // lê o arquivo
    
    //Baixando arquivos de contrato e registrando log de acesso
    }else if (isset($_POST['log_contrato']) != null && isset($_POST['download']) != null) {
        //Gerando logs de acesso
        $log->setTb_log_name($_SESSION['down_contrato']);
        $log->setTb_log_user_id($_SESSION['user_id']);
        $log->setTb_log_directors_id($_SESSION['director_id']);
        $log->setTb_log_date($data);
        $log->setTb_log_hour($hora);

        $log->insert();

        //Pegando o post
        $caminho = $_POST['download'];
        // informa o tamanho do arquivo ao navegador
        header("Content-Length: " . filesize($caminho));

        // informa ao navegador que é tipo anexo e faz abrir a janela de download, 
        //tambem informa o nome do arquivo
        header("Content-Disposition: attachment; filename=" . basename($caminho));

        readfile($caminho); // lê o arquivo
        
    }
    
} catch (Exception $exc) {
    echo "Opss! Algo aconteceu e download do arquivo não pode ser feito!"."<br>";
    echo $exc->getTraceAsString();
}




