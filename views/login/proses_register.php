<?php
    require '../../koneksi.php';
    // $conn = mysqli_connect($host, $name, $pass, $db) or die("koneksi gagal");

    $nama = mysqli_real_escape_string($conn, $_POST['nama_user']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "INSERT INTO user (nama, username, password) VALUES ('$nama', '$username', '$password')";
    $simpan = mysqli_query($conn, $query);

    if ($simpan) {
        echo "<script>alert('Anggota Berhasil di Tambahkan');
		window.location.href = 'anggota.php';
		</script>";
    } else {
        echo "<script>alert('Anggota Gagal di Tambahkan: " . mysqli_error($conn) . "');
		window.location.href = 'anggota.php';
		</script>";
    }
?>
