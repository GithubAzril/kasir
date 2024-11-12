<?php
include '../php/koneksi.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM barang WHERE id = $id");
header("Location: data_barang.php"); // Redirect ke halaman data barang
?>