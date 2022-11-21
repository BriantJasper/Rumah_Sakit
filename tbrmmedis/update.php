<?php 

// session_start();

// if ( !isset($_SESSION["login"]) ) {
//     header("Location: login.php");
//     exit;
// } 

require 'funcpoliklinik.php';
require '../appearance/header.php';
$id = $_GET["id"];

$datapoli = query("SELECT * FROM tb_poliklinik WHERE id_poli = '$id'")[0];


?>

<!DOCTYPE html>
<head>
    <title>Update Policlinic Data</title>

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
    
    <center><h1>Update Policlinic Data</h1></center>


    <div class="container">    
        <form action="" method="post">
        <input type="hidden" name="prev_id" value="<?= $datapoli["id_poli"]; ?>">
        
                <label for="id_poli" class="form-label">Policlinic ID : </label>
                <input type="text" name="id_poli" class="form-control" required value = "<?= $datapoli["id_poli"] ?>">

                <label for="nama_poli" class="form-label">Policlinic Name : </label>
                <input type="text" name="nama_poli" class="form-control" required value = "<?= $datapoli["nama_poli"] ?>">
           
                <label for="gedung" class="form-label">Building : </label>
                <input type="text" name="gedung" class="form-control" required value = "<?= $datapoli["gedung"] ?>">
            
                <button style="margin-top: 10px;" class="btn btn-primary" type="submit" name="submit" required>Update Data</button>
    
        </form>
    </div>

</body>
</html>