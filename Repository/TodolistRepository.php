<?php

namespace Repository{
    
    use Entitiy\Todolist;

    interface TodolistRepository{
        
        public function save(Todolist $todolist) : void;

        public function remove(int $number) : bool;

        public function findAll() : array;
    }

    class TodolistRepositoryImpl implements TodolistRepository{

        
        private \PDO $connection;

        public function __construct(\PDO $connection)
        {
            $this->connection = $connection;
        }

        public function save(Todolist $todolist) : void
        {
            $sql = "INSERT INTO todolist(todo) value(?)";
            $statment = $this->connection->prepare($sql);
            $statment->execute([$todolist->getTodo()]);
        }

        public function remove(int $number): bool
        {

            $sql = "SELECT * FROM todolist WHERE id = ?";
            $stament = $this->connection->prepare($sql);
            $stament->execute([$number]);

            if($stament->fetch()){
                $sql = "DELETE FROM todolist WHERE id = ?";
                $statment = $this->connection->prepare($sql);
                $statment->execute([$number]);

                return true;
            }else{
                return false;
            }
            
        }

        public function findAll(): array
        {

            $sql = "SELECT id, todo FROM todolist";
            $stament = $this->connection->prepare($sql);
            $stament->execute();

            $result = [];


            foreach($stament as $row){
                $todlist = new Todolist();
                $todlist->setId($row["id"]);
                $todlist->setTodo($row["todo"]);
                $result[] = $todlist;
            }
            return $result;
        }
    }

}