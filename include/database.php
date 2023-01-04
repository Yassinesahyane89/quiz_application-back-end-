<?php

class Connection{
    
    protected function connect(){
        $host = "localhost";
        $user = "root";
        $password = "";
        $db = "quizapp";

        try{
            $connection = "mysql:host=$host;dbname=$db;charset=utf8mb4";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,//exeception 
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $pdo = new PDO($connection, $user, $password, $options);
            return $pdo;
        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }
    }
}