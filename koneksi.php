<?php
    // define user mariaDB
    $host = "localhost";
    $name = "root";
    $pass = "";
    $db = "perpus";

    // mencoba koneksi ke dalam database
    $conn = mysqli_connect($host,$name,$pass,$db) or die("koneksi gagal");
    $selectdb = mysqli_select_db($conn,$db) or die("gagal");
?>