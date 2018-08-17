<?php
/**
 * Created by PhpStorm.
 * User: Andre
 * Date: 15/08/2018
 * Time: 09:46
 */

namespace App\DAO\Add;


use Core\Factory;

class UpdateData implements IUpdate
{
    private $conn;
    private $container;
    private $table;
    private $result;

    public function __construct(Factory $container, $table)
    {

        $this->container = $container;
        $this->conn = $this->container->get('db');
        $this->table = $table;

    }


    public function UpdateData(string $query, array $params)
    {

        try {
            $stmt = $this->GetConnection()->prepare($query);
            $this->result = $stmt->execute($params);
            return $this->result;
        }
        catch (\PDOException $e) {
            throw new \Exception("{$e->getMessage()} / {$e->getTraceAsString()}");
        }
    }


    public function GetContainer()
    {
        return $this->container;
    }

    public function GetConnection()
    {
        return $this->conn;
    }


}