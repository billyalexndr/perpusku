<?php
include '../../koneksi.php';

// Mendapatkan ID buku yang akan dihapus
$id_buku = $_GET['id'];

// Menghapus buku dari database berdasarkan ID
$query = "DELETE FROM buku WHERE id_buku = '$id_buku'";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "Buku berhasil dihapus";
} else {
    echo "Gagal menghapus buku";
}

// Menutup koneksi database
mysqli_close($conn);
?>
