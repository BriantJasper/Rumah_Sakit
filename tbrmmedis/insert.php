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

?>

<head>
    <style></style>
    <title>Insert Policlinic Data</title>

    <?php if (isset($_POST["submit"])) {
            if (tambah($_POST) > 0) {
                echo "
                <div class='alert alert-success'>
                    <strong>Success!</strong> Data Successfully Added!
                </div>
                ";
            } else {
                echo "
                <div class='alert alert-danger'>
                    <strong>Failed!</strong> Failed to Add Data!
                </div>
                ";
            }
        }
    ?>

</div>
</head>

<body>
    <center><h1>Insert Medical Record Data</h1></center>

    <div class="container">
        <form action="" method="post">
        
                <label for="id_rm" class="form-label">Medical Record ID : </label>
                <input type="text" name="id_rm" class="form-control" placeholder="Insert Medical Record ID" required>

            <!-- Patient ID Option Input -->
            <div class="mt-2">
                <label style="margin-bottom:10px ;" for="nama_pasien">Patient Name :</label>
                <div class="br"></div>
                <select name="nama_pasien" class="form-select" required>
                    <option value="">Select Patient Name</option>
                    <?php foreach ($tbpasien as $p) : ?>
                        <option value="<?= $p["nama_pasien"] ?>"> <?= $p["nama_pasien"] ?> </option>
                    <?php endforeach; ?>
                </select>
                <div class="br"></div>
            </div>
            <!-- End of Patient ID Option Input -->

                <label for="keluhan" class="form-label">Complaint : </label>
                <input type="text" name="keluhan" class="form-control" placeholder="Insert Complaint" required>

            <!-- Doctor ID Option Input -->
            <div class="mt-2">
                <label style="margin-bottom:10px ;" for="nama_dokter">Doctor Name :</label>
                <div class="br"></div>
                <select name="nama_dokter" class="form-select" required>
                    <option value="">Select Doctor Name</option>
                    <?php foreach ($tbdokter as $d) : ?>
                        <option value="<?= $d["nama_dokter"] ?>"> <?= $d["nama_dokter"] ?> </option>
                    <?php endforeach; ?>
                </select>
                <div class="br"></div>
            </div>
            <!-- End of Doctor ID Option Input -->
            
                <label for="diagnosa" class="form-label">Diagnose : </label>
                <input type="text" name="diagnosa" class="form-control" placeholder="Insert Diagnose" required>

            <!-- Policlinic ID Option Input -->
            <div class="mt-2">
                <label style="margin-bottom:10px ;" for="nama_poli">Policlinic Name :</label>
                <div class="br"></div>
                <select name="nama_poli" class="form-select" required>
                    <option value="">Select Policlinic Name</option>
                    <?php foreach ($tbpoliklinik as $p) : ?>
                        <option value="<?= $p["nama_poli"] ?>"> <?= $p["nama_poli"] ?> </option>
                    <?php endforeach; ?>
                </select>
                <div class="br"></div>
            </div>
            <!-- End of Policlinic ID Option Input -->
            
                <label for="tgl_periksa" class="form-label">Check Date : </label>
                <input type="date" name="tgl_periksa" class="form-control" placeholder="Insert Check Date" required>

            <button style="margin-top: 10px;" class="btn btn-primary" type="submit" name="submit">Add Data</button>
        </form>
    </div>

</body>
</html>
