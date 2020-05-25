<?php

/*
 * @author HQ-InnIT
 */

class Manipular_arquivos {

    //Atributos da classe
    private $nome_diretorio;
    private $nome_arquivo;
    private $caminho_diretorio;

    //Metodos de acesso
    function getNome_diretorio() {
        return $this->nome_diretorio;
    }

    function getNome_arquivo() {
        return $this->nome_arquivo;
    }

    function getCaminho_diretorio() {
        return $this->caminho_diretorio;
    }

    function setNome_diretorio($nome_diretorio) {
        $this->nome_diretorio = $nome_diretorio;
    }

    function setNome_arquivo($nome_arquivo) {
        $this->nome_arquivo = $nome_arquivo;
    }

    function setCaminho_diretorio($caminho_diretorio) {
        $this->caminho_diretorio = $caminho_diretorio;
    }

    //Metodo para criação de novos diretórios
    public function manipulador(String $caminho) {
        //Tratamento de erros
        try {
            //Testando se exite o arquivo
            if (!file_exists($caminho)) {
                mkdir($caminho);
                chmod($caminho, 0777);
                
                echo "Novo diretório criado!..."."<br>";
                
            }
            
            return $file = true;
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            
            return $file = false;
        }
    }

}
