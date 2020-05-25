<?php
 require_once './../admin/pdo/Crud.php';

class ClientePDO extends Crud{
    // Atributo protegido para uso de tabela
    protected $table = 'tb_clientes';
    
    // Atributos
    private $tb_clientes_id;
    private $tb_clientes_razao_social;
    private $tb_clientes_endereco;
    private $tb_clientes_numero;
    private $tb_clientes_complemento;
    private $tb_clientes_bairro;
    private $tb_clientes_cidade;
    private $tb_clientes_estado;
    private $tb_clientes_cnpj;
    private $tb_clientes_ie;
    private $tb_clientes_im;

    // METODOS DE ACESSO
    function getTable() {
        return $this->table;
    }

    function getTb_clientes_id() {
        return $this->tb_clientes_id;
    }

    function getTb_clientes_razao_social() {
        return $this->tb_clientes_razao_social;
    }

    function getTb_clientes_endereco() {
        return $this->tb_clientes_endereco;
    }

    function getTb_clientes_numero() {
        return $this->tb_clientes_numero;
    }

    function getTb_clientes_complemento() {
        return $this->tb_clientes_complemento;
    }

    function getTb_clientes_bairro() {
        return $this->tb_clientes_bairro;
    }

    function getTb_clientes_cidade() {
        return $this->tb_clientes_cidade;
    }

    function getTb_clientes_estado() {
        return $this->tb_clientes_estado;
    }

    function getTb_clientes_cnpj() {
        return $this->tb_clientes_cnpj;
    }

    function getTb_clientes_ie() {
        return $this->tb_clientes_ie;
    }

    function getTb_clientes_im() {
        return $this->tb_clientes_im;
    }

    function setTable($table) {
        $this->table = $table;
    }

    function setTb_clientes_id($tb_clientes_id) {
        $this->tb_clientes_id = $tb_clientes_id;
    }

    function setTb_clientes_razao_social($tb_clientes_razao_social) {
        $this->tb_clientes_razao_social = $tb_clientes_razao_social;
    }

    function setTb_clientes_endereco($tb_clientes_endereco) {
        $this->tb_clientes_endereco = $tb_clientes_endereco;
    }

    function setTb_clientes_numero($tb_clientes_numero) {
        $this->tb_clientes_numero = $tb_clientes_numero;
    }

    function setTb_clientes_complemento($tb_clientes_complemento) {
        $this->tb_clientes_complemento = $tb_clientes_complemento;
    }

    function setTb_clientes_bairro($tb_clientes_bairro) {
        $this->tb_clientes_bairro = $tb_clientes_bairro;
    }

    function setTb_clientes_cidade($tb_clientes_cidade) {
        $this->tb_clientes_cidade = $tb_clientes_cidade;
    }

    function setTb_clientes_estado($tb_clientes_estado) {
        $this->tb_clientes_estado = $tb_clientes_estado;
    }

    function setTb_clientes_cnpj($tb_clientes_cnpj) {
        $this->tb_clientes_cnpj = $tb_clientes_cnpj;
    }

    function setTb_clientes_ie($tb_clientes_ie) {
        $this->tb_clientes_ie = $tb_clientes_ie;
    }

    function setTb_clientes_im($tb_clientes_im) {
        $this->tb_clientes_im = $tb_clientes_im;
    }

            
    // METODO PARA INSERIR DADOS DO USUÁRIO
    public function insert() {
        
        $sql = "INSERT INTO $this->table("
                . "tb_clientes_razao_social,"
                . "tb_clientes_endereco,"
                . "tb_clientes_numero,"
                . "tb_clientes_complemento,"
                . "tb_clientes_bairro,"
                . "tb_clientes_cidade,"
                . "tb_clientes_estado,"
                . "tb_clientes_cnpj,"
                . "tb_clientes_ie,"
                . "tb_clientes_im)"
                . "VALUES (?,?,?,?,?,?,?,?,?,?)";
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $this->tb_clientes_razao_social);
        $stmt->bindParam(2, $this->tb_clientes_endereco);
        $stmt->bindParam(3, $this->tb_clientes_numero);
        $stmt->bindParam(4, $this->tb_clientes_complemento);
        $stmt->bindParam(5, $this->tb_clientes_bairro);
        $stmt->bindParam(6, $this->tb_clientes_cidade);
        $stmt->bindParam(7, $this->tb_clientes_estado);
        $stmt->bindParam(8, $this->tb_clientes_cnpj);
        $stmt->bindParam(9, $this->tb_clientes_ie);
        $stmt->bindParam(10, $this->tb_clientes_im);
        
        $stmt->execute();
    }

    // METODO PARA LISTANDO DADOS DO USUÁRIO
    public function update($id) {
        $sql = "UPDATE $this->table SET "
                . "tb_clientes_razao_social = ?, "
                . "tb_clientes_endereco = ?, "
                . "tb_clientes_numero = ?, "
                . "tb_clientes_complemento = ?, "
                . "tb_clientes_bairro = ?,"
                . "tb_clientes_cidade = ?,"
                . "tb_clientes_estado = ?,"
                . "tb_clientes_cnpj = ?,"
                . "tb_clientes_ie = ?, "
                . "tb_clientes_im = ? WHERE tb_clientes_id = ?";
                
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $this->tb_clientes_razao_social);
        $stmt->bindParam(2, $this->tb_clientes_endereco);
        $stmt->bindParam(3, $this->tb_clientes_numero);
        $stmt->bindParam(4, $this->tb_clientes_complemento);
        $stmt->bindParam(5, $this->tb_clientes_bairro);
        $stmt->bindParam(6, $this->tb_clientes_cidade);
        $stmt->bindParam(7, $this->tb_clientes_estado);
        $stmt->bindParam(8, $this->tb_clientes_cnpj);
        $stmt->bindParam(9, $this->tb_clientes_ie);
        $stmt->bindParam(10, $this->tb_clientes_im);
        $stmt->bindParam(11, $id);
        
        $stmt->execute();
    }
    
    // METODO PARA LISTAR DADOS DO USUÁRIO POR ID
    public function selectAllID($id){
        $sql = "SELECT * FROM $this->table WHERE tb_clientes_id = ?";
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $id);
        
        $stmt->execute();
        
        return $stmt->fetchall();
    }

    // METODO PARA LISTAR DADOS DO USUÁRIO POR ID
    public function selectAll(){
        $sql = "SELECT * FROM $this->table ORDER BY tb_clientes_razao_social";
        
        $stmt = DB::prepare($sql);
        
        $stmt->execute();
        
        return $stmt->fetchall();
    }
}
