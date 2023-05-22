<?php
    //"localhost","id8523865_root","rades888","d8523865_dbkampus"
    // define('BASEURL', 'http://localhost/perpusku/');
    $host = "localhost";
    $name = "root";
    $pass = "";
    $db = "perpus";
    $conn = mysqli_connect($host,$name,$pass,$db) or die("koneksi gagal");
    $selectdb = mysqli_select_db($conn,$db) or die("gagal");
?>