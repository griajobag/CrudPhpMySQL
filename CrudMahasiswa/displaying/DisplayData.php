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

                ?>

            <!-- START HTML FILE -->

                <!-- START ADDING LIBRARY -->
                <link rel="stylesheet" href="../datatables/jquery.dataTables.css">
                <script src="../datatables/jquery-1.12.1.min.js"></script><!-- -->
                <script src="../datatables/jquery.dataTables.js"></script><!-- -->
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#tablemahasiswa').dataTable(); // Menjalankan plugin DataTables pada id tablemahasiswa. id tablemahasiswa merupakan tabel yang kita gunakan untuk menampilkan data
                    } );
                </script>
                <!-- END ADDING LIBRARY -->

                <!-- PRINT DATA TO THE TABLE -->
                <table id="tablemahasiswa" border="">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jurusan</th>
                            <th>Fakultas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($getAll as $data){ ?>
                        <tr>
                            <td><?php echo $data['nama']?></td>
                            <td><?php echo $data['jurusan']?></td>
                            <td><?php echo $data['fakultas']?></td>
                            <td><a href="../deleting/DeleteData.php?id=<?php echo $data['id']?>">Delete</a>
                                || <a href="../updating/DisplayDataForUpdate.php?id=<?php echo $data['id']?>">Update</a>
                            </td>
                        </tr>
                    <?php }?>
                    </tbody>
                    <a href="../inserting/FormInsertData.html">+ Tambah Data</a>
                    <br>
                    <br>
                </table>
            <!-- END HTML FILE -->
                <?php

        }catch (PDOException $e){
            echo "Failed while displaying data " . $e->getMessage();
        }
    }
}

$getData = new DisplayData();
$getData->getAllData();