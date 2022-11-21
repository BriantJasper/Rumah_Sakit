<?php 
// session_start();

// if ( !isset($_SESSION["login"]) ) {
//     header("Location: login.php");
//     exit;
// } 

require 'funcpoliklinik.php';
require '../appearance/header.php';


?>

<head>
    <style></style>
    <title>Insert Policlinic Data</title>

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
        
                <label for="id_poli" class="form-label">Policlinic ID : </label>
                <input type="text" name="id_poli" class="form-control" placeholder="Policlinic ID" required>
            
                <label for="nama_poli" class="form-label">Policlinic Name : </label>
                <input type="text" name="nama_poli" class="form-control" placeholder="Policlinic Name" required>
            
                <label for="gedung" class="form-label">Building : </label>
                <input type="text" name="gedung" class="form-control" placeholder="Building" required>

            <button style="margin-top: 10px;" class="btn btn-primary" type="submit" name="submit">Add Data</button>
        </form>
    </div>

</body>
</html>