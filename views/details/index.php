<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/books.css">
    <title>Document</title>
</head>
<body>
        
<div class="banner">
    <div class="container">
        <?php
        // Koneksi ke database
        require '../../koneksi.php';
        
        // Periksa koneksi
        if (mysqli_connect_errno()) {
            echo "Koneksi database gagal: " . mysqli_connect_error();
            exit();
        }
        
        // Cek apakah ID buku telah diberikan
        if (isset($_GET['id_buku'])) {
            // Escape input ID buku untuk menghindari serangan SQL injection
            $id_buku = mysqli_real_escape_string($conn, $_GET['id_buku']);
            
            // Query untuk mengambil data buku berdasarkan ID buku
            $query = "SELECT * FROM buku WHERE id_buku = '$id_buku'";
            $result = mysqli_query($conn, $query);
            
            // Periksa apakah ada data buku
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                ?>
                <img src="<?= $row['gambar']; ?>" alt="" class="float-left thumbnail" width="250">
                <div class="banner-detail">
                    <h1 class="judul"><?= $row['judul_buku']; ?></h1>
                    <hr class="my-4">
                    <p class="kategori"><img src="<?= $row['logo_kategori']; ?>" alt="" width="26px"> <?= $row['genre_buku']; ?></p>
                    <p class="penulis">by <?= $row['penulis_buku']; ?></p>
                    <p class="penerbit">Publisher: <?= $row['penerbit_buku']; ?></p>
                    <p class="penerbit">Publication Year: <?= $row['tanggal_terbit']; ?></p>
                    <a class="btn btn-danger btn-baca-login" href="#" role="button">HARAP LOGIN</a>
                    <a class="btn btn-success btn-baca" href="#" role="button">MULAI BACA</a>
                    <a class="btn btn-danger btn-baca-login ml-5" href="#" role="button">Back to Home</a>
                </div>
                <?php
            } else {
                echo "Buku tidak ditemukan.";
            }
        } else {
            echo "ID buku tidak diberikan.";
        }
        
        // Tutup koneksi
        mysqli_close($conn);
        ?>
    </div>
</div>

<div class="banner-sinopsis mt-5">
    <div class="container">
        <?php
        // Koneksi ke database
        require '../../koneksi.php';
        
        // Periksa koneksi
        if (mysqli_connect_errno()) {
            echo "Koneksi database gagal: " . mysqli_connect_error();
            exit();
        }
        
        // Cek apakah ID buku telah diberikan
        if (isset($_GET['id_buku'])) {
            // Escape input ID buku untuk menghindari serangan SQL injection
            $id_buku = mysqli_real_escape_string($conn, $_GET['id_buku']);
            
            // Query untuk mengambil data buku berdasarkan ID buku
            $query = "SELECT * FROM buku WHERE id_buku = '$id_buku'";
            $result = mysqli_query($conn, $query);
            
            // Periksa apakah ada data buku
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                ?>
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
        
        // Tutup koneksi
        mysqli_close($conn);
        ?>
    </div>
</div>

</body>
</html>
