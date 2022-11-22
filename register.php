<?php 
require 'functions.php';
require 'header.php';

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "  
            <script>
                alert('Registrasi Berhasil!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo mysqli_error($conn);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Registrasi</title>
    <style>
        label {
            display: block;
        }
    </style>

<body>

<div class="container">
    <center><h1>Halaman Registrasi</h1></center>

    <form action="" method="post">

                <label for="email" class="form-label">Username :</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="Username" required>

                <label for="password" class="form-label">Password :</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>

                <label for="password2" class="form-label">Konfirmasi Password :</label>
                <input type="password" name="password2" id="password2" class="form-control" placeholder="Konfirmasi Password" required>

                <button type="submit" name="register" style = "margin-top: 10px;" class="btn btn-primary">Register</button>

    </form>
</div>


</body>
</html>