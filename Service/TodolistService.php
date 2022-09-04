<?php

namespace Service{

    include_once __DIR__ . "/../Entyty/Todolist.php";

    use Entitiy\Todolist;
    use Repository\TodolistRepository;

    interface TodolistService{

        public function showTodolist(): void;

        public function addTodolist(string $todo): void;

        public function removeTodolist(int $number): void;

    }

    class TodolistServiceImpl implements TodolistService{

        private TodolistRepository $todolistRepository;

        function __construct(TodolistRepository $todolistRepository)
        {
            $this->todolistRepository = $todolistRepository;
        }
        
        public function showTodolist(): void
        {
            echo "TODOLIST" . PHP_EOL;
            $todolist = $this->todolistRepository->findAll();
            foreach($todolist as $number => $value){
                echo $value->getId() . ". " . $value->getTodo() . PHP_EOL;
            }
        }

        public function addTodolist(string $todo): void
        {
            $todo = new Todolist($todo);
            $this->todolistRepository->save($todo);
            echo "Sukses Menambah Todolist";
        }

        public function removeTodolist(int $number): void
        {
            if($this->todolistRepository->remove($number)){
                echo "Sukses Menghapus Todolist" . PHP_EOL;
            }else{
                echo "Gagal Menghapus Todolist" . PHP_EOL;
            }
        }
    }
}