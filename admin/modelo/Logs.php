<?php
require_once '../../admin/pdo/Crud.php';

class Logs  extends Crud{
    // Atributo protegido para uso de tabela
    protected $table = 'tb_log';
    
    //Atributos da classe
    private $tb_log_id;
    private $tb_log_name;
    private $tb_log_directors_id;
    private $tb_log_user_id;
    private $tb_log_date;
    private $tb_log_hour;

    //Metodos de acesso
    function getTable() {
        return $this->table;
    }

    function getTb_log_id() {
        return $this->tb_log_id;
    }

    function getTb_log_name() {
        return $this->tb_log_name;
    }

    function getTb_log_directors_id() {
        return $this->tb_log_directors_id;
    }

    function getTb_log_user_id() {
        return $this->tb_log_user_id;
    }

    function getTb_log_date() {
        return $this->tb_log_date;
    }

    function getTb_log_hour() {
        return $this->tb_log_hour;
    }

    function setTable($table) {
        $this->table = $table;
    }

    function setTb_log_id($tb_log_id) {
        $this->tb_log_id = $tb_log_id;
    }

    function setTb_log_name($tb_log_name) {
        $this->tb_log_name = $tb_log_name;
    }

    function setTb_log_directors_id($tb_log_directors_id) {
        $this->tb_log_directors_id = $tb_log_directors_id;
    }

    function setTb_log_user_id($tb_log_user_id) {
        $this->tb_log_user_id = $tb_log_user_id;
    }

    function setTb_log_date($tb_log_date) {
        $this->tb_log_date = $tb_log_date;
    }

    function setTb_log_hour($tb_log_hour) {
        $this->tb_log_hour = $tb_log_hour;
    }

    //Funções da Classe
    // METODO PARA INSERIR DADOS DE LOG
    public function insert() {
        
        $sql = "INSERT INTO $this->table("
                . "tb_log_name,"
                . "tb_log_directors_id,"
                . "tb_log_user_id,"
                . "tb_log_date,"
                . "tb_log_hour)"
                . "VALUES (?,?,?,?,?)";
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $this->tb_log_name);
        $stmt->bindParam(2, $this->tb_log_directors_id);
        $stmt->bindParam(3, $this->tb_log_user_id);
        $stmt->bindParam(4, $this->tb_log_date);
        $stmt->bindParam(5, $this->tb_log_hour);
        
        $stmt->execute();
    }

    // METODO PARA ALTERAR DADOS DE LOG
    public function update($id) {
        
    }
    
    // METODO PARA LISTAR DADOS DE LOG POR TIPO DE ACESSO
    public function selectAccessLog($access){
        $sql = "SELECT * FROM $this->table WHERE tb_log_name = ? ORDER BY tb_log_date";
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $access);
        
        $stmt->execute();
        
        return $stmt->fetchall();
    }
    
    // METODO PARA LISTAR DADOS DE LOG POR TIPO DE ACESSO
    public function selectDeleteLog($delete){
        $sql = "SELECT * FROM $this->table WHERE tb_log_name = ? ORDER BY tb_log_date";
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $access);
        
        $stmt->execute();
        
        return $stmt->fetchall();
    }

}
