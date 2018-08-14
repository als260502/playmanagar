<?php

namespace App\DAO;


class Connection {
    
    private $conn = null;
    
    public function __construct(IDadabase $conn) {
        
        $this->conn = $conn;        
    }
    
    public function GetConnection(){
        return $this->conn->GetConnection();
    }
    
  
    
}
