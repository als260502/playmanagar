<?php
/**
 * Created by PhpStorm.
 * User: Andre
 * Date: 15/08/2018
 * Time: 10:14
 */

namespace App\DAO\Delete;

use Core\Factory;

class RemoveData implements IRemove
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


    public function RemoveData(string $query, array $params)
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