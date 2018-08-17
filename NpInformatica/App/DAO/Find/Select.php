<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\DAO\Find;

use Core\Factory;

class Select implements IFind
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

    public function FindAll(string $query)
    {

        try {
            $this->result = $this->PrepareStatement($query, []);
            return $this->result;

        } catch (\PDOException $e) {
            throw  new \Exception($e->getMessage());
        }

    }

    public function FindByParams(string $query, array $params)
    {

        try {
            $this->result = $this->PrepareStatement($query, $params);
            return $this->result;

        } catch (\PDOException $e) {
            throw  new \Exception($e->getMessage());
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

    private function PrepareStatement(string $query, array $fields = [])
    {
        try {
            $stmt = $this->GetConnection()->prepare($query);

            $stmt->execute($fields);
            $result =(empty($fields))? $stmt->fetchAll() : $stmt->fetch();
            return $result;

        } catch (\PDOException $e) {
            print "{$e->getMessage()} / {$e->getTraceAsString()}";
        }

    }

}
