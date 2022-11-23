<?php 

session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: ../login.php");
    exit;
} 

require 'funcrmobat.php';
require '../appearance/header.php';

$tbobat = query("SELECT nama_obat FROM tb_obat");
$datarm = query("SELECT id_rm FROM tb_rekammedis");



$id = $_GET["id"];

$data_rm_obat = query("SELECT * FROM tb_rm_obat WHERE id = '$id'")[0];


$id_rm = query("SELECT id_rm FROM tb_rm_obat WHERE id = '$id'")[0]["id_rm"];
$id_obat = query("SELECT id_obat FROM tb_rm_obat WHERE id ='$id'")[0]["id_obat"];


$nama_obat = query("SELECT nama_obat FROM tb_obat WHERE id_obat ='$id_obat'")[0]["nama_obat"];


?>


<!DOCTYPE html>
<head>
    <title>Update Medical Record Data</title>

        <?php if (isset($_POST["submit"])) {
                if (ubah($_POST) > 0) {
                    echo "
                    <div class='alert alert-success'>
                        <strong>Success!</strong> Data Successfully Updated!
                    </div>
                    ";
                } else {
                    echo "
                    <div class='alert alert-danger'>
                        <strong>Failed!</strong> Data Failed To Update!
                    </div>
                    ";
                }
            }
        ?>
    </div>
</head>
<body>\


    <div class="container"> 
    <center><h1>Update Medical Record Data</h1></center>

       
        <form action="" method="post">
        <input type="hidden" name="id" value="<?= $data_rm_obat["id"]; ?>">

            <div class="mt-2">
                <label style="margin-bottom:10px ;" for="id_rm">Medical Record :</label>
                <div class="br"></div>
                <select name="id_rm" class="form-select" required>
                    <option value="<?= $id_rm ?>"><?= $id_rm ?></option>
                    <?php foreach ($datarm as $rm) : ?>
                        <option value="<?= $rm["id_rm"] ?>"> <?= $rm["id_rm"] ?> </option>
                    <?php endforeach; ?>
                </select>
                <div class="br"></div>
            </div>
            <!-- End of Rekam Medis Option Input -->
           
            <!-- Medicine ID Option Input -->
            <div class="mt-2">
                <label style="margin-bottom:10px ;" for="nama_obat">Medicine Name :</label>
                <div class="br"></div>
                <select name="nama_obat" class="form-select" required>
                    <option value="<?= $nama_obat ?>"><?= $nama_obat ?></option>
                    <?php foreach ($tbobat as $o) : ?>
                        <option value="<?= $o["nama_obat"] ?>"> <?= $o["nama_obat"] ?> </option>
                    <?php endforeach; ?>
                </select>
                <div class="br"></div>
            </div>
            <!-- End of Medicine ID Option Input -->

                <button style="margin-top: 10px;" class="btn btn-primary" type="submit" name="submit" required>Update Data</button>
    
        </form>
    </div>

</body>
</html>