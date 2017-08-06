<?php

/**
 * Created by PhpStorm.
 * User: putuguna
 * Date: 2/1/2017
 * Time: 7:17 AM
 */
class Connection{
    function getConnection(){
        $host       = "localhost";
        $username   = "root";
        $password   = "";
        $dbname     = "mahasiswa";

        try{
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch (PDOException $e){
            echo "Error while connecting " . $e->getMessage();
        }
    }
}