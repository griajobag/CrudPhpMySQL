<?php

/**
 * Created by PhpStorm.
 * User: putuguna
 * Date: 2/1/2017
 * Time: 8:49 AM
 */
require_once("../db/Connection.php");
class DeleteData{
    function startDelete(){
        $connection = new Connection();
        $conn = $connection->getConnection();

        $idmahasiswa    = $_GET['id'];

        try{
            $sqlDelete = "DELETE FROM datadiri WHERE id=$idmahasiswa";
            $delete = $conn->prepare($sqlDelete);
            $delete->execute();

            header('Location: ../displaying/DisplayData.php');
        }catch (PDOException $e){
            echo "Failed to delete data : " . $e->getMessage();
        }
    }
}

$delete = new DeleteData();
$delete->startDelete();