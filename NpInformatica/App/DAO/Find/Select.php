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
    private $query;
    private $result;

    public function __construct(Factory $container, $table)
    {

        $this->container = $container;
        $this->conn = $this->container->get('db');
        $this->table = $table;

    }

    public function FindAll()
    {

        try {
            $this->query = $this->StringQuery();
            $this->result = $this->PrepareStatement($this->query);

            return $this->result;

        } catch (\PDOException $e) {
            print $e->getMessage();
        }


    }

    public function FindById($id)
    {
        try {

            $query = $this->StringQuery('', ['id' => $id]);

            $this->result = $this->PrepareStatement($query , ['id' => $id]);
            return $this->result;
        } catch (\PDOException $e) {
            print $e->getMessage();
        }
    }

    public function GetContainer()
    {
        return $this->container;
    }

    public function findBy(array $param)
    {

    }

    public function GetConnection()
    {
        return $this->conn;
    }

    public function PrepareStatement(string $query, array $fields = null)
    {
        try {
            $stmt = $this->GetConnection()->prepare($query);

            if (isset($fields)) {

                foreach ($fields as $key => $value) {
                    $stmt->bindValue(":{$key}", $value);
                }

                $stmt->execute();
                $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $result;

            } else {

                $stmt->execute();
                $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $result;
            }
        } catch (\PDOException $e) {
            print "{$e->getMessage()} / {$e->getTraceAsString()}";
        }

    }

    public function StringQuery(string $query = null, array $fields = null): string
    {

        if (isset($fields)) {
            $this->query = sprintf("SELECT %s from %s WHERE %s", $this->PrepareRowsName($fields), $this->table, $this->PrepareFieldsName($fields));

        } else {
            $this->query = sprintf("SELECT * from %s", $this->table);

        }

        return $this->query;
    }

    public function PrepareFieldsName(array $fields): string
    {
        foreach ($fields as $key => $value) {
            $queryString[] = "{$key}=:{$key}";
        }
        $strQuery = implode(',', $queryString);

        return $strQuery;
    }

    public function PrepareFieldsValue(array $fields): array
    {
        foreach ($fields as $key => $value) {
            $queryString[] = "{$value}";
        }

        return $queryString;
    }

    public function PrepareRowsName(array $fields): string
    {
        foreach ($fields as $key => $value) {
            $queryString[] = "{$key}";
        }
        $strQuery = implode(',', $queryString);

        return $strQuery;
    }
}
