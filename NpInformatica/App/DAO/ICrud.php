<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\DAO;

use Core\Factory;

/**
 *
 * @author Andre
 */
interface ICrud {
     
    public function GetContainer();
    public function GetConnection();
    public function PrepareStatement(string $query);
    public function StringQuery(string $query = null, array $fields = null):string;

}

