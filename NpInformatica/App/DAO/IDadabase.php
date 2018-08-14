<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\DAO;

/**
 *
 * @author Andre
 */
interface IDadabase {
   
    public function GetConnection():\PDO;
    
    public function CloseConnection();
    
    
}
