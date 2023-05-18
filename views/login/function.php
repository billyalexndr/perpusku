<?php
    require "../../koneksi.php";
    // $connect=mysqli_connect($host,$name,$pass,$db)or die("koneksi gagal");

	$nama=$_POST['nama_user'];
    $username = $_POST['username'];
	$password=$_POST['password'];

	$simpan=mysqli_query($conn,"INSERT INTO user (nama, username, password) VALUES ('$nama', '$username', '$password')");
	if($simpan){
		echo"<script>alert('Anggota Berhasil di Tambahkan');
		window.location.href = 'anggota.php';
		</script>";
		
	}else{
		echo"<script>alert('Anggota Gagal di Tambahkan');
		window.location.href = 'anggota.php';
		</script>";
	}
?>	
					