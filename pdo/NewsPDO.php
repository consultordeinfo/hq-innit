<?php
require_once 'Crud.php';

class NewsPDO extends Crud{
    // ATRIBUTO PROTEGIDO
    protected $table = 'tb_news';
    
    // ATRIBUTOS
    private $tb_news_id;
    private $tb_news_nome;
    private $tb_news_email;
    private $tb_news_fone_cel;
    private $tb_news_fone_fixo;
    private $tb_news_empresa;
    private $tb_news_assunto;
    private $tb_news_data_envio;
    private $tb_news_hora_envio;
    private $tb_news_autoriza;
    
    // METODOS DE ACESSO
    function getTable() {
        return $this->table;
    }

    function getTb_news_id() {
        return $this->tb_news_id;
    }

    function getTb_news_nome() {
        return $this->tb_news_nome;
    }

    function getTb_news_email() {
        return $this->tb_news_email;
    }

    function getTb_news_fone_cel() {
        return $this->tb_news_fone_cel;
    }

    function getTb_news_fone_fixo() {
        return $this->tb_news_fone_fixo;
    }

    function getTb_news_empresa() {
        return $this->tb_news_empresa;
    }

    function getTb_news_assunto() {
        return $this->tb_news_assunto;
    }

    function getTb_news_data_envio() {
        return $this->tb_news_data_envio;
    }

    function getTb_news_hora_envio() {
        return $this->tb_news_hora_envio;
    }

    function getTb_news_autoriza() {
        return $this->tb_news_autoriza;
    }

    function setTable($table) {
        $this->table = $table;
    }

    function setTb_news_id($tb_news_id) {
        $this->tb_news_id = $tb_news_id;
    }

    function setTb_news_nome($tb_news_nome) {
        $this->tb_news_nome = $tb_news_nome;
    }

    function setTb_news_email($tb_news_email) {
        $this->tb_news_email = $tb_news_email;
    }

    function setTb_news_fone_cel($tb_news_fone_cel) {
        $this->tb_news_fone_cel = $tb_news_fone_cel;
    }

    function setTb_news_fone_fixo($tb_news_fone_fixo) {
        $this->tb_news_fone_fixo = $tb_news_fone_fixo;
    }

    function setTb_news_empresa($tb_news_empresa) {
        $this->tb_news_empresa = $tb_news_empresa;
    }

    function setTb_news_assunto($tb_news_assunto) {
        $this->tb_news_assunto = $tb_news_assunto;
    }

    function setTb_news_data_envio($tb_news_data_envio) {
        $this->tb_news_data_envio = $tb_news_data_envio;
    }

    function setTb_news_hora_envio($tb_news_hora_envio) {
        $this->tb_news_hora_envio = $tb_news_hora_envio;
    }

    function setTb_news_autoriza($tb_news_autoriza) {
        $this->tb_news_autoriza = $tb_news_autoriza;
    }

        
    // METODO PARA INSERIR DADOS NO BANCO
    public function insert() {
        $sql = "INSERT INTO $this->table("
                . "tb_news_nome,"
                . "tb_news_email,"
                . "tb_news_fone_cel,"
                . "tb_news_fone_fixo,"
                . "tb_news_empresa,"
                . "tb_news_assunto,"
                . "tb_news_data_envio,"
                . "tb_news_hora_envio,"
                . "tb_news_autoriza)"
                . "VALUES ("
                . ":tb_news_nome,"
                . ":tb_news_email,"
                . ":tb_news_fone_cel,"
                . ":tb_news_fone_fixo,"
                . ":tb_news_empresa,"
                . ":tb_news_assunto,"
                . ":tb_news_data_envio,"
                . ":tb_news_hora_envio,"
                . ":tb_news_autoriza)";
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(':tb_news_nome', $this->tb_news_nome);
        $stmt->bindParam(':tb_news_email', $this->tb_news_email);
        $stmt->bindParam(':tb_news_fone_cel', $this->tb_news_fone_cel);
        $stmt->bindParam(':tb_news_fone_fixo', $this->tb_news_fone_fixo);
        $stmt->bindParam(':tb_news_empresa', $this->tb_news_empresa);
        $stmt->bindParam(':tb_news_assunto', $this->tb_news_assunto);
        $stmt->bindParam(':tb_news_data_envio', $this->tb_news_data_envio);
        $stmt->bindParam(':tb_news_hora_envio', $this->tb_news_hora_envio);
        $stmt->bindParam(':tb_news_autoriza', $this->tb_news_autoriza);
        
        $stmt->execute();
    }

    public function update($id) {
        
    }

}
