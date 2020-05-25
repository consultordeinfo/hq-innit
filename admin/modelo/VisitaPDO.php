<?php
 require_once './../admin/pdo/Crud.php';

class VisitaPDO extends Crud{
    // Atributo protegido para uso de tabela
    protected $table = 'tb_visita';
    
    // Atributos
    private $tb_visita_id;
    private $tb_user_id;
    private $tb_user_directors_id;
    private $tb_visita_dia_preventiva;
    private $tb_visita_status;
    private $tb_visita_date;
    private $tb_visita_hour;

    //Metodos de acesso
    function getTable() {
        return $this->table;
    }

    function getTb_visita_id() {
        return $this->tb_visita_id;
    }

    function getTb_user_id() {
        return $this->tb_user_id;
    }

    function getTb_user_directors_id() {
        return $this->tb_user_directors_id;
    }

    function getTb_visita_dia_preventiva() {
        return $this->tb_visita_dia_preventiva;
    }

    function getTb_visita_status() {
        return $this->tb_visita_status;
    }

    function getTb_visita_date() {
        return $this->tb_visita_date;
    }

    function getTb_visita_hour() {
        return $this->tb_visita_hour;
    }

    function setTable($table) {
        $this->table = $table;
    }

    function setTb_visita_id($tb_visita_id) {
        $this->tb_visita_id = $tb_visita_id;
    }

    function setTb_user_id($tb_user_id) {
        $this->tb_user_id = $tb_user_id;
    }

    function setTb_user_directors_id($tb_user_directors_id) {
        $this->tb_user_directors_id = $tb_user_directors_id;
    }

    function setTb_visita_dia_preventiva($tb_visita_dia_preventiva) {
        $this->tb_visita_dia_preventiva = $tb_visita_dia_preventiva;
    }

    function setTb_visita_status($tb_visita_status) {
        $this->tb_visita_status = $tb_visita_status;
    }

    function setTb_visita_date($tb_visita_date) {
        $this->tb_visita_date = $tb_visita_date;
    }

    function setTb_visita_hour($tb_visita_hour) {
        $this->tb_visita_hour = $tb_visita_hour;
    }

    // METODO PARA INSERIR DADOS PARA VISITAS
    public function insert() {
        
        $sql = "INSERT INTO $this->table("
                . "tb_user_id,"
                . "tb_user_directors_id,"
                . "tb_visita_dia_preventiva,"
                . "tb_visita_status,"
                . "tb_visita_date,"
                . "tb_visita_hour)"
                . "VALUES (?,?,?,?,?,?)";
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $this->tb_user_id);
        $stmt->bindParam(2, $this->tb_user_directors_id);
        $stmt->bindParam(3, $this->tb_visita_dia_preventiva);
        $stmt->bindParam(4, $this->tb_visita_status);
        $stmt->bindParam(5, $this->tb_visita_date);
        $stmt->bindParam(6, $this->tb_visita_hour);
        
        $stmt->execute();
    }

    // METODO PARA ALTERAR DADOS DE VISITAS 
    public function update($id) {
        $sql = "UPDATE $this->table SET tb_visita_dia_preventiva = ?"
                . "WHERE tb_visita_status = ?";
                
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $this->tb_visita_dia_preventiva);
        $stmt->bindParam(2, $this->tb_visita_status);
        $stmt->bindParam(3, $id);
        
        $stmt->execute();
    }
    
    
    // METODO PARA LISTAR DADOS DE VISITAS
    public function selectAllID($id){
        $sql = "SELECT * FROM $this->table WHERE tb_user_id = ?";
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $id);
        
        $stmt->execute();
        
        return $stmt->fetchall();
    }

    
    // METODO PARA DELETA DADOS DE VISITAS
    public function delete($id){
        $sql = "DELETE FROM $this->table WHERE tb_visita_id = ?";
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        
        $stmt->execute();
    }

    

}
