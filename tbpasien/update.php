<?php 

// session_start();

// if ( !isset($_SESSION["login"]) ) {
//     header("Location: login.php");
//     exit;
// } 

require 'funcpasien.php';
require '../appearance/header.php';
$id = $_GET["id"];

$datapasien = query("SELECT * FROM tb_pasien WHERE id_pasien = $id")[0];


?>

<!DOCTYPE html>
<head>
    <title>Update Doctor Data</title>

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
                        <strong>Failed!</strong> Data Failed To Updated!
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
        <input type="hidden" name="id_pasien" value="<?= $datapasien["id_pasien"]; ?>">
        
                <label for="nama_pasien" class="form-label">Doctor Name : </label>
                <input type="text" name="nama_pasien" class="form-control" required value = <?= $datapasien["nama_pasien"] ?>>
           
                <label for="spesialis" class="form-label">Specialist : </label>
                <input type="text" name="spesialis" class="form-control" required value = <?= $datapasien["spesialis"] ?>>
            
                <label for="alamat" class="form-label">Address : </label>
                <input type="text" name="alamat" class="form-control" required value = <?= $datapasien["alamat"] ?>>
            
                <label for="no_telp" class="form-label">Phone Number : </label>
                <input type="text" name="no_telp" class="form-control" required value = <?= $datapasien["no_telp"] ?>>
            
                <button style="margin-top: 10px;" class="btn btn-primary" type="submit" name="submit" required>Update Data</button>
    
        </form>
    </div>

</body>
</html>