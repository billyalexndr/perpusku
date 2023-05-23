<?php
// ...
session_start(); // Memulai sesi
require '../../koneksi.php';

// Cek apakah ID buku telah diberikan
if (isset($_GET['id_buku'])) {
    // Escape input ID buku untuk menghindari serangan SQL injection
    $id_buku = mysqli_real_escape_string($conn, $_GET['id_buku']);

    // Query untuk mengambil data buku berdasarkan ID buku
    $query = "SELECT buku.*, kategori.icon_kategori FROM buku JOIN kategori ON buku.id_kategori = kategori.id_kategori WHERE buku.id_buku = '$id_buku'";
    $result = mysqli_query($conn, $query);

    // ...

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        // Cek apakah user sudah login
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];

            // Query untuk memeriksa apakah user sudah meminjam buku tersebut
            $query_pinjam = "SELECT * FROM peminjaman WHERE id_buku = '$id_buku' AND id_user = (SELECT id_user FROM user WHERE username = '$username')";
            $result_pinjam = mysqli_query($conn, $query_pinjam);

            if (mysqli_num_rows($result_pinjam) > 0) {
                // User sudah meminjam buku tersebut
                $row_pinjam = mysqli_fetch_assoc($result_pinjam);
                
                // Query untuk memeriksa apakah buku sudah dikembalikan
                $query_riwayat = "SELECT * FROM riwayat_peminjaman WHERE id_buku = '$id_buku' AND id_user = (SELECT id_user FROM user WHERE username = '$username')";
                $result_riwayat = mysqli_query($conn, $query_riwayat);

                if (mysqli_num_rows($result_riwayat) > 0) {
                    // Buku sudah dikembalikan
                    ?>
                    <img src="../../assets/images/cover-buku/<?=$row['cover_buku']; ?>" alt="" class="float-left thumbnail" width="250">
                    <div class="banner-detail">
                        <h1 class="judul"><?= $row['judul_buku']; ?></h1>
                        <hr class="my-4">
                        <p class="kategori"><img src="../../assets/images/icon-kategori/<?=$row['icon_kategori']; ?>" alt="" width="26px"> <?= $row['genre_buku']; ?></p>
                        <p class="penulis">by <?= $row['penulis_buku']; ?></p>
                        <p class="penerbit">Publisher: <?= $row['penerbit_buku']; ?></p>
                        <p class="penerbit">Publication Year: <?= $row['tanggal_terbit']; ?></p>
                        <a class="btn btn-primary btn-baca" href="./baca.php?id_buku=<?= $row['id_buku']; ?>" role="button">MULAI BACA</a>
                        <a class="btn btn-warning btn-kembalikan" href="./pengembalian.php?id_buku=<?= $row['id_buku']; ?>" role="button">KEMBALIKAN BUKU</a>
                        <a class="btn btn-danger btn-baca-login ml-5" href="../home/" role="button">Back to Home</a>
                    </div>

                    <!-- Tampilkan deskripsi buku -->
                    <div class="banner-sinopsis mt-5">
                        <div class="container">
                            <h3>Deskripsi</h3>
                            <p><?= $row['deskripsi_buku']; ?></p>
                        </div>
                    </div>
                    <?php
                } else {
                    // Buku belum dikembalikan
                    ?>
                    <img src="../../assets/images/cover-buku/<?=$row['cover_buku']; ?>" alt="" class="float-left thumbnail" width="250">
                    <div class="banner-detail">
                        <h1 class="judul"><?= $row['judul_buku']; ?></h1>
                        <hr class="my-4">
                        <p class="kategori"><img src="../../assets/images/icon-kategori/<?=$row['icon_kategori']; ?>" alt="" width="26px"> <?= $row['genre_buku']; ?></p>
                        <p class="penulis">by <?= $row['penulis_buku']; ?></p>
                        <p class="penerbit">Publisher: <?= $row['penerbit_buku']; ?></p>
                        <p class="penerbit">Publication Year: <?= $row['tanggal_terbit']; ?></p>
                        <a class="btn btn-primary btn-baca" href="./baca.php?id_buku=<?= $row['id_buku']; ?>" role="button">MULAI BACA</a>
                        <a class="btn btn-warning btn-kembalikan" href="./pengembalian.php?id_buku=<?= $row['id_buku']; ?>" role="button">KEMBALIKAN BUKU</a>
                        <a class="btn btn-danger btn-baca-login ml-5" href="../home/" role="button">Back to Home</a>
                    </div>

                    <!-- Tampilkan deskripsi buku -->
                    <div class="banner-sinopsis mt-5">
                        <div class="container">
                            <h3>Deskripsi</h3>
                            <p><?= $row['deskripsi_buku']; ?></p>
                        </div>
                    </div>
                    <?php
                }
            } else {
                // User belum meminjam buku tersebut
                ?>
                <img src="../../assets/images/cover-buku/<?=$row['cover_buku']; ?>" alt="" class="float-left thumbnail" width="250">
                <div class="banner-detail">
                    <h1 class="judul"><?= $row['judul_buku']; ?></h1>
                    <hr class="my-4">
                    <p class="kategori"><img src="../../assets/images/icon-kategori/<?=$row['icon_kategori']; ?>" alt="" width="26px"> <?= $row['genre_buku']; ?></p>
                    <p class="penulis">by <?= $row['penulis_buku']; ?></p>
                    <p class="penerbit">Publisher: <?= $row['penerbit_buku']; ?></p>
                    <p class="penerbit">Publication Year: <?= $row['tanggal_terbit']; ?></p>
                    <a class="btn btn-primary btn-pinjam" href="./pinjam.php?id_buku=<?= $row['id_buku']; ?>" role="button">PINJAM BUKU</a>
                    <a class="btn btn-danger btn-baca-login ml-5" href="../home/" role="button">Back to Home</a>
                </div>

                <!-- Tampilkan deskripsi buku -->
                <div class="banner-sinopsis mt-5">
                    <div class="container">
                        <h3>Deskripsi</h3>
                        <p><?= $row['deskripsi_buku']; ?></p>
                    </div>
                </div>
                <?php
            }
        } else {
            // User belum login
            ?>
            <img src="../../assets/images/cover-buku/<?=$row['cover_buku']; ?>" alt="" class="float-left thumbnail" width="250">
            <div class="banner-detail">
                <h1 class="judul"><?= $row['judul_buku']; ?></h1>
                <hr class="my-4">
                <p class="kategori"><img src="../../assets/images/icon-kategori/<?=$row['icon_kategori']; ?>" alt="" width="26px"> <?= $row['genre_buku']; ?></p>
                <p class="penulis">by <?= $row['penulis_buku']; ?></p>
                <p class="penerbit">Publisher: <?= $row['penerbit_buku']; ?></p>
                <p class="penerbit">Publication Year: <?= $row['tanggal_terbit']; ?></p>
                <a class="btn btn-danger btn-baca-login" href="../login/login.php" role="button">HARAP LOGIN</a>
                <a class="btn btn-danger btn-baca-login ml-5" href="../home/" role="button">Back to Home</a>
            </div>

            <!-- Tampilkan deskripsi buku -->
            <div class="banner-sinopsis mt-5">
                <div class="container">
                    <h3>Deskripsi</h3>
                    <p><?= $row['deskripsi_buku']; ?></p>
                </div>
            </div>
            <?php
        }
    } else {
        echo "Buku tidak ditemukan.";
    }
} else {
    echo "ID buku tidak diberikan.";
}

// ...
?>
