<?php

namespace App\DAO;

use PDO;
use PDOException;


class SqliteConnection implements IDadabase {
    
    private $conn = null;
    private $host = './storage/playmanager.db';
    
     
    public function __construct() {
        $this->Connection();
    }
    
    public function GetConnection():PDO{return $this->conn;}

    public function CloseConnection() {$this->conn = null;}

    private function Connection(){
       
         try
            {
                $sqlite = "sqlite:{$this->host}";
                $this->conn  = new PDO($sqlite);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                return $this->conn;
            }
            catch (PDOException $e)
            {
                echo $e->getMessage();
            }
        }
        
        
    

}
