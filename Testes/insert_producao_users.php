<?php

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

// Carregando automaticamente a classe
function __autoload($class_name) {
    require_once '../admin/modelo/' . $class_name . '.php';
}

try {

    $usuarios = new UsuarioPDO();
    $diretores = new UsuarioDiretorPDO();
    $clientes = new ClientePDO();

//Inserindo usuários dos sistema
    $usuarios->setTb_user_nome("Alexandre");
    $usuarios->setTb_user_sobrenome("");
    $usuarios->setTb_user_login("alexandre");
    $usuarios->setTb_user_pass("1097");
    $usuarios->setTb_user_fone_celular("");
    $usuarios->setTb_user_fone_fixo("11-4156-9130");
    $usuarios->setTb_user_email("alexandre@axelps.com.br");
    $usuarios->setTb_user_empresa("AXEL QUÍMICA");
    $usuarios->setTb_user_ativo("1");

//Inserindo usuários dos sistema - Diretores
//    $diretores->setTb_user_directors_nome("Sandra");
//    $diretores->setTb_user_directors_login("sandra");
//    $diretores->setTb_user_directors_pass("4512");
//    $diretores->setTb_user_directors_celular("11-98585-4452");
//    $diretores->setTb_user_directors_fone_fixo("11-4156-9130");
//    $diretores->setTb_user_directors_email("sandraveronesi@axelps.com.br");
//    $diretores->setTb_user_directors_empresa("AXEL QUÍMICA");
//    $diretores->setTb_user_directors_ativo("1");


//Inserindo Clientes
//    $clientes->setTb_clientes_razao_social("Vinicius de Araujo Fabricação de Produtos Quimicos EPP");
//    $clientes->setTb_clientes_endereco("Av. Tenente Marques");
//    $clientes->setTb_clientes_numero("4677");
//    $clientes->setTb_clientes_complemento("");
//    $clientes->setTb_clientes_bairro("Ipes");
//    $clientes->setTb_clientes_cidade("Cajamar");
//    $clientes->setTb_clientes_estado("SP");
//    $clientes->setTb_clientes_cnpj("66.773.458.0001/91");


    $usuarios->insert();
//    $diretores->insert();
//    $clientes->insert();

    echo "Dados salvos com sucesso!";
} catch (Exception $exc) {
    echo "Opss! Algo deu errado, tente novamente!";
    echo $exc->getTraceAsString();
    echo $exc->getMessage();
}

