<?php 
// session_start();

// if ( !isset($_SESSION["login"]) ) {
//     header("Location: login.php");
//     exit;
// } 

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
            
                <label for="jenis_kelamin" class="form-label">Gender : </label>
                <input type="text" name="jenis_kelamin" class="form-control" placeholder="Gender" required>
            
                <label for="no_telp" class="form-label">Phone Number : </label>
                <input type="text" name="no_telp" class="form-control" placeholder="Phone Number" required>

            <button style="margin-top: 10px;" class="btn btn-primary" type="submit" name="submit">Add Data</button>
        </form>
    </div>

</body>
</html>