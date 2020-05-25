<?php
 require_once './../admin/pdo/Crud.php';

class UsuarioDiretorPDO extends Crud{
    // Atributo protegido para uso de tabela
    protected $table = 'tb_user_directors';
    
    // Atributos
    private $tb_user_directors_id;
    private $tb_user_directors_nome;
    private $tb_user_directors_login;
    private $tb_user_directors_pass;
    private $tb_user_directors_celular;
    private $tb_user_directors_fone_fixo;
    private $tb_user_directors_email;
    private $tb_user_directors_empresa;
    private $tb_user_directors_ativo;

    //Metodos de acesso
    function getTable() {
        return $this->table;
    }

    function getTb_user_directors_id() {
        return $this->tb_user_directors_id;
    }

    function getTb_user_directors_nome() {
        return $this->tb_user_directors_nome;
    }

    function getTb_user_directors_login() {
        return $this->tb_user_directors_login;
    }

    function getTb_user_directors_pass() {
        return $this->tb_user_directors_pass;
    }

    function getTb_user_directors_celular() {
        return $this->tb_user_directors_celular;
    }

    function getTb_user_directors_fone_fixo() {
        return $this->tb_user_directors_fone_fixo;
    }

    function getTb_user_directors_email() {
        return $this->tb_user_directors_email;
    }

    function getTb_user_directors_empresa() {
        return $this->tb_user_directors_empresa;
    }

    function getTb_user_directors_ativo() {
        return $this->tb_user_directors_ativo;
    }

    function setTable($table) {
        $this->table = $table;
    }

    function setTb_user_directors_id($tb_user_directors_id) {
        $this->tb_user_directors_id = $tb_user_directors_id;
    }

    function setTb_user_directors_nome($tb_user_directors_nome) {
        $this->tb_user_directors_nome = $tb_user_directors_nome;
    }

    function setTb_user_directors_login($tb_user_directors_login) {
        $this->tb_user_directors_login = $tb_user_directors_login;
    }

    function setTb_user_directors_pass($tb_user_directors_pass) {
        $this->tb_user_directors_pass = $tb_user_directors_pass;
    }

    function setTb_user_directors_celular($tb_user_directors_celular) {
        $this->tb_user_directors_celular = $tb_user_directors_celular;
    }

    function setTb_user_directors_fone_fixo($tb_user_directors_fone_fixo) {
        $this->tb_user_directors_fone_fixo = $tb_user_directors_fone_fixo;
    }

    function setTb_user_directors_email($tb_user_directors_email) {
        $this->tb_user_directors_email = $tb_user_directors_email;
    }

    function setTb_user_directors_empresa($tb_user_directors_empresa) {
        $this->tb_user_directors_empresa = $tb_user_directors_empresa;
    }

    function setTb_user_directors_ativo($tb_user_directors_ativo) {
        $this->tb_user_directors_ativo = $tb_user_directors_ativo;
    }


    // METODO PARA INSERIR DADOS DO USUÁRIO-DIRETOR
    public function insert() {
        
        $sql = "INSERT INTO $this->table("
                . "tb_user_directors_nome,"
                . "tb_user_directors_login,"
                . "tb_user_directors_pass,"
                . "tb_user_directors_celular,"
                . "tb_user_directors_fone_fixo,"
                . "tb_user_directors_email,"
                . "tb_user_directors_empresa,"
                . "tb_user_directors_ativo)"
                . "VALUES (?,?,?,?,?,?,?,?)";
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $this->tb_user_directors_nome);
        $stmt->bindParam(2, $this->tb_user_directors_login);
        $stmt->bindParam(3, $this->tb_user_directors_pass);
        $stmt->bindParam(4, $this->tb_user_directors_celular);
        $stmt->bindParam(5, $this->tb_user_directors_fone_fixo);
        $stmt->bindParam(6, $this->tb_user_directors_email);
        $stmt->bindParam(7, $this->tb_user_directors_empresa);
        $stmt->bindParam(8, $this->tb_user_directors_ativo);
        
        $stmt->execute();
    }

    // METODO PARA LISTANDO DADOS DO USUÁRIO-DIRETOR
    public function update($id) {
        $sql = "UPDATE $this->table SET tb_user_directors_nome = ?, "
                . "tb_user_directors_ativo = ? WHERE tb_user_directors_id = ?";
                
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $this->tb_user_directors_nome);
        $stmt->bindParam(2, $this->tb_user_directors_ativo);
        $stmt->bindParam(3, $id);
        
        $stmt->execute();
    }
    
    // METODO PARA LISTAR DADOS DO USUÁRIO POR ID
    public function selectAllID($id){
        $sql = "SELECT * FROM $this->table WHERE tb_user_directors_id = ?";
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $id);
        
        $stmt->execute();
        
        return $stmt->fetchall();
    }

    // METODO PARA LISTAR DADOS DO USUÁRIO POR ID
    public function selectAll(){
        $sql = "SELECT * FROM $this->table ORDER BY tb_user_directors_nome";
        
        $stmt = DB::prepare($sql);
        
        $stmt->execute();
        
        return $stmt->fetchall();
    }
}
