<?php
/**
 * Created by PhpStorm.
 * User: Andre
 * Date: 15/08/2018
 * Time: 10:12
 */

namespace App\DAO\Delete;


interface IDelete
{

    public function RemoveData(string $query, array $params);

}