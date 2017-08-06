<?php

/**
 * Created by PhpStorm.
 * User: putuguna
 * Date: 2/1/2017
 * Time: 9:12 AM
 */
require_once("../db/Connection.php");
class DisplayDataForUpdate{
    function getDataById(){
        $connection = new Connection();
        $conn = $connection->getConnection();

        $id         = $_GET['id'];

        try{
            $sqlDisplayData = "SELECT * FROM datadiri WHERE id=$id";
            $result = $conn->prepare($sqlDisplayData);
            $result->execute();
            $dataById = $result->fetchAll(PDO::FETCH_ASSOC);

            foreach($dataById as $data){
            ?>
                <table align="center">
                    <form method="post" action="UpdateData.php?id=<?php echo $id?>" enctype="multipart/form-data">
                        <tr>
                            <td>Nama :</td>
                            <td><input type="text" name="nama" value="<?php echo $data['nama']?>" placeholder="Nama Mahasiswa"></td>
                        </tr>
                        <tr>
                            <td>Jurusan :</td>
                            <td><input type="text" name="jurusan" value="<?php echo $data['jurusan']?>" placeholder="Jurusan Mahasiswa"></td>
                        </tr>
                        <tr>
                            <td>Fakultas :</td>
                            <td><input type="text" name="fakultas" value="<?php echo $data['fakultas']?>" placeholder="Fakultas Mahasiswa"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right">
                                <input type="submit" name="save" value="Update">
                            </td>
                        </tr>
                    </form>
                </table>
            <?php

            }
        }catch (PDOException $e){
            echo "Error while displaying data : " . $e->getMessage();
        }
    }
}

$displayDataForUpdate = new DisplayDataForUpdate();
$displayDataForUpdate->getDataById();