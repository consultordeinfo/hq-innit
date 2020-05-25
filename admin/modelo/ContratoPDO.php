<?php
 require_once './../admin/pdo/Crud.php';

class ContratoPDO extends Crud{
    // Atributo protegido para uso de tabela
    protected $table = 'tb_contrato';
    
    // Atributos
    private $tb_contrato_id;
    private $tb_user_id;
    private $tb_user_directors_id;
    private $tb_contrato_data_assinatura;
    private $tb_contrato_tipo_documento;
    private $tb_contrato_hash_documento;
    private $tb_contrato_date;
    private $tb_contrato_hour;

    //Metodos de acesso
    function getTable() {
        return $this->table;
    }

    function getTb_contrato_id() {
        return $this->tb_contrato_id;
    }

    function getTb_user_id() {
        return $this->tb_user_id;
    }

    function getTb_user_directors_id() {
        return $this->tb_user_directors_id;
    }

    function getTb_contrato_data_assinatura() {
        return $this->tb_contrato_data_assinatura;
    }

    function getTb_contrato_tipo_documento() {
        return $this->tb_contrato_tipo_documento;
    }

    function getTb_contrato_hash_documento() {
        return $this->tb_contrato_hash_documento;
    }

    function getTb_contrato_date() {
        return $this->tb_contrato_date;
    }

    function getTb_contrato_hour() {
        return $this->tb_contrato_hour;
    }

    function setTable($table) {
        $this->table = $table;
    }

    function setTb_contrato_id($tb_contrato_id) {
        $this->tb_contrato_id = $tb_contrato_id;
    }

    function setTb_user_id($tb_user_id) {
        $this->tb_user_id = $tb_user_id;
    }

    function setTb_user_directors_id($tb_user_directors_id) {
        $this->tb_user_directors_id = $tb_user_directors_id;
    }

    function setTb_contrato_data_assinatura($tb_contrato_data_assinatura) {
        $this->tb_contrato_data_assinatura = $tb_contrato_data_assinatura;
    }

    function setTb_contrato_tipo_documento($tb_contrato_tipo_documento) {
        $this->tb_contrato_tipo_documento = $tb_contrato_tipo_documento;
    }

    function setTb_contrato_hash_documento($tb_contrato_hash_documento) {
        $this->tb_contrato_hash_documento = $tb_contrato_hash_documento;
    }

    function setTb_contrato_date($tb_contrato_date) {
        $this->tb_contrato_date = $tb_contrato_date;
    }

    function setTb_contrato_hour($tb_contrato_hour) {
        $this->tb_contrato_hour = $tb_contrato_hour;
    }

        
    
    // METODO PARA INSERIR DADOS DO ARQUIVOS
    public function insert() {
        
        $sql = "INSERT INTO $this->table("
                . "tb_user_id,"
                . "tb_user_directors_id,"
                . "tb_contrato_data_assinatura,"
                . "tb_contrato_tipo_documento,"
                . "tb_contrato_hash_documento,"
                . "tb_contrato_date,"
                . "tb_contrato_hour)"
                . "VALUES (?,?,?,?,?,?,?)";
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $this->tb_user_id);
        $stmt->bindParam(2, $this->tb_user_directors_id);
        $stmt->bindParam(3, $this->tb_contrato_data_assinatura);
        $stmt->bindParam(4, $this->tb_contrato_tipo_documento);
        $stmt->bindParam(5, $this->tb_contrato_hash_documento);
        $stmt->bindParam(6, $this->tb_contrato_date);
        $stmt->bindParam(7, $this->tb_contrato_hour);
        
        $stmt->execute();
    }

    // METODO PARA ALTERAR DADOS DE ARQUIVOS - BOLETOS 
    public function updateContrato($id) {
        $sql = "UPDATE $this->table SET tb_contrato_data_assinatura = ?,"
                . "tb_contrato_hash_documento = ?,"
                . "WHERE tb_contrato_id = ?";
                
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $this->tb_contrato_data_assinatura);
        $stmt->bindParam(2, $this->tb_contrato_hash_documento);
        $stmt->bindParam(3, $id);
        
        $stmt->execute();
    }
    
    // METODO PARA ALTERAR DADOS DE ARQUIVOS - NFE
    public function updateProposta($id) {
        $sql = "UPDATE $this->table SET tb_contrato_data_assinatura = ?,"
                . "tb_contrato_hash_documento = ?"
                . "WHERE tb_contrato_id = ?";
                
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $this->tb_contrato_data_assinatura);
        $stmt->bindParam(2, $this->tb_contrato_hash_documento);
        $stmt->bindParam(3, $id);
        
        $stmt->execute();
    }
    
    // METODO PARA ALTERAR DADOS DE ARQUIVOS - NFE
    public function updateAdendo($id) {
        $sql = "UPDATE $this->table SET tb_contrato_data_assinatura = ?,"
                . "tb_contrato_hash_documento"
                . "WHERE tb_contrato_id = ?";
                
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $this->tb_contrato_data_assinatura);
        $stmt->bindParam(2, $this->tb_contrato_hash_documento);
        $stmt->bindParam(3, $id);
        
        $stmt->execute();
    }
    
    // METODO PARA LISTAR DADOS DO USUÁRIO POR ID
    public function selectAllID($id){
        $sql = "SELECT * FROM $this->table WHERE tb_user_id = ? ORDER BY tb_contrato_date DESC";
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $id);
        
        $stmt->execute();
        
        return $stmt->fetchall();
    }

    // METODO PARA LISTAR DADOS DO USUÁRIO POR ID
    public function selectAll(){
        $sql = "SELECT * FROM $this->table ORDER BY tb_contrato_date DESC";
        
        $stmt = DB::prepare($sql);
        
        $stmt->execute();
        
        return $stmt->fetchall();
    }
    
    public function delete($id){
        $sql = "DELETE FROM $this->table WHERE tb_contrato_id = ?";
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        
        $stmt->execute();
    }

    public function update($id) {
        
    }

}
