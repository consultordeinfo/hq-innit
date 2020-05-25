<?php

require_once 'DB.php';

abstract class Crud extends DB {
    
    protected $table;
    
    abstract public function insert();
        
    public function findAll(){
        $sql = "SELECT * FROM $this->table";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    
    
}
