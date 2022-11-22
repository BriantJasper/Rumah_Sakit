<?php 
session_start();
require 'functions.php';
require 'appearance/header.php';

// cek cookie
if ( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan ID
    $result = mysqli_query($conn, "SELECT username FROM tb_user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ( $key === hash('sha256', $row['username']) ) {
        $_SESSION['login'] = true;
    }
}

// cek session
if ( isset($_SESSION["login"]) ) {
    header("Location: homepage.php");
    exit;
}

// cek input username dan password
if ( isset($_POST["login"]) ) {
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username ='$username'");

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
            
            header("Location: homepage.php");
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
        <link rel="stylesheet" href="appearance/login.css">
</head>
<body>

	<form action="" method="POST">
			<div class="main">
				<div class="form">
					<h2>Login</h2>
                        <!-- Error Login -->
                        <?php if (isset($error)) : ?>
                            <div class='alert alert-danger p-2'>
                                <strong>Failed!</strong> Login Gagal!
                            </div>
                        <?php endif ?>
                        <!-- End Error Login -->
					<div class="textbox">
						<label for="username">Username : </label>
						<input
							name="username"
							type="text"
							required="required"
							placeholder=""
						/>
					</div>
                    
					<div class="textbox mt-3">
						<label for="password">Password : </label>
						<input
                            name="password"
							type="password"
							required="required"
							placeholder=""
						/>
                    </div>
                    <div class="mt-2">
                        <label>
                            <input 
                            type="checkbox" 
                            name="remember"
                            style="margin-right: 5px ;">
                            Remember Me
                            <a href="register.php" class="mx-auto me-2">Sign Up</a>
                        </label>
                    </div>

					<input
                        name = "login"
						type="submit"
						class="button mt-auto"
						value="Login"
					/>

                    
					<br/>
				</div>
			</div>
		</form>
    </div>

</body>
</html>