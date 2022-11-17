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
		<title>Document</title>
		<link
			rel="stylesheet"
			href="login.css"
		/>
	</head>
	<body>
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
						/>
					<div class="subject">
							<input type="hidden" name="subject" value="Verify"><br>
					</div>
						<div class="message">
						<input
							type="hidden"
							value="Confirm you login"
							name="message"
						/>
					</div>
					
					<br>
					
					<br>
					<input
						type="submit"
						class="button"
						value="Login"
					/>
					<br />
				</div>
			</div>
		</form>
	</body>
</html>
