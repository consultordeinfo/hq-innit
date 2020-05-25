<?php
 require_once './../admin/pdo/Crud.php';

class SlaPDO extends Crud{
    // Atributo protegido para uso de tabela
    protected $table = 'tb_sla';
    
    // Atributos
    private $tb_sla_id;
    private $tb_user_id;
    private $tb_user_directors_id;
    private $tb_sla_hash;
    private $tb_sla_date;
    private $tb_sla_hour;

    //Metodos de acesso
    function getTable() {
        return $this->table;
    }

    function getTb_sla_id() {
        return $this->tb_sla_id;
    }

    function getTb_user_id() {
        return $this->tb_user_id;
    }

    function getTb_user_directors_id() {
        return $this->tb_user_directors_id;
    }

    function getTb_sla_hash() {
        return $this->tb_sla_hash;
    }

    function getTb_sla_date() {
        return $this->tb_sla_date;
    }

    function getTb_sla_hour() {
        return $this->tb_sla_hour;
    }

    function setTable($table) {
        $this->table = $table;
    }

    function setTb_sla_id($tb_sla_id) {
        $this->tb_sla_id = $tb_sla_id;
    }

    function setTb_user_id($tb_user_id) {
        $this->tb_user_id = $tb_user_id;
    }

    function setTb_user_directors_id($tb_user_directors_id) {
        $this->tb_user_directors_id = $tb_user_directors_id;
    }

    function setTb_sla_hash($tb_sla_hash) {
        $this->tb_sla_hash = $tb_sla_hash;
    }

    function setTb_sla_date($tb_sla_date) {
        $this->tb_sla_date = $tb_sla_date;
    }

    function setTb_sla_hour($tb_sla_hour) {
        $this->tb_sla_hour = $tb_sla_hour;
    }

    
            
    
    // METODO PARA INSERIR DADOS DO ARQUIVOS
    public function insert() {
        
        $sql = "INSERT INTO $this->table("
                . "tb_user_id,"
                . "tb_user_directors_id,"
                . "tb_sla_hash,"
                . "tb_sla_date,"
                . "tb_sla_hour)"
                . "VALUES (?,?,?,?,?)";
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $this->tb_user_id);
        $stmt->bindParam(2, $this->tb_user_directors_id);
        $stmt->bindParam(3, $this->tb_sla_hash);
        $stmt->bindParam(4, $this->tb_sla_date);
        $stmt->bindParam(5, $this->tb_sla_hour);
        
        $stmt->execute();
    }

    // METODO PARA ALTERAR DADOS DE ARQUIVOS - BOLETOS 
    public function updateSla($id) {
        $sql = "UPDATE $this->table SET tb_sla_hash = ?"
                . "WHERE tb_rede_id = ?";
                
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $this->tb_sla_hash);
        $stmt->bindParam(2, $id);
        
        $stmt->execute();
    }
    
    
    // METODO PARA LISTAR DADOS DO USUÁRIO POR ID
    public function selectAllID($id){
        $sql = "SELECT * FROM $this->table WHERE tb_user_id = ?";
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $id);
        
        $stmt->execute();
        
        return $stmt->fetchall();
    }

    
    
    public function delete($id){
        $sql = "DELETE FROM $this->table WHERE tb_sla_id = ?";
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        
        $stmt->execute();
    }

    public function update($id) {
        
    }

}
