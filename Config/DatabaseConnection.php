<?php

namespace Config{

    class DatabaseConnection{
        static function getConnection() : \PDO{
            $user = "root";
            $password = "";
            $host = "localhost";
            $port = "3306";
            $database = "todolist";

            return new \PDO("mysql:host=$host:$port;dbname=$database", $user, $password);
        }
    }
}



