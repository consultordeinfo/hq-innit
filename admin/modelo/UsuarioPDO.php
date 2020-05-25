<?php
 require_once './../admin/pdo/Crud.php';

class UsuarioPDO extends Crud{
    // Atributo protegido para uso de tabela
    protected $table = 'tb_user';
    
    // Atributos
    private $tb_user_id;
    private $tb_user_nome;
    private $tb_user_sobrenome;
    private $tb_user_login;
    private $tb_user_pass;
    private $tb_user_fone_celular;
    private $tb_user_fone_fixo;
    private $tb_user_email;
    private $tb_user_empresa;
    private $tb_user_ativo;
    
    // Metodos de acesso
    function getTable() {
        return $this->table;
    }

    function getTb_user_id() {
        return $this->tb_user_id;
    }

    function getTb_user_nome() {
        return $this->tb_user_nome;
    }

    function getTb_user_sobrenome() {
        return $this->tb_user_sobrenome;
    }

    function getTb_user_login() {
        return $this->tb_user_login;
    }

    function getTb_user_pass() {
        return $this->tb_user_pass;
    }

    function getTb_user_fone_celular() {
        return $this->tb_user_fone_celular;
    }

    function getTb_user_fone_fixo() {
        return $this->tb_user_fone_fixo;
    }

    function getTb_user_email() {
        return $this->tb_user_email;
    }

    function getTb_user_empresa() {
        return $this->tb_user_empresa;
    }

    function getTb_user_ativo() {
        return $this->tb_user_ativo;
    }

    function setTable($table) {
        $this->table = $table;
    }

    function setTb_user_id($tb_user_id) {
        $this->tb_user_id = $tb_user_id;
    }

    function setTb_user_nome($tb_user_nome) {
        $this->tb_user_nome = $tb_user_nome;
    }

    function setTb_user_sobrenome($tb_user_sobrenome) {
        $this->tb_user_sobrenome = $tb_user_sobrenome;
    }

    function setTb_user_login($tb_user_login) {
        $this->tb_user_login = $tb_user_login;
    }

    function setTb_user_pass($tb_user_pass) {
        $this->tb_user_pass = $tb_user_pass;
    }

    function setTb_user_fone_celular($tb_user_fone_celular) {
        $this->tb_user_fone_celular = $tb_user_fone_celular;
    }

    function setTb_user_fone_fixo($tb_user_fone_fixo) {
        $this->tb_user_fone_fixo = $tb_user_fone_fixo;
    }

    function setTb_user_email($tb_user_email) {
        $this->tb_user_email = $tb_user_email;
    }

    function setTb_user_empresa($tb_user_empresa) {
        $this->tb_user_empresa = $tb_user_empresa;
    }

    function setTb_user_ativo($tb_user_ativo) {
        $this->tb_user_ativo = $tb_user_ativo;
    }

    
        
    // METODO PARA INSERIR DADOS DO USUÁRIO
    public function insert() {
        
        $sql = "INSERT INTO $this->table("
                . "tb_user_nome,"
                . "tb_user_sobrenome,"
                . "tb_user_login,"
                . "tb_user_pass,"
                . "tb_user_fone_celular,"
                . "tb_user_fone_fixo,"
                . "tb_user_email,"
                . "tb_user_empresa,"
                . "tb_user_ativo)"
                . "VALUES (?,?,?,?,?,?,?,?,?)";
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $this->tb_user_nome);
        $stmt->bindParam(2, $this->tb_user_sobrenome);
        $stmt->bindParam(3, $this->tb_user_login);
        $stmt->bindParam(4, $this->tb_user_pass);
        $stmt->bindParam(5, $this->tb_user_fone_celular);
        $stmt->bindParam(6, $this->tb_user_fone_fixo);
        $stmt->bindParam(7, $this->tb_user_email);
        $stmt->bindParam(8, $this->tb_user_empresa);
        $stmt->bindParam(9, $this->tb_user_ativo);
        
        $stmt->execute();
    }

    // METODO PARA LISTANDO DADOS DO USUÁRIO
    public function update($id) {
        $sql = "UPDATE $this->table SET tb_user_nome = ?, "
                . "tb_user_sobrenome = ?, "
                . "tb_user_fone_celular = ?, "
                . "tb_user_fone_fixo = ?, "
                . "tb_user_email = ?, "
                . "tb_user_empresa = ? WHERE tb_user_id = ?";
                
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $this->tb_user_nome);
        $stmt->bindParam(2, $this->tb_user_sobrenome);
        $stmt->bindParam(3, $this->tb_user_fone_celular);
        $stmt->bindParam(4, $this->tb_user_fone_fixo);
        $stmt->bindParam(5, $this->tb_user_fone_email);
        $stmt->bindParam(6, $this->tb_user_fone_empresa);
        $stmt->bindParam(7, $id);
        
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

    // METODO PARA LISTAR DADOS DO USUÁRIO POR ID
    public function selectAll(){
        $sql = "SELECT * FROM $this->table ORDER BY tb_user_nome";
        
        $stmt = DB::prepare($sql);
        
        $stmt->execute();
        
        return $stmt->fetchall();
    }
}
