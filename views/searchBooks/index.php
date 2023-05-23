<?php
include "../templates/head.php";
require "../../koneksi.php";

if(isset($_POST['cari'])) {
    $berdasarkan = $_POST['point'];
    $isi = $_POST['cari'];
    
    if ($berdasarkan == 'penerbit') {
        $sqli = "SELECT * FROM buku WHERE penerbit_buku LIKE '%$isi%';";
    } else if ($berdasarkan == 'pengarang') {
        $sqli = "SELECT * FROM buku WHERE penulis_buku LIKE '%$isi%';";
    } else if ($berdasarkan == 'judul') {
        $sqli = "SELECT * FROM buku WHERE judul_buku LIKE '%$isi%';";
    } else {
        echo "Data salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Document</title>
</head>
<body>

    <div class="container">
        <br><br>
        <h4 class="mb-5">Hasil Pencarian dari: <b><i><?= $isi; ?></i></b></h4>

        <form class="search" id="cari" name="cari" method="POST" action="">
            <select name="point">
                <option value="judul">Judul</option>
                <option value="pengarang">Pengarang</option>
                <option value="penerbit">Penerbit</option>
            </select>
            <input required class="box" type="text" name="cari"value="" placeholder="Ketik judul buku yang ingin dicari!!"><input class="cta" name="search" type="submit" value="Cari Buku">
        </form>

        <?php
        $hasil = mysqli_query($conn, $sqli);

        if (mysqli_num_rows($hasil) > 0) {
            while ($row = mysqli_fetch_assoc($hasil)) {
                ?>
                <div class="card">
                    <img src="../../assets/images/cover-buku/<?= $row['cover_buku']; ?>" alt="Book Cover" class="card-image">
                    <div class="card-content">
                        <h3 class="card-title"><?= $row['judul_buku']; ?></h3>
                        <p class="card-author">by <?= $row['penulis_buku']; ?></p>
                        <p class="card-publisher">Publisher: <?= $row['penerbit_buku']; ?></p>
                        <p class="card-year">Publication Year: <?= $row['tanggal_terbit']; ?></p>
                        <a href="#" class="btn-read">Read More</a>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "Tidak ada data buku.";
        }
        ?>
    </div>
<body>