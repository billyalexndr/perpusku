<?php
include '../../koneksi.php';

// Mendapatkan ID buku yang akan dihapus
$id_buku = $_GET['id'];

// Menghapus buku dari database berdasarkan ID
$query = "DELETE FROM buku WHERE id_buku = '$id_buku'";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "<script>alert('Buku berhasil dihapus.');
        window.location.href = 'hapusBuku.php';
        </script>";
        exit();
} else {
    echo "Gagal menghapus buku";
}

// Menutup koneksi database
mysqli_close($conn);
?>
