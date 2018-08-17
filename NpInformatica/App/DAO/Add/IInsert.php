<?php
/**
 * Created by PhpStorm.
 * User: Andre
 * Date: 15/08/2018
 * Time: 09:23
 */

namespace App\DAO\Add;


use App\DAO\ICrud;



interface IInsert extends ICrud
{

    public function AddData(string $query, array $params);

}