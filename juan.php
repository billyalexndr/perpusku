<?php
	$conn = new mysqli('localhost','root','','pelanggan');

	if(isset($_POST['submit'])) {
        $nama = mysqli_real_escape_string($conn, $_POST['username']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $nohp = mysqli_real_escape_string($conn, $_POST['nohp']);
        $pesanan = mysqli_real_escape_string($conn, $_POST['pesanan']);
        $comment = mysqli_real_escape_string($conn, $_POST['comment']);
    
        $query = "INSERT INTO pengguna (username, address, nohp, pesanan, comment) VALUES ('$username', '$address', '$nohp', '$pesanan', '$comment')";
        $simpan = mysqli_query($conn, $query);

        if ($simpan) {
            echo "<script>alert('Berhasil Order!');
            window.location.href = './pelanggan.php';
            </script>";
        } else {
            echo "<script>alert('Gagal Order: " . mysqli_error($conn) . "');
            window.location.href = './pelanggan.php';
            </script>";
        }

        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Madam Joy's Catering</title>
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Madam Joy's Catering">
    <meta name="author" content="Clinton Nkwocha">
    <link href="https://fonts.googleapis.com/css?family=Lato|Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="mjc.png" type="image/png">
    <link rel="stylesheet" href="reset.min.css">
    <link rel="stylesheet" href="style.css" type="text/css">
  </head>
  <body>
    <section id="wrap">
      <nav id="navbar">
        <img src="mjcw.png">
        <input type="checkbox" id="burger-toggle">
        <div id="burger">
          <div class="burger-slice"></div>
          <div class="burger-slice"></div>
          <div class="burger-slice"></div>
        </div>
        <ul>
          <li>
            <a href="index.php">Home</a>
          </li>
          <li>
            <a href="contact.php">Contact Us</a>
          </li>
          <li>
            <a href="about.php">About Us</a>
          </li>
          <li>
            <a href="#" id="active">Pesan</a>
          </li>
          <li>
            <a href="login.php">Log In</a>
          </li>
          <li>
            <a href="signup.php">Sign Up</a>
          </li>
        </ul>
      </nav>
      <main id="container-wrap">
        <div id="container">
          <div id="details">
            <h2>Order</h2>
            <form action="./pelanggan.php" method="post">
              <input type="text" name="username" id="name" placeholder="Name" required>
              <br>
              <input type="text" name="address" id="address" placeholder="Alamat" required>
              <br>
              <input type="tel" name="nohp" id="nohp" placeholder="Nomor Handphone" required>
              <br>
              <input type="text" name="pesanan" id="pesanan" placeholder="Pesanan" required>
              <br>
              <label for="comment" name="comment"></label>
              <textarea class="comment" id="comment" placeholder="Detail Pesanan"></textarea>
              <br>
              <button id="button">Order</button>
            </form>
          </div>
        </div>
      </main>
    </section>
    <script src="camouflage.js"></script>
  </body>
</html>