<?php
    require "function.php";
    if ( isset($_POST["submit"]) ) {
        
        if (register($_POST) > 0 ) {
            echo "<script> alert('user baru telah ditambah')
                window.location='./login.php';
            </script>";
        } else {
            echo mysqli_error($kon);
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/register.css">
    <title>REGISTER</title>
</head>
<body>
    <div class="limiter">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h1>REGISTER</h1>
                    <form class="form-horizontal" role="form" action="" method="POST">
                        <div class="form-group">
                            <label for="nama_user" class="control-label">Nama</label>
                            <input type="text" class="form-control" name="nama_user" required>
                        </div>
                        <div class="form-group">
                            <label for="username" class="control-label">Username</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="password2" class="control-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" name="password2" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" name="submit">REGISTER</button>
                        </div>
                    </form>
                    <p class="text-center">Have an account? <a href="login.php">Login</a></p>
                    <p class="text-center"><a href="../home">Home Page</a></p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>