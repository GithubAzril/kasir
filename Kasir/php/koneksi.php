<?php
$host = "localhost"; // Alamat server database
$user = "root"; // Username database
$pass = ""; // Password database
$dbname = "19018_webkasir"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = mysqli_connect($host, $user, $pass, $dbname);


// Memeriksa koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>