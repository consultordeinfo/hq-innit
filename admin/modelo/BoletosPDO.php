<?php
 require_once './../admin/pdo/Crud.php';

class BoletosPDO extends Crud{
    // Atributo protegido para uso de tabela
    protected $table = 'tb_boleto';
    
    // Atributos
    private $tb_arquivos_id;
    private $tb_user_id;
    private $tb_user_directors_id;
    private $tb_boleto_venc_boleto;
    private $tb_boleto_hash_boleto;
    private $tb_boleto_hash_nfe;
    private $tb_boleto_hash_sla;
    private $tb_boleto_status_boleto;
    private $tb_boleto_date;
    private $tb_boleto_hour;

    //Metodos de acesso
    function getTable() {
        return $this->table;
    }

    function getTb_arquivos_id() {
        return $this->tb_arquivos_id;
    }

    function getTb_user_id() {
        return $this->tb_user_id;
    }

    function getTb_user_directors_id() {
        return $this->tb_user_directors_id;
    }

    function getTb_boleto_venc_boleto() {
        return $this->tb_boleto_venc_boleto;
    }

    function getTb_boleto_hash_boleto() {
        return $this->tb_boleto_hash_boleto;
    }

    function getTb_boleto_hash_nfe() {
        return $this->tb_boleto_hash_nfe;
    }

    function getTb_boleto_hash_sla() {
        return $this->tb_boleto_hash_sla;
    }

    function getTb_boleto_status_boleto() {
        return $this->tb_boleto_status_boleto;
    }

    function getTb_boleto_date() {
        return $this->tb_boleto_date;
    }

    function getTb_boleto_hour() {
        return $this->tb_boleto_hour;
    }

    function setTable($table) {
        $this->table = $table;
    }

    function setTb_arquivos_id($tb_arquivos_id) {
        $this->tb_arquivos_id = $tb_arquivos_id;
    }

    function setTb_user_id($tb_user_id) {
        $this->tb_user_id = $tb_user_id;
    }

    function setTb_user_directors_id($tb_user_directors_id) {
        $this->tb_user_directors_id = $tb_user_directors_id;
    }

    function setTb_boleto_venc_boleto($tb_boleto_venc_boleto) {
        $this->tb_boleto_venc_boleto = $tb_boleto_venc_boleto;
    }

    function setTb_boleto_hash_boleto($tb_boleto_hash_boleto) {
        $this->tb_boleto_hash_boleto = $tb_boleto_hash_boleto;
    }

    function setTb_boleto_hash_nfe($tb_boleto_hash_nfe) {
        $this->tb_boleto_hash_nfe = $tb_boleto_hash_nfe;
    }

    function setTb_boleto_hash_sla($tb_boleto_hash_sla) {
        $this->tb_boleto_hash_sla = $tb_boleto_hash_sla;
    }

    function setTb_boleto_status_boleto($tb_boleto_status_boleto) {
        $this->tb_boleto_status_boleto = $tb_boleto_status_boleto;
    }

    function setTb_boleto_date($tb_boleto_date) {
        $this->tb_boleto_date = $tb_boleto_date;
    }

    function setTb_boleto_hour($tb_boleto_hour) {
        $this->tb_boleto_hour = $tb_boleto_hour;
    }

    // METODO PARA INSERIR DADOS DO ARQUIVOS
    public function insert() {
        
        $sql = "INSERT INTO $this->table("
                . "tb_user_id,"
                . "tb_user_directors_id,"
                . "tb_boleto_venc_boleto,"
                . "tb_boleto_hash_boleto,"
                . "tb_boleto_hash_nfe,"
                . "tb_boleto_hash_sla,"
                . "tb_boleto_status_boleto,"
                . "tb_boleto_date,"
                . "tb_boleto_hour)"
                . "VALUES (?,?,?,?,?,?,?,?,?)";
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $this->tb_user_id);
        $stmt->bindParam(2, $this->tb_user_directors_id);
        $stmt->bindParam(3, $this->tb_boleto_venc_boleto);
        $stmt->bindParam(4, $this->tb_boleto_hash_boleto);
        $stmt->bindParam(5, $this->tb_boleto_hash_nfe);
        $stmt->bindParam(6, $this->tb_boleto_hash_sla);
        $stmt->bindParam(7, $this->tb_boleto_status_boleto);
        $stmt->bindParam(8, $this->tb_boleto_date);
        $stmt->bindParam(9, $this->tb_boleto_hour);
        
        $stmt->execute();
    }

    // METODO PARA ALTERAR DADOS DE ARQUIVOS - BOLETOS 
    public function updateBoleto($id) {
        $sql = "UPDATE $this->table SET tb_boleto_venc_boletos = ?,"
                . "tb_boleto_hash_boleto = ?,"
                . "tb_boleto_status_boleto = ? "
                . "WHERE tb_boleto_id = ?";
                
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $this->tb_boleto_venc_boletos);
        $stmt->bindParam(2, $this->tb_boleto_hash_boletos);
        $stmt->bindParam(3, $this->tb_boleto_status_boleto);
        $stmt->bindParam(4, $id);
        
        $stmt->execute();
    }
    
    // METODO PARA ALTERAR DADOS DE ARQUIVOS - NFE
    public function updateNfe($id) {
        $sql = "UPDATE $this->table SET tb_boleto_hash_nfe = ?,"
                . "WHERE tb_boleto_id = ?";
                
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $this->tb_boleto_hash_nfe);
        $stmt->bindParam(2, $id);
        
        $stmt->execute();
    }
    
    // METODO PARA ALTERAR DADOS DE ARQUIVOS - NFE
    public function updateSla($id) {
        $sql = "UPDATE $this->table SET tb_boleto_hash_sla = ?,"
                . "WHERE tb_boleto_id = ?";
                
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $this->tb_boleto_hash_nfe);
        $stmt->bindParam(2, $id);
        
        $stmt->execute();
    }
    
    // METODO PARA LISTAR DADOS DO USUÁRIO POR ID
    public function selectAllID($id){
        $sql = "SELECT * FROM $this->table WHERE tb_user_id = ? ORDER BY tb_boleto_venc_boleto DESC";
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $id);
        
        $stmt->execute();
        
        return $stmt->fetchall();
    }

    // METODO PARA LISTAR DADOS DO USUÁRIO POR ID
    public function selectAll(){
        $sql = "SELECT * FROM $this->table ORDER BY tb_boleto_date";
        
        $stmt = DB::prepare($sql);
        
        $stmt->execute();
        
        return $stmt->fetchall();
    }
    
    public function delete($id){
        $sql = "DELETE FROM $this->table WHERE tb_boleto_id = ?";
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        
        $stmt->execute();
    }

    public function update($id) {
        
    }

}
