<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... -->
</head>
<body>
    <div class="banner">
        <div class="container">
            <?php
            require '../../koneksi.php';

            // Cek apakah ID buku telah diberikan
            if (isset($_GET['id_buku'])) {
                // Escape input ID buku untuk menghindari serangan SQL injection
                $id_buku = mysqli_real_escape_string($conn, $_GET['id_buku']);

                // Query untuk mengambil data buku berdasarkan ID buku
                $query = "SELECT * FROM buku WHERE id_buku = '$id_buku'";
                $result = mysqli_query($conn, $query);

                // ...

                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <!-- Tampilkan informasi buku -->
                    <!-- <img src="<?= $row['cover_buku']; ?>" alt="" class="float-left thumbnail" width="250"> -->
                    <img src="../../assets/images/cover-buku/<?=$row['cover_buku']; ?>" alt="" class="float-left thumbnail" width="250">
                    <div class="banner-detail">
                    <h1 class="judul"><?= $row['judul_buku']; ?></h1>
                    <hr class="my-4">
                    <p class="kategori"><img src="../../assets/images/cover-buku/<?=$row['logo_kategori']; ?>" alt="" width="26px"> <?= $row['genre_buku']; ?></p>
                    <p class="penulis">by <?= $row['penulis_buku']; ?></p>
                    <p class="penerbit">Publisher: <?= $row['penerbit_buku']; ?></p>
                    <p class="penerbit">Publication Year: <?= $row['tanggal_terbit']; ?></p>
                    <a class="btn btn-danger btn-baca-login" href="#" role="button">HARAP LOGIN</a>
                    <a class="btn btn-success btn-baca" href="./baca.php?id_buku=<?= $row['id_buku']; ?>" role="button">MULAI BACA</a>
                    <a class="btn btn-danger btn-baca-login ml-5" href="../home/" role="button">Back to Home</a>
                    </div>

                    <?php
                } else {
                    echo "Buku tidak ditemukan.";
                }
            } else {
                echo "ID buku tidak diberikan.";
            }

            // ...
            ?>
        </div>
    </div>

    <div class="banner-sinopsis mt-5">
        <div class="container">
            <?php
            // ...

            // Cek apakah ID buku telah diberikan
            if (isset($_GET['id_buku'])) {
                // Escape input ID buku untuk menghindari serangan SQL injection
                $id_buku = mysqli_real_escape_string($conn, $_GET['id_buku']);

                // Query untuk mengambil data buku berdasarkan ID buku
                $query = "SELECT * FROM buku WHERE id_buku = '$id_buku'";
                $result = mysqli_query($conn, $query);

                // ...

                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <!-- Tampilkan deskripsi buku -->
                    <div class="banner-sinopsis mt-5">
                        <div class="container">
                            <h3>Deskripsi</h3>
                            <p><?= $row['deskripsi_buku']; ?></p>
                        </div>
                    </div>
                    <?php
                } else {
                    echo "Buku tidak ditemukan.";
                }
            } else {
                echo "ID buku tidak diberikan.";
            }

            // ...
            ?>
        </div>
    </div>

    <!-- ... -->
</body>
</html>
