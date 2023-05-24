<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../assets/css/login.css">
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">
				<form class="login100-form validate-form" method="post" action="./proses_login.php">
					<span class="login100-form-title p-b-70">
						LOGIN
					</span>
					<div class="wrap-input100 validate-input m-b-35" data-validate="Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit">
							Login
						</button>
					</div>

					<div class="login-more pt-5">
						
							<span class="txt1">
								Don’t have an account?
							</span>

							<a href="./index.php" class="txt2">
								Sign up
							</a>
							<br>
							<a href="../home/" class="txt2">
								Kembali ke Home
							</a>
						
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
