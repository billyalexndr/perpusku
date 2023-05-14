<?php
    session_start();
    


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/login.css">
    <title>Halaman Login</title>
</head>
<body>
    <div class="limiter">
        <div class="container-login">
            <div class="wrap-login">
                <form class="login-form" method="post" action="">
                    <h1 class="login-title">
                        LOGIN
                    </h1>
                    <div class="input-wrap">
                        <input class="input-field" type="text" name="username" placeholder="Username" required>
                    </div>
                    <div class="input-wrap">
                        <input class="input-field" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="btn-wrap">
                        <button class="login-btn" name="submit">
                            Login
                        </button>
                    </div>
                    <ul class="login-more">
                        <li>
                            <span class="txt1">
                                Don’t have an account?
                            </span>
                            <a href="./index.php" class="txt2">
                                Sign up
                            </a>
                            <br>
                            <a href="../" class="txt2">
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