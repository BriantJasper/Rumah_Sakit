<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: ../login.php");
    exit;
} 

require 'funcpasien.php';
require '../appearance/header.php';


?>

<head>
    <style></style>
    <title>Insert Patient Data</title>

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
    <center><h1>Insert Patient Data</h1></center>

    <div class="container">
        <form action="" method="post">
        
                <label for="id_pasien" class="form-label">Patient ID : </label>
                <input type="text" name="id_pasien" class="form-control" placeholder="Patient ID" required>
            
                <label for="nomor_identitas" class="form-label">Identity Number : </label>
                <input type="text" name="nomor_identitas" class="form-control" placeholder="Identity Number" required>
            
                <label for="nama_pasien" class="form-label">Patient Name : </label>
                <input type="text" name="nama_pasien" class="form-control" placeholder="Patient Name" required>
            <!-- Radio Button Insert -->
            <div class="mb-2 mt-2">
                <label for="jenis_kelamin">Jenis Kelamin : </label>
                <div class="br"></div>
                    <input type="radio" name="jenis_kelamin" value="L" required>
                    <label for="jenis_kelamin">Laki-Laki</label>
                <div class="br"></div>
                    <input type="radio" name="jenis_kelamin" value="P" required>
                    <label for="jenis_kelamin">Perempuan</label>
                <div class="br"></div>
            </div>
            <!-- End Of Radio Button Insert -->
                <label for="alamat" class="form-label">Address : </label>
                <input type="text" name="alamat" class="form-control" placeholder="Address" required>
            
                <label for="no_telp" class="form-label">Phone Number : </label>
                <input type="text" name="no_telp" class="form-control" placeholder="Phone Number" required>

            <button style="margin-top: 10px;" class="btn btn-primary" type="submit" name="submit">Add Data</button>
        </form>
    </div>

</body>
</html>