<?php
session_start(); // Memulai sesi
require '../../koneksi.php';

if (isset($_SESSION['username'])) {
    // User sudah login
    $username = $_SESSION['username'];
}

if (isset($_GET['id_buku'])) {
    // Escape input ID buku untuk menghindari serangan SQL injection
    $id_buku = mysqli_real_escape_string($conn, $_GET['id_buku']);


    // Query untuk memeriksa apakah buku tersedia
    $query_buku = "SELECT * FROM buku WHERE id_buku = '$id_buku'";
    $result_buku = mysqli_query($conn, $query_buku);


    if (mysqli_num_rows($result_buku) > 0) {
        // Buku tersedia
        // Fetch the book data
        $row = mysqli_fetch_assoc($result_buku);

        // Query untuk memperoleh id_user berdasarkan username
        $query_user = "SELECT id_user FROM user WHERE username = '$username'";
        $result_user = mysqli_query($conn, $query_user);

        if (mysqli_num_rows($result_user) > 0) {
            $row_user = mysqli_fetch_assoc($result_user);
            $id_user = $row_user['id_user'];

            // Menghitung tanggal kembali (7 hari setelah tanggal pinjam)
            $tanggal_pinjam = date('Y-m-d');
            $tanggal_kembali = date('Y-m-d', strtotime('+7 days', strtotime($tanggal_pinjam)));
            $query_insert = "INSERT INTO peminjaman (id_user, id_buku, tanggal_pinjam, tanggal_kembali) VALUES ('$id_user', '$id_buku', '$tanggal_pinjam', '$tanggal_kembali')";
            $result_insert = mysqli_query($conn, $query_insert);

            if ($result_insert) {
                echo "<script>
            alert('Buku berhasil dipinjam.');
            setTimeout(function() {
                window.location.href = './index.php?id_buku=$id_buku';
            }, 1000); // Delay the redirection for 1 second (adjust as needed)
            </script>";
            exit();
            } else {
                echo "Terjadi kesalahan saat meminjam buku.";
            }

        } else {
            echo "User tidak ditemukan.";
        }
    } else {
        echo "Buku tidak ditemukan.";
    }
} ?>



