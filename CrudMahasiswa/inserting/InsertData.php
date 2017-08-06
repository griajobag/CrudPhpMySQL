<?php

/**
 * Created by PhpStorm.
 * User: putuguna
 * Date: 2/1/2017
 * Time: 7:21 AM
 */

require_once("../db/Connection.php");
class InsertData{
    function startInsert(){

        //get the connection to Database
        $connection = new Connection();
        $conn = $connection->getConnection();

        //get the value from form
        $nama       = $_POST['nama'];
        $jurusan    = $_POST['jurusan'];
        $fakultas   = $_POST['fakultas'];

        try{
            if(isset($nama) && isset($jurusan) && isset($fakultas)){
                $sqlInsert = "INSERT INTO datadiri (nama, jurusan, fakultas) VALUES ('$nama', '$jurusan', '$fakultas')";
                $conn->exec($sqlInsert);
                header('Location: ../displaying/DisplayData.php');
            }
        }catch (PDOException $e){
            echo "Failed while inserting data".$e->getMessage();
        }
    }
}

$inserting = new InsertData();
$inserting->startInsert();