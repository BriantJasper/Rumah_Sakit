<?php 

session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: ../login.php");
    exit;
} 

require 'funcdokter.php';
require '../appearance/header.php';
$id = $_GET["id"];

$datadokter = query("SELECT * FROM tb_dokter WHERE id_dokter = '$id'")[0];


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
                    <script>document.location.href = 'tbdokter.php'</script>
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
        <input type="hidden" name="prev_id" value="<?= $datadokter["id_dokter"]; ?>">
        
                <label for="id_dokter" class="form-label">Doctor ID  : </label>
                <input type="text" name="id_dokter" class="form-control" required value = "<?= $datadokter["id_dokter"] ?>">
           
                <label for="nama_dokter" class="form-label">Doctor Name : </label>
                <input type="text" name="nama_dokter" class="form-control" required value = "<?= $datadokter["nama_dokter"] ?>">
           
                <label for="spesialis" class="form-label">Specialist : </label>
                <input type="text" name="spesialis" class="form-control" required value = "<?= $datadokter["spesialis"] ?>">
            
                <label for="alamat" class="form-label">Address : </label>
                <input type="text" name="alamat" class="form-control" required value = "<?= $datadokter["alamat"] ?>">
            
                <label for="no_telp" class="form-label">Phone Number : </label>
                <input type="text" name="no_telp" class="form-control" required value = "<?= $datadokter["no_telp"] ?>">
            
                <button style="margin-top: 10px;" class="btn btn-primary" type="submit" name="submit" required>Update Data</button>
    
        </form>
    </div>
<?php require '../appearance/footer.php'; ?>
</body>
</html>