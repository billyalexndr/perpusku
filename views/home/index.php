<?php include 'head.php' ?>
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
    

<header>
        <div class="grid">
            <p>Selamat datang di,</p>
            <h1>Perpustakaanku</h1>
            <p class="sub">Temukan berbagai macam buku yang menarik dari berbagai macam koleksi yang tersedia</p>
            <!-- <form class="search" id="cari" name="cari" method="POST" action="cari.php">
                <select name="point">
                    <option value="judul">Judul</option>
                    <option value="pengarang">Pengarang</option>
                    <option value="penerbit">Penerbit</option>
                </select>
                <input class="box" type="text" name="cari"value="" placeholder="Ketik judul buku yang ingin dicari!!"><input class="cta" name="button" type="submit" value="Cari Buku">
            </form> -->
            <form class="search" id="cari" name="cari" method="POST" action="">
                <select name="point">
                    <option value="judul">Judul</option>
                    <option value="pengarang">Pengarang</option>
                    <option value="penerbit">Penerbit</option>
                </select>
                <input required class="box" type="text" name="cari"value="" placeholder="Ketik judul buku yang ingin dicari!!"><input class="cta" name="search" type="submit" value="Cari Buku">
            </form>
        </div>
        <div class="bg">
            <img src="../../assets/images/bg-home.jpg" alt="bg-header">
        </div>
    </header>
    <?php if(isset($_POST['search'])): ?>
    <section class="book-list slide-up">
		<div class="grid">
			<h1>Hasil Pencarian</h1>
			<div class="table">
				<div class="row head">
					<div class="list">No</div>
					<div class="list">Judul</div>
					<div class="list">Id Buku</div>
					<div class="list">Pengarang</div>
					<div class="list">Penerbit</div>
				</div>
				<?php
				require "../../koneksi.php";
				$buku=$_POST['cari'];
				$berdasarkan = $_POST['point'];
				$no=1;
				if ($berdasarkan == 'penerbit') {
					$sqli= "select *from buku where penerbit LIKE '%$buku%';";
				}else if ($berdasarkan == 'pengarang') {
					$sqli= "select *from buku where pengarang LIKE '%$buku%';";
				}else if ($berdasarkan == 'judul') {
					$sqli= "select *from buku where judul LIKE '%$buku%';";
				}else if ($berdasarkan == '') {
				echo "data salah";
				}
				$banyak= mysqli_query($conn,$sqli);
				while($row=mysqli_fetch_array($banyak))
				{
				?>
				<div class="row body">
					<div class="list"><?php echo $no ;?></div>
					<div class="list"><?php echo $row['judul'] ;?></div>
					<div class="list"><?php echo $row['id_buku'] ;?></div>
					<div class="list"><?php echo $row['pengarang'];?></div>
					<div class="list"><?php echo $row['penerbit'];?></div>
				</div>
				<?php $no=$no+1; }?>
			</div>
		</div>
	</section>
    <?php endif; ?>
    <!-- <section id="fitur">
        <div class="grid">
            <h1>Fitur Pada Website</h1>
            <div class="feature">
                <div class="list">
                    <i class="fas fa-search"></i>
                    <h2>Fitur Pencarian</h2>
                    <p>Kalian dapat mencari buku yang kalian suka dengan mudah</p>
                </div>
                <div class="list">
                    <i class="fas fa-users"></i>
                    <h2>Member-Ship</h2>
                    <p>Kalian dapat menyimpan buku jika mendaftar sebagai member</p>
                </div>
                <div class="list">
                    <i class="fas fa-pencil-ruler"></i>
                    <h2>Design Yang Interaktif</h2>
                    <p>Website ini dirancang dengan semenerik mungkin agar user mudah menggunakannya</p>
                </div>
            </div>
        </div>
    </section> -->
    


    <?php
    // Koneksi ke database
    require '../../koneksi.php';

    // Periksa koneksi
    if (mysqli_connect_errno()) {
        echo "Koneksi database gagal: " . mysqli_connect_error();
        exit();
    }

    // Query untuk mengambil data buku
    $query = "SELECT * FROM buku";
    $result = mysqli_query($conn, $query);

    // Periksa apakah ada data buku
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
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


    <section class="book-list">
		<div class="grid">
			<h1>Buku Yang Terakhir Ditambahkan</h1>
			<div class="table">
				<div class="row head">
					<div class="list">No</div>
					<div class="list">Judul</div>
					<div class="list">Id Buku</div>
					<div class="list">Pengarang</div>
					<div class="list">Penerbit</div>
				</div>
				<?php
				require "../../koneksi.php";
				$no=1;
				$sqli="select *from buku ORDER BY id_buku DESC";
				$banyak=mysqli_query($conn,$sqli);
				while($row=mysqli_fetch_array($banyak)){
				?>
				<div class="row body">
					<div class="list"><?php echo $no ;?></div>
					<div class="list"><?php echo $row['judul_buku'] ;?></div>
					<div class="list"><?php echo $row['id_buku'] ;?></div>
					<div class="list"><?php echo $row['penulis_buku'];?></div>
					<div class="list"><?php echo $row['penerbit_buku'];?></div>
				</div>
                <?php $no=$no+1; if ($no == '4') { break; } }?>
            </div>
            <a href="form_tambah_buku.php" class="add view">Lihat Lebih Banyak</a>
		</div>
	</section>
	<section class="info">
        <div class="grid">
            <div class="list">
                <div class="content">
                    <p class="count">
                        1000
                    </p>
                    <p class="sub">Total Member</p>
                </div>
                <div class="bg"><img src="img/X10423640.jpg" alt="bg-header"></div>
            </div>
            <div class="list">
                <div class="content">
                    <p class="count">
                        463
                    </p>
                    <p class="sub">Total Buku</p>
                </div>
                <div class="bg"><img src="img/0HOz23515.jpg" alt="bg-header"></div>
            </div>
        </div>
    </section>
    <script> $('nav .menu .list:first-child').addClass('active');
        $(window).on("scroll", function() {
            if($(window).scrollTop()) {
                $('nav').addClass('active');
            } else {
                $('nav').removeClass('active');
            }
        });
    </script>
</body>
</html>
<!-- <?php include 'foot.php' ?>	 -->
