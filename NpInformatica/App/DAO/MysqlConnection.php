<?php

namespace App\DAO;

use PDO;
use PDOException;


class MysqlConnection implements IDadabase {
    
    private $conn = null;
    private $user = 'playmanager';
    private $pass = 'Dnd2018m@nager';
    private $host = 'localhost';
    private $dbName= 'playmanager';
    private $charset = 'utf8';
    private $collation = 'utf8_unicode_ci';
  
    public function __construct() {
        $this->Connection();
    }
    
    public function GetConnection():PDO{return $this->conn;}

    public function CloseConnection() {$this->conn = null;}

    private function Connection(){
       
         try
            {
                $this->conn  = new PDO("mysql:host={$this->host};dbname={$this->dbName};charset={$this->charset}", $this->user, $this->pass);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET_NAMES '{$this->charset}' COLLATE '{$this->collation}'");
                $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                return $this->conn;
            }
            catch (PDOException $e)
            {
                echo $e->getMessage();
            }
        }
        
        
    

}
