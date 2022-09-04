<?php

include_once __DIR__ . "/View/TodolistView.php";
include_once __DIR__ . "/Service/TodolistService.php";
include_once __DIR__ . "/Repository/TodolistRepository.php";
include_once __DIR__ . "/Config/DatabaseConnection.php";

use Config\DatabaseConnection;
use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;
use View\TodolistView;

$connection = DatabaseConnection::getConnection(); 
$todolistRepository = new TodolistRepositoryImpl($connection);
$todolistService = new TodolistServiceImpl($todolistRepository);
$todolist = new TodolistView($todolistService);
$todolist->showTodolist();