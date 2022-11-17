<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
} 

require 'funcdokter.php';
require '../appearance/header.php';


?>

<head>
    <style></style>
    <title>Insert Doctor Data</title>

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
    <center><h1>Insert Doctor Data</h1></center>

    <div class="container">
        <form action="" method="post">
        
                <label for="id_dokter" class="form-label">Doctor ID : </label>
                <input type="text" name="id_dokter" class="form-control" placeholder="Insert Doctor ID" required>
            
                <label for="nama_dokter" class="form-label">Doctor Name : </label>
                <input type="text" name="nama_dokter" class="form-control" placeholder="Doctor Name" required>
            
                <label for="spesialis" class="form-label">Specialist : </label>
                <input type="text" name="spesialis" class="form-control" placeholder="Specialist" required>
            
                <label for="alamat" class="form-label">Address : </label>
                <input type="text" name="alamat" class="form-control" placeholder="Insert Address" required>
            
                <label for="no_telp" class="form-label">Phone Number : </label>
                <input type="text" name="no_telp" class="form-control" placeholder="Insert Phone Number" required>

            <button style="margin-top: 10px;" class="btn btn-primary" type="submit" name="submit">Add Data</button>
        </form>
    </div>

</body>
</html>