<?php


include_once __DIR__ . "/../Service/TodolistService.php";
include_once __DIR__ . "/../Repository/TodolistRepository.php";
include_once __DIR__ . "/../Config/DatabaseConnection.php";

use Config\DatabaseConnection;
use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;

function testAddTodolist(){

    $connection = DatabaseConnection::getConnection();
    $todolistRepository = new TodolistRepositoryImpl($connection);
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->addTodolist("halo dunia");
    $todolistService->addTodolist("apa kabar lae");
}

function testShowTodolist(){

    $connection = DatabaseConnection::getConnection();
    $todolistRepository = new TodolistRepositoryImpl($connection);
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->showTodolist();
}

function testRemoveTodolist(){

    $connection = DatabaseConnection::getConnection();
    $todolistRepository = new TodolistRepositoryImpl($connection);
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->removeTodolist(2);
}

testShowTodolist();
testRemoveTodolist();
testShowTodolist();