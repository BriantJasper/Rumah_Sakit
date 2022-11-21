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
    
    <center><h1>Update Patient Data</h1></center>


    <div class="container">    
        <form action="" method="post">
        <input type="hidden" name="prev_id" value="<?= $datapasien["id_pasien"]; ?>">
        
                <label for="id_pasien" class="form-label">Patient ID : </label>
                <input type="text" name="id_pasien" class="form-control" required value = "<?= $datapasien["id_pasien"] ?>">
           
                <label for="nomor_identitas" class="form-label">Identity Number : </label>
                <input type="text" name="nomor_identitas" class="form-control" required value = "<?= $datapasien["nomor_identitas"] ?>">
           
                <label for="nama_pasien" class="form-label">Patient Name : </label>
                <input type="text" name="nama_pasien" class="form-control" required value = "<?= $datapasien["nama_pasien"] ?>">

            <!-- Radio Button Update -->
            <div class="mb-2 mt-2">
                <label for="jenis_kelamin">Jenis Kelamin : </label>
                <div class="br"></div>
                    <input type="radio" name="jenis_kelamin" value="L" required>
                    <label for="jenis_kelamin">Laki-Laki</label>
                <div class="br"></div>
                    <input type="radio" name="jenis_kelamin" value="P" required>
                    <label for="jenis_kelamin">Perempuan</label>
                <div class="br"></div>
                    <label for="jenis_kelamin" style="color: grey;">Currently : <?= $datapasien["jenis_kelamin"] ?></label>
                <div class="br"></div>
            </div>
            <!-- End Of Radio Button Update -->
            
                <label for="alamat" class="form-label">Address : </label>
                <input type="text" name="alamat" class="form-control" required value ="<?= $datapasien["alamat"] ?>">
            
                <label for="no_telp" class="form-label">Phone Number : </label>
                <input type="text" name="no_telp" class="form-control" required value = "<?= $datapasien["no_telp"] ?>">
            
                <button style="margin-top: 10px;" class="btn btn-primary" type="submit" name="submit" required>Update Data</button>
    
        </form>
    </div>

</body>
</html>