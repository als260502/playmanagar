<?php

namespace Core;

class Factory {

    private $instances = [];
   

    public function get(string $id) {
        $this->Container();
        return $this->instances[$id]($this);
    }

    private function Container() {

        try {
            $this->set('db', function () {                
                $conn = new \App\DAO\Connection(new \App\DAO\SqliteConnection);
                return $conn->GetConnection();
            });

        } catch (\PDOException $e) {
            print ("este container nao existe ou nao foi inicializado: {$e->getMessage()}, $e->errorInfo");
        }
    }

    private function set(string $id, \Closure $closure) {

        $this->instances[$id] = $closure;
    }
    
  
}
