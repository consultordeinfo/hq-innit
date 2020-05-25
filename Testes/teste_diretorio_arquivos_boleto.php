<?php

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

// Carregando automaticamente a classe
function __autoload($class_name) {
    require_once '../admin/modelo/' . $class_name . '.php';
}

//estanciando um Objeto
$manipular = new Manipular_arquivos();
$boletos = new BoletosPDO();
$sla = new SlaPDO();

//Unindo caminho e diretório
$caminho = '../area/file_tools/';

//Pegando a data e hora atual
$data = date("d-m-Y");

//Pegando a hora atual
$hora = date("H:i:s");


//Tratamento de erros
try {
    //Verificando se diretório existe
    if ($manipular->manipulador($caminho) == true) {

        $extensao = strtolower(substr($_FILES['fileToUpload']['name'], -4));
        $novo_nome = md5(time()) . $extensao;

        //Inserindo a informação no Objeto
        move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $caminho . $novo_nome);

        //Inserindo no banco
//        $boletos->setTb_user_id(2);
//        $boletos->setTb_user_directors_id(2);
//        $boletos->setTb_boleto_venc_boleto("10-10-2019");
//        $boletos->setTb_boleto_hash_boleto($novo_nome);
//        $boletos->setTb_boleto_hash_nfe($novo_nome);
//        $boletos->setTb_boleto_status_boleto("Aguardando pagamento");
//        $boletos->setTb_boleto_date($data);
//        $boletos->setTb_boleto_hour($hora);
        
        //Inserindo no banco
//        $boletos->setTb_user_id(2);
//        $boletos->setTb_user_directors_id(2);
//        $boletos->setTb_boleto_hash_sla($novo_nome);
//        $boletos->setTb_boleto_date($data);
//        $boletos->setTb_boleto_hour($hora);
        
        //Inserido dados da SLA
        $sla->setTb_user_id(11);
        $sla->setTb_user_directors_id(0);
        $sla->setTb_sla_hash($novo_nome);
        $sla->setTb_sla_date($data);
        $sla->setTb_sla_hour($hora);
        
        $sla->insert();       
//        $boletos->insert();

        echo "Dados salvos com sucesso!";
    }
    
} catch (Exception $exc) {
    echo "Opps! Algo aconteceu, arquivo não foi carregado..." . "<br>";
    echo $exc->getTraceAsString();
}



