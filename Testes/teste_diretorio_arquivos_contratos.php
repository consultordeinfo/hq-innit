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
$contratos = new ContratoPDO();
$rede = new RedePDO();
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

        //Inserindo no banco - CONTRATO
//        $contratos->setTb_user_id(2);
//        $contratos->setTb_user_directors_id(2);
//        $contratos->setTb_contrato_data_assinatura("14-06-2019");
//        $contratos->setTb_contrato_tipo_documento("Contrato");
//        $contratos->setTb_contrato_hash_documento($novo_nome);
//        $contratos->setTb_contrato_date($data);
//        $contratos->setTb_contrato_hour($hora);
        
        //Inserindo no banco - PROPOSTA
//        $contratos->setTb_user_id(2);
//        $contratos->setTb_user_directors_id(2);
//        $contratos->setTb_contrato_data_assinatura("21-05-2019");
//        $contratos->setTb_contrato_tipo_documento("Proposta");
//        $contratos->setTb_contrato_hash_documento($novo_nome);
//        $contratos->setTb_contrato_date($data);
//        $contratos->setTb_contrato_hour($hora);
        
        //Inserindo no banco - ADENDO
//        $contratos->setTb_user_id(2);
//        $contratos->setTb_user_directors_id(2);
//        $contratos->setTb_contrato_data_assinatura("14-06-2019");
//        $contratos->setTb_contrato_tipo_documento("Adendo");
//        $contratos->setTb_contrato_hash_documento($novo_nome);
//        $contratos->setTb_contrato_date($data);
//        $contratos->setTb_contrato_hour($hora);
        
        //Inserindo no banco de redes
//        $rede->setTb_rede_directors_id(1);
//        $rede->setTb_rede_data_atualizacao("09-10-2019");
//        $rede->setTb_rede_descricao("Documetação de rede - v.01");
//        $rede->setTb_rede_hash($novo_nome);
//        $rede->setTb_rede_date($data);
//        $rede->setTb_rede_hour($hora);
        
        //Inserindo no banco de SLA
        $sla->setTb_user_id(10);
        $sla->setTb_user_directors_id(0);
        $sla->setTb_sla_hash($novo_nome);
        $sla->setTb_sla_date($data);
        $sla->setTb_sla_hour($hora);
        
        $sla->insert();
        //$rede->insert();
        //$contratos->insert();

        echo "Dados salvos com sucesso!";
    }
    
} catch (Exception $exc) {
    echo "Opps! Algo aconteceu, arquivo não foi carregado..." . "<br>";
    echo $exc->getTraceAsString();
}



