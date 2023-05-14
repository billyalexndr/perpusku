<?php 
    session_start();
    require 'function.php';

	if(isset($_POST['submit'])){
		$_SESSION['username'] = $_POST["username"];
        $_SESSION['password'] = $_POST["password"];

        $result = mysqli_query($kon, "SELECT * FROM user WHERE username = '$_SESSION[username]'" );

        //cek username
        if ( mysqli_num_rows($result) === 1 ) {
			// cek password
            $row = mysqli_fetch_assoc($result);
			$pass = ($_SESSION['password']);
			if( $pass == $row["password"]  ){
				if ( ($row["level"] == "admin") ) {
					header("Location: ../Admin");
				}else{
                header("Location: ../home");
                exit;}
			}
            
        }
        $error = true;
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/login.css">
    <title>LOGIN</title>
</head>
<body>
    <div class="login">
        <form class="login-form" method="post" action="">
            <h1 class="login-title">LOGIN</h1>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
            </div>
            <div class="login-more">
                <p class="login-more-text">Don’t have an account?</p>
                <a href="./index.php" class="login-more-link">Sign up</a>
                <br>
                <a href="../" class="login-more-link">Kembali ke Home</a>
            </div>
        </form>
    </div>


</body>
</html>