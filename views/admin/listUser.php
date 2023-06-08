<?php
require '../../koneksi.php';

// Periksa koneksi
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Query untuk mengambil data user dari database
$query = "SELECT * FROM user";
$result = mysqli_query($conn, $query);

// Fungsi untuk menampilkan detail pengguna
function showDetails($id) {
    // Tambahkan logika untuk menampilkan detail pengguna berdasarkan ID
    echo "Detail pengguna dengan ID: " . $id;
}

// Fungsi untuk menghapus pengguna
function deleteUser($id) {
    // Tambahkan logika untuk menghapus pengguna berdasarkan ID
    echo "Pengguna dengan ID: " . $id . " berhasil dihapus";
}
?>

<head>
    <!-- <link rel="stylesheet" href="../../assets/css/admin.css"> -->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        button {
            padding: 6px 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        button.details {
            background-color: #2196F3;
        }

        button.details:hover {
            background-color: #0b7dda;
        }

        button.delete {
            background-color: #f44336;
        }

        button.delete:hover {
            background-color: #da190b;
        }
    </style>
</head>
<table>
    <thead>
        <tr>
            <th>ID User</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($user = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?php echo $user['id_user']; ?></td>
                <td><?php echo $user['nama']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td>
                <button class="details" onclick="window.location.href='./detailUser.php?id=<?php echo $user['id_user']; ?>'">Details</button>
                    <button class="delete">Delete</button>
                </td>
            </tr>
        <?php endwhile; ?>

    </tbody>
</table>

<?php
// Tutup koneksi database
mysqli_close($conn);
?>
