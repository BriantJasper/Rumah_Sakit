<?php 
session_start();
require 'functions.php';
require 'appearance/header.php';

// cek cookie
if ( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil email berdasarkan ID
    $result = mysqli_query($conn, "SELECT email FROM tb_user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan email
    if ( $key === hash('sha256', $row['email']) ) {
        $_SESSION['login'] = true;
    }
}

// cek session
// if ( isset($_SESSION["login"]) ) {
//     header("Location: index.php");
//     exit;
// }


// cek input email dan password
if ( isset($_POST["login"]) ) {
    
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE email ='$email'");

    // cek email
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
                setcookie('key', hash('sha256', $row['email']), time()+60 );
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
        <link rel="stylesheet" href="appearance/login.css">
</head>
<body>

        <?php if (isset($error)) : ?>
            <div class='alert alert-danger'>
                    <strong>Failed!</strong> Login Gagal!
            </div>
        <?php endif ?>

	<form action="">
			<div class="main">
				<div class="form">
					<h2>Login</h2>
					<div class="textbox">
						<label>Email : </label>
						<input
							name="email"
							type="email"
							required="required"
							placeholder=""
						/>
					</div>
					<div class="textbox">
						<label>Password : </label>
						<input
							type="text"
							required="required"
							placeholder=""
                            name = "password"
						/>
        </div>
					
					<br>
					
					<br>
					<input
                        name = "login"
						type="submit"
						class="button"
						value="Login"
					/>
					<br />
				</div>
			</div>
		</form>
    </div>

</body>
</html>