<?php 
// session_start();
require 'functions.php';
require 'appearance/header.php';

// cek cookie
if ( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan ID
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ( $key === hash('sha256', $row['username']) ) {
        $_SESSION['login'] = true;
    }
}

// cek session
// if ( isset($_SESSION["login"]) ) {
//     header("Location: index.php");
//     exit;
// }


// cek input username dan password
if ( isset($_POST["login"]) ) {
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username ='$username'");

    // cek username
    if ( mysqli_num_rows($result) === 1 ) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row["password"]) ){ 
            // set session
            $_SESSION["login"] = true;

            // cek remember me
            if ( isset($_POST['remember']) ) {
                // buat cookie

                setcookie('id', $row['id'], time()+60 );
                setcookie('key', hash('sha256', $row['username']), time()+60 );
            }
            
            header("Location: index.php");
            exit;
        }
        
    }

    $error = true;

}


?>

<!DOCTYPE html>
<html lang="en">
<head>

    <style>
        .text-center{
            text-align: center;
        }
    </style>
    <title>Halaman Login</title>

</head>
<body>
    <div class="container">
        <h1 class="text-center">Halaman Login</h1>

        <?php if (isset($error)) : ?>
            <div class='alert alert-danger'>
                    <strong>Failed!</strong> Login Gagal!
            </div>
        <?php endif ?>

        <form action="" method="post">
                    <label for="username" class="form-label">Username :</label>
                    <input type="text" name="username" id="username" class="form-control">

                    <label for="password" class="form-label">Password :</label>
                    <input type="password" name="password" id="password" class="form-control">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>
                    <button style="margin-top: 10px;" type="submit" name="login" class="btn btn-primary">Login</button>
        </form>

    </div>

</body>
</html>