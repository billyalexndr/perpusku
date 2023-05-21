<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../assets/css/login.css">
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">
				<form class="login100-form validate-form" action="./register.php" method="POST">
					<span class="login100-form-title p-b-70">
						REGISTER
					</span>
					<div class="wrap-input100 validate-input m-b-35" data-validate="Enter username">
						<input class="input100" type="text" name="nama_user" placeholder="Nama">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-35" data-validate="Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="password" name="password2" placeholder="Konfirmasi Password">
					</div>
					<div class="container-login100-form-btn">
						<button class="register100-form-btn" name="submit">
							REGISTER
						</button>
					</div>
					<ul class="login-more p-t-30">
						<li>
							<span class="txt1">
								Have an account?
							</span>
							<a href="./views/login/login.php" class="txt2">
								Login
							</a>
							<br>
							<a href="./views/home/index.php" class="txt2">
								Kembali ke Home
							</a>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
