<?php 
// session_start();

// if ( !isset($_SESSION["login"]) ) {
//     header("Location: login.php");
//     exit;
// } 

require 'funcobat.php';
require '../appearance/header.php';


?>

<head>
    <style></style>
    <title>Tambah Data Obat</title>

    <?php if (isset($_POST["submit"])) {
            if (tambah($_POST) > 0) {
                echo "
                <div class='alert alert-success'>
                    <strong>Success!</strong> Data Berhasil Ditambahkan!
                </div>
                ";
            } else {
                echo "
                <div class='alert alert-danger'>
                    <strong>Failed!</strong> Data Gagal Ditambahkan!
                </div>
                ";
            }
        }
    ?>

</div>
</head>

<body>
    <center><h1>Tambah Data Obat</h1></center>

    <div class="container">
        <form action="" method="post">
        
                <label for="id_obat" class="form-label">Medicine ID : </label>
                <input type="text" name="id_obat" class="form-control" placeholder="Masukkan nama mata pelajaran" required>
            
                <label for="nama_obat" class="form-label">Medicine Name : </label>
                <input type="text" name="nama_obat" class="form-control" placeholder="Masukkan nama obat" required>
            
                <label for="ket_obat" class="form-label">Description : </label>
                <input type="text" name="ket_obat" class="form-control" placeholder="Masukkan Obat" required>

            <button style="margin-top: 10px;" class="btn btn-primary" type="submit" name="submit">Tambah Data</button>
        </form>
    </div>

</body>
</html>