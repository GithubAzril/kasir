<?php
include '../php/koneksi.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM barang WHERE id = $id");
$row = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_coffe = $_POST['nama_coffe'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];

    // Jika gambar diupload, update gambar
    if ($_FILES['gambar']['name']) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);
        $sql = "UPDATE barang SET nama_coffe='$nama_coffe', harga='$harga', jumlah='$jumlah', gambar='$target_file' WHERE id=$id";
    } else {
        $sql = "UPDATE barang SET nama_coffe='$nama_coffe', harga='$harga', jumlah='$jumlah' WHERE id=$id";
    }
    mysqli_query($conn, $sql);
    header("Location: ../php/data_barang.php"); // Redirect ke halaman data barang
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <h1 class="text-2xl font-bold mb-4">Edit Data Barang</h1>
    <form action="" method="post" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md mb-6">
        <label class="block mb-2 font-semibold">Nama Coffe:</label>
        <input type="text" name="nama_coffe" value="<?php echo $row['nama_coffe']; ?>" required class="border border-gray-300 p-2 w-full rounded mb-4">
        
        <label class="block mb-2 font-semibold">Harga:</label>
        <input type="number" name="harga" value="<?php echo $row['harga']; ?>" required class="border border-gray-300 p-2 w-full rounded mb-4">
        
        <label class="block mb-2 font-semibold">Jumlah:</label>
        <input type="number" name="jumlah" value="<?php echo $row['jumlah']; ?>" required class="border border-gray-300 p-2 w-full rounded mb-4">
        
        <label class="block mb-2 font-semibold">Gambar:</label>
        <input type="file" name="gambar" accept="image/*" class="border border-gray-300 p-2 w-full rounded mb-4">
        
        <input type="submit" value="Update Barang" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600">
    </form>
</body>
</html>