<?php 
// session_start();

// if ( !isset($_SESSION["login"]) ) {
//     header("Location: login.php");
//     exit;
// } 

require 'funcrmobat.php';
require '../appearance/header.php';

$tbrm = query('SELECT id_rm FROM tb_rekammedis');
$tbpasien = query('SELECT nama_pasien FROM tb_pasien');
$tbdokter = query('SELECT nama_dokter FROM tb_dokter');
$tbobat = query('SELECT nama_obat FROM tb_obat');

?>

<head>
    <style></style>
    <title>Medicine Record Data</title>

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
    <center><h1>Insert Medicine Record Data</h1></center>

    <div class="container">
        <form action="" method="post">

            <!-- Patient ID Option Input -->
            <div class="mt-2">
                <label style="margin-bottom:10px ;" for="id_rm">Medical Record ID :</label>
                <div class="br"></div>
                <select name="id_rm" class="form-select" required>
                    <option value="">Select Patient Name</option>
                    <?php foreach ($tbrm as $rm) : ?>
                        <option value="<?= $rm["id_rm"] ?>"> <?= $rm["id_rm"] ?> </option>
                    <?php endforeach; ?>
                </select>
                <div class="br"></div>
            </div>
            <!-- End of Patient ID Option Input -->

            <!-- Patient ID Option Input -->
            <div class="mt-2">
                <label style="margin-bottom:10px ;" for="nama_obat">Medicine Record :</label>
                <div class="br"></div>
                <select name="nama_obat" class="form-select" required>
                    <option value="">Select Medicine Name</option>
                    <?php foreach ($tbobat as $o) : ?>
                        <option value="<?= $o["nama_obat"] ?>"> <?= $o["nama_obat"] ?> </option>
                    <?php endforeach; ?>
                </select>
                <div class="br"></div>
            </div>
            <!-- End of Patient ID Option Input -->
            


            <button style="margin-top: 10px;" class="btn btn-primary" type="submit" name="submit">Add Data</button>
        </form>
    </div>

</body>
</html>
