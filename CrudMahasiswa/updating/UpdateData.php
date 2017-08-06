<?php

/**
 * Created by PhpStorm.
 * User: putuguna
 * Date: 2/1/2017
 * Time: 9:03 AM
 */
require_once("../db/Connection.php");
class UpdateData{
    function startUpdate(){
        $connection = new Connection();
        $conn = $connection->getConnection();

        $id         = $_GET['id'];
        $nama       = $_POST['nama'];
        $jurusan    = $_POST['jurusan'];
        $fakultas  = $_POST['fakultas'];

        try{
            $sqlUpdate = "UPDATE datadiri SET nama='$nama', jurusan='$jurusan', fakultas='$fakultas' WHERE id=$id";
            $update = $conn->prepare($sqlUpdate);
            $update->execute();
            header('Location: ../displaying/DisplayData.php');
        }catch (PDOException $e){
            echo "Failed while updating data : " . $e->getMessage();
        }
    }
}

$update = new UpdateData();
$update->startUpdate();