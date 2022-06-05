<?php
    define("DB_DATABASE","todo");
    define("DB_USERNAME","root");
    define("DB_PASSWORD","password");
    define("DSN","mysql:host=mysql;charset=utf8;dbname=".DB_DATABASE);

    function db_connect(){
        try{
            $pdo = new PDO(DSN,DB_USERNAME,DB_PASSWORD);
            $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }catch(PDOException $e){
            echo "Error: ".$e ->getMessage();
            die();
        }
    }
?>