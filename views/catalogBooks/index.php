<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../assets/css/books.css">
  <title>My Book</title>
</head>
<body>
  <div class="book-list">
    <?php
    // Koneksi ke database
    require '../../koneksi.php';

    // Periksa koneksi
    if (mysqli_connect_errno()) {
      echo "Koneksi database gagal: " . mysqli_connect_error();
      exit();
    }

    // Query untuk mengambil daftar buku yang dipinjam
    $query = "SELECT * FROM peminjaman";
    $result = mysqli_query($conn, $query);

    // Periksa apakah ada buku yang dipinjam
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="book-card">
          <div class="book-image">
            <img src="gambar_buku.jpg" alt="Cover Buku">
          </div>
          <div class="book-details">
            <h3 class="book-title"><?php echo $row['id_buku']; ?></h3>
            <p class="book-info">ID Peminjaman: <?php echo $row['id_peminjaman']; ?></p>
            <p class="book-info">ID User: <?php echo $row['id_user']; ?></p>
            <p class="book-info">Tanggal Pinjam: <?php echo $row['tanggal_pinjam']; ?></p>
            <p class="book-info">Tanggal Kembali: <?php echo $row['tanggal_kembali']; ?></p>
          </div>
        </div>
        <?php
      }
    } else {
      echo "Tidak ada buku yang dipinjam.";
    }

    // Query untuk mengambil riwayat peminjaman
    $riwayatQuery = "SELECT * FROM riwayat_peminjaman";
    $riwayatResult = mysqli_query($conn, $riwayatQuery);

    // Periksa apakah ada riwayat peminjaman
    if (mysqli_num_rows($riwayatResult) > 0) {
      echo "<h2>Riwayat Peminjaman</h2>";
      while ($riwayatRow = mysqli_fetch_assoc($riwayatResult)) {
        ?>
        <div class="book-card">
          <div class="book-image">
            <img src="gambar_buku.jpg" alt="Cover Buku">
          </div>
          <div class="book-details">
            <h3 class="book-title"><?php echo $riwayatRow['id_buku']; ?></h3>
            <p class="book-info">ID Peminjaman: <?php echo $riwayatRow['id_peminjaman']; ?></p>
            <p class="book-info">ID User: <?php echo $riwayatRow['id_user']; ?></p>
            <p class="book-info">Tanggal Pinjam: <?php echo $riwayatRow['tanggal_pinjam']; ?></p>
            <p class="book-info">Tanggal Kembali: <?php echo $riwayatRow['tanggal_kembali']; ?></p>
          </div>
        </div>
        <?php
      }
    } else {
      echo "Tidak ada riwayat peminjaman.";
    }

    // Tutup koneksi database
    mysqli_close($conn);
    ?>
  </div>
</body>
</html>
