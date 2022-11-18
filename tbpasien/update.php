<?php 

// session_start();

// if ( !isset($_SESSION["login"]) ) {
//     header("Location: login.php");
//     exit;
// } 

require 'funcpasien.php';
require '../appearance/header.php';
$id = $_GET["id"];

$datapasien = query("SELECT * FROM tb_pasien WHERE id_pasien = '$id'")[0];


?>

<!DOCTYPE html>
<head>
    <title>Update Patient Data</title>

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
    
    <center><h1>Update Doctor Data</h1></center>


    <div class="container">    
        <form action="" method="post">
        <input type="hidden" name="prev_id" value="<?= $datapasien["id_pasien"]; ?>">
        
                <label for="id_pasien" class="form-label">Patient ID : </label>
                <input type="text" name="id_pasien" class="form-control" required value = "<?= $datapasien["id_pasien"] ?>">
           
                <label for="nomor_identitas" class="form-label">Identity Number : </label>
                <input type="text" name="nomor_identitas" class="form-control" required value = "<?= $datapasien["nomor_identitas"] ?>">
           
                <label for="nama_pasien" class="form-label">Patient Name : </label>
                <input type="text" name="nama_pasien" class="form-control" required value = "<?= $datapasien["nama_pasien"] ?>">

                <label for="jenis_kelamin" class="form-label">Patient Gender : </label>
                <input type="text" name="jenis_kelamin" class="form-control" required value = "<?= $datapasien["jenis_kelamin"] ?>">
            
                <label for="alamat" class="form-label">Address : </label>
                <input type="text" name="alamat" class="form-control" required value ="<?= $datapasien["alamat"] ?>">
            
                <label for="no_telp" class="form-label">Phone Number : </label>
                <input type="text" name="no_telp" class="form-control" required value = "<?= $datapasien["no_telp"] ?>">
            
                <button style="margin-top: 10px;" class="btn btn-primary" type="submit" name="submit" required>Update Data</button>
    
        </form>
    </div>

</body>
</html>