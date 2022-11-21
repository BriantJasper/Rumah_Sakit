<?php 

// session_start();

// if ( !isset($_SESSION["login"]) ) {
//     header("Location: login.php");
//     exit;
// } 

require 'funcrmmedis.php';
require '../appearance/header.php';

$tbpasien = query('SELECT nama_pasien FROM tb_pasien');
$tbdokter = query('SELECT nama_dokter FROM tb_dokter');
$tbpoliklinik = query('SELECT nama_poli FROM tb_poliklinik');


$id = $_GET["id"];
$datarm = query("SELECT * FROM tb_rekammedis WHERE id_rm = '$id'")[0];

$id_pasien = query("SELECT id_pasien FROM tb_rekammedis WHERE id_rm ='$id'")[0]["id_pasien"];
$id_dokter = query("SELECT id_dokter FROM tb_rekammedis WHERE id_rm ='$id'")[0]["id_dokter"];
$id_poli = query("SELECT id_poli FROM tb_rekammedis WHERE id_rm ='$id'")[0]["id_poli"];



$nama_pasien = query("SELECT nama_pasien FROM tb_pasien WHERE id_pasien ='$id_pasien'")[0]["nama_pasien"];
$nama_dokter = query("SELECT nama_dokter FROM tb_dokter WHERE id_dokter ='$id_dokter'")[0]["nama_dokter"];
$nama_poli = query("SELECT nama_poli FROM tb_poliklinik WHERE id_poli ='$id_poli'")[0]["nama_poli"];
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
<body>
    
    <center><h1>Update Medical Record Data</h1></center>


    <div class="container">    
        <form action="" method="post">
        <input type="hidden" name="prev_id" value="<?= $datarm["id_rm"]; ?>">

                <label for="id_rm" class="form-label">Medical Record ID : </label>
                <input type="text" name="id_rm" class="form-control" required value = "<?= $datarm["id_rm"] ?>">

            <!-- Patient ID Option Input -->
            <div class="mt-2">
                <label style="margin-bottom:10px ;" for="nama_pasien">Patient Name :</label>
                <div class="br"></div>
                <select name="nama_pasien" class="form-select" required>
                    <option value="<?= $nama_pasien ?>"><?= $nama_pasien ?></option>
                    <?php foreach ($tbpasien as $p) : ?>
                        <option value="<?= $p["nama_pasien"] ?>"> <?= $p["nama_pasien"] ?> </option>
                    <?php endforeach; ?>
                </select>
                <div class="br"></div>
            </div>
            <!-- End of Patient ID Option Input -->
           
                <label for="keluhan" class="form-label">Complain : </label>
                <input type="text" name="keluhan" class="form-control" required value = "<?= $datarm["keluhan"] ?>">
           
            <!-- Doctor ID Option Input -->
            <div class="mt-2">
                <label style="margin-bottom:10px ;" for="nama_dokter">Doctor Name :</label>
                <div class="br"></div>
                <select name="nama_dokter" class="form-select" required>
                    <option value="<?= $nama_dokter ?>"><?= $nama_dokter ?></option>
                    <?php foreach ($tbdokter as $d) : ?>
                        <option value="<?= $d["nama_dokter"] ?>"> <?= $d["nama_dokter"] ?> </option>
                    <?php endforeach; ?>
                </select>
                <div class="br"></div>
            </div>
            <!-- End of Doctor ID Option Input -->
           
                <label for="diagnosa" class="form-label">Diagnose : </label>
                <input type="text" name="diagnosa" class="form-control" required value = "<?= $datarm["diagnosa"] ?>">
           
            <!-- Policlinic ID Option Input -->
            <div class="mt-2">
                <label style="margin-bottom:10px ;" for="nama_poli">Policlinic Name :</label>
                <div class="br"></div>
                <select name="nama_poli" class="form-select" required>
                    <option value="<?= $nama_poli ?>"><?= $nama_poli ?></option>
                    <?php foreach ($tbpoliklinik as $p) : ?>
                        <option value="<?= $p["nama_poli"] ?>"> <?= $p["nama_poli"] ?> </option>
                    <?php endforeach; ?>
                </select>
                <div class="br"></div>
            </div>
            <!-- End of Policlinic ID Option Input -->
           
                <label for="tgl_periksa" class="form-label">Check Date : </label>
                <input type="date" name="tgl_periksa" class="form-control" required value = "<?= $datarm["tgl_periksa"] ?>">
            
                <button style="margin-top: 10px;" class="btn btn-primary" type="submit" name="submit" required>Update Data</button>
    
        </form>
    </div>

</body>
</html>