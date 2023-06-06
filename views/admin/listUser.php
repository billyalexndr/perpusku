<?php
include '../../koneksi.php';
include '../templates/head.php';
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            margin: 100px auto 150px;
            min-height: 35vh;
            width: 90%;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>

<?php
// Mengeksekusi query untuk mengambil data
$sql = "SELECT user.username AS user, buku.judul_buku AS buku, peminjaman.tanggal_pinjam, peminjaman.tanggal_kembali
        FROM peminjaman
        INNER JOIN user ON peminjaman.id_user = user.id_user
        INNER JOIN buku ON peminjaman.id_buku = buku.id_buku";
$result = $conn->query($sql);
?>
<div class="container">
    <?php
    // Memeriksa apakah query berhasil dieksekusi
    if ($result->num_rows > 0) {
        // Menampilkan data ke layar
        echo "<table>
                <tr>
                    <th>User</th>
                    <th>Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Pengembalian</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row['user']."</td>
                    <td>".$row['buku']."</td>
                    <td>".$row['tanggal_pinjam']."</td>
                    <td>".$row['tanggal_kembali']."</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada data yang ditemukan.";
    }
    ?>
</div>

<?php
// Menutup koneksi ke database
$conn->close();
?>

</body>
</html>

<?php include '../templates/foot.php' ?>