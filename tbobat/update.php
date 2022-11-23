<?php 

session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: ../login.php");
    exit;
} 

require 'funcobat.php';
require '../appearance/header.php';
$id = $_GET["id"];

$dataobat = query("SELECT * FROM tb_obat WHERE id_obat = '$id'")[0];


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
                        <strong>Failed!</strong> Data Failed To Update!
                    </div>
                    ";
                }
            }
        ?>
    </div>
</head>
<body>
    
    <center><h1>Update Medicine Data</h1></center>

    <div class="container">    
        <form action="" method="post">
        <input type="hidden" name="prev_id" value="<?= $dataobat["id_obat"]; ?>">
        
                <label for="id_obat" class="form-label">Medicine ID : </label>
                <input type="text" name="id_obat" class="form-control" required value = "<?= $dataobat["id_obat"] ?>">

                <label for="nama_obat" class="form-label">Medicine Name : </label>
                <input type="text" name="nama_obat" class="form-control" required value = "<?= $dataobat["nama_obat"] ?>">

                <label for="ket_obat" class="form-label">Description : </label>
                <input type="text" name="ket_obat" class="form-control" required value = "<?= $dataobat["ket_obat"] ?>">
            
                <button style="margin-top: 10px;" class="btn btn-primary" type="submit" name="submit" required>Update Data</button>
    
        </form>
    </div>

</body>
</html>