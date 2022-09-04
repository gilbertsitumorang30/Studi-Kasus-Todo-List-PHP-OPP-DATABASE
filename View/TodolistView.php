<?php

namespace View{

    include_once __DIR__ . "/../Service/TodolistService.php";
    include_once __DIR__ . "/../Helper/InputHelper.php";

    use Helper\InputHelper;
    use Service\TodolistService;
    use Service\TodolistServiceImpl;

    class TodolistView{

        private TodolistServiceImpl $todolistService;

        function __construct(TodolistService $todolistService)
        {
            $this->todolistService = $todolistService;
        }

        public function showTodolist(){

            while(true){
                
            $this->todolistService->showTodolist();

            echo "MENU" . PHP_EOL;
            echo "1. Tambah Todo" . PHP_EOL;
            echo "2. Hapus Todo" . PHP_EOL;
            echo "x. Keluar" . PHP_EOL;

            $pilihan = InputHelper::getInput("pilihan");

                if($pilihan == 1){
                    $this->addTodolist();
                }else if($pilihan == 2){
                    $this->removeTodolist();
                }else if($pilihan == "x"){
                    break;
                }else{
                    echo "Tidak dimengerti" . PHP_EOL;
                }
            }
            echo "Sampai Jumpa" . PHP_EOL;
        }

        public function addTodolist(){

            $todo = InputHelper::getInput("todo (x untuk batal)");
            if ($todo == "x") {
                echo "Batal menambah todo" . PHP_EOL;
            } else {
            $this->todolistService->addTodolist($todo);
            }
        }

        public function removeTodolist(){
            $id = InputHelper::getInput("id (x untuk batal");
            if ($id == "x") {
                echo "Batal menghapus todo" . PHP_EOL;
            } else {
            $this->todolistService->removeTodolist($id);
            }
        }
    }
}