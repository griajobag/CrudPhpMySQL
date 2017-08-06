<?php

/**
 * Created by PhpStorm.
 * User: putuguna
 * Date: 2/1/2017
 * Time: 7:50 AM
 */

require_once("../db/Connection.php");
class DisplayData{
    function getAllData(){
        $connection = new Connection();
        $conn = $connection->getConnection();

        try{
            $sqlInsert  = "SELECT * FROM datadiri";
            $getAll = $conn->prepare($sqlInsert);
            $getAll->execute();

            foreach($getAll as $data){
                ?>
                        <table border="1" align="center">
                            <tr>
                                <td colspan="4">
                                    <a href="../inserting/FormInsertData.html">+ Tambah Data</a>
                                </td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>Nama</td>
                                <td>Jurusan</td>
                                <td>Fakultas</td>
                                <td>Action</td>
                            </tr>
                            <tr>
                                <td><?php echo $data['nama']?></td>
                                <td><?php echo $data['jurusan']?></td>
                                <td><?php echo $data['fakultas']?></td>
                                <td><a href="../deleting/DeleteData.php?id=<?php echo $data['id']?>">Delete</a>
                                    || <a href="../updating/DisplayDataForUpdate.php?id=<?php echo $data['id']?>">Update</a>
                                </td>
                            </tr>
                        </table>

                <?php
            }
        }catch (PDOException $e){
            echo "Failed while displaying data " . $e->getMessage();
        }
    }
}

$getData = new DisplayData();
$getData->getAllData();