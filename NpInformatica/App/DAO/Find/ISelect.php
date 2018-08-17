<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\DAO\Find;

/**
 *
 * @author Andre
 */
interface ISelect {

    public function FindByParams(string $query, array $params);
    public function FindAll(string $query);

}
