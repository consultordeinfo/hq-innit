<?php
 require_once './../admin/pdo/Crud.php';

class RedePDO extends Crud{
    // Atributo protegido para uso de tabela
    protected $table = 'tb_rede';
    
    // Atributos
    private $tb_rede_id;
    private $tb_rede_directors_id;
    private $tb_rede_data_atualizacao;
    private $tb_rede_descricao;
    private $tb_rede_hash;
    private $tb_rede_date;
    private $tb_rede_hour;

    //Metodos de acesso
    function getTable() {
        return $this->table;
    }

    function getTb_rede_id() {
        return $this->tb_rede_id;
    }

    function getTb_rede_directors_id() {
        return $this->tb_rede_directors_id;
    }

    function getTb_rede_data_atualizacao() {
        return $this->tb_rede_data_atualizacao;
    }

    function getTb_rede_descricao() {
        return $this->tb_rede_descricao;
    }

    function getTb_rede_hash() {
        return $this->tb_rede_hash;
    }

    function getTb_rede_date() {
        return $this->tb_rede_date;
    }

    function getTb_rede_hour() {
        return $this->tb_rede_hour;
    }

    function setTable($table) {
        $this->table = $table;
    }

    function setTb_rede_id($tb_rede_id) {
        $this->tb_rede_id = $tb_rede_id;
    }

    function setTb_rede_directors_id($tb_rede_directors_id) {
        $this->tb_rede_directors_id = $tb_rede_directors_id;
    }

    function setTb_rede_data_atualizacao($tb_rede_data_atualizacao) {
        $this->tb_rede_data_atualizacao = $tb_rede_data_atualizacao;
    }

    function setTb_rede_descricao($tb_rede_descricao) {
        $this->tb_rede_descricao = $tb_rede_descricao;
    }

    function setTb_rede_hash($tb_rede_hash) {
        $this->tb_rede_hash = $tb_rede_hash;
    }

    function setTb_rede_date($tb_rede_date) {
        $this->tb_rede_date = $tb_rede_date;
    }

    function setTb_rede_hour($tb_rede_hour) {
        $this->tb_rede_hour = $tb_rede_hour;
    }

            
    
    // METODO PARA INSERIR DADOS DO ARQUIVOS
    public function insert() {
        
        $sql = "INSERT INTO $this->table("
                . "tb_rede_id,"
                . "tb_rede_directors_id,"
                . "tb_rede_data_atualizacao,"
                . "tb_rede_descricao,"
                . "tb_rede_hash,"
                . "tb_rede_date,"
                . "tb_rede_hour)"
                . "VALUES (?,?,?,?,?,?,?)";
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $this->tb_rede_id);
        $stmt->bindParam(2, $this->tb_rede_directors_id);
        $stmt->bindParam(3, $this->tb_rede_data_atualizacao);
        $stmt->bindParam(4, $this->tb_rede_descricao);
        $stmt->bindParam(5, $this->tb_rede_hash);
        $stmt->bindParam(6, $this->tb_rede_date);
        $stmt->bindParam(7, $this->tb_rede_hour);
        
        $stmt->execute();
    }

    // METODO PARA ALTERAR DADOS DE ARQUIVOS - BOLETOS 
    public function updateRede($id) {
        $sql = "UPDATE $this->table SET tb_rede_descricao = ?,"
                . "tb_rede_hash = ?,"
                . "WHERE tb_rede_id = ?";
                
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $this->tb_rede_descricao);
        $stmt->bindParam(2, $this->tb_rede_hash);
        $stmt->bindParam(3, $id);
        
        $stmt->execute();
    }
    
    
    // METODO PARA LISTAR DADOS DO USUÁRIO POR ID
    public function selectAllID($id){
        $sql = "SELECT * FROM $this->table WHERE tb_rede_directors_id = ?";
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $id);
        
        $stmt->execute();
        
        return $stmt->fetchall();
    }

    // METODO PARA LISTAR DADOS DO USUÁRIO POR ID
    public function selectAll(){
        $sql = "SELECT * FROM $this->table ORDER BY tb_rede_date DESC";
        
        $stmt = DB::prepare($sql);
        
        $stmt->execute();
        
        return $stmt->fetchall();
    }
    
    public function delete($id){
        $sql = "DELETE FROM $this->table WHERE tb_rede_id = ?";
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        
        $stmt->execute();
    }

    public function update($id) {
        
    }

}
