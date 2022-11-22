<?php 
require 'functions.php';
require '/xampp/smkimmanuel/htdocs/git/Rumah_Sakit/appearance/header.php';

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "  
            <script>
                alert('Register Successfull!');
                document.location.href = 'login.php';
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
		<meta charset="UTF-8" />
		<meta
			http-equiv="X-UA-Compatible"
			content="IE=edge"
		/>
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0"
		/>
		<title>Register Page</title>
		<link
			rel="stylesheet"
			href="appearance/register.css"
		/>
	</head>
	<body>

    <form action="mail.php" method="POST">
			<div class="main">
				<div class="form">
					<h2>Register</h2>
					<div class="textbox">
						<label for="email">Email : </label>
						<input
							name="email"
							type="text"
							required="required"
							placeholder=""
						/>
					</div>
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

					<div class="textbox mt-3">
						<label for="password2">Verify Password : </label>
						<input
                            name="password2"
							type="password"
							required="required"
							placeholder=""
						/>
                    </div>
                    <div class="policy mt-2 mb-2">
						<input
							type="checkbox"
							name="policy"
							id=""
                            required
						/>
						<i>
							By checking this box, you agree to be bound by our
							<a
								href="terms.html"
								target="_blank">
                                Terms and Conditions agreement.</a>
						</i>
					</div>

					<input
                        name = "register"
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