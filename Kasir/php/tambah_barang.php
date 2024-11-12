<?php
include("../php/koneksi.php");

// Cek apakah form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil input dari form dan membersihkannya
    $nama_coffe = $conn->real_escape_string($_POST['nama_coffe']);
    $jumlah = $conn->real_escape_string($_POST['jumlah']);

    // Query untuk menambahkan data barang
    $sql = "INSERT INTO barang (nama_coffe, jumlah) VALUES ('$nama_coffe', '$jumlah')";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect ke data_barang.php setelah berhasil menambah data
        header("Location: data_barang.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <link href="../gambar/logo.png" rel="shortcut icon" type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[cyan]">
    <div class="container mx-auto p-20">
        <h2 class="text-2xl mb-4">Tambah Data Barang</h2>
        <form method="POST">
            <div class="mb-4">
                <label for="nama_coffe" class="block text-sm font-medium text-gray-700">Nama Coffe</label>
                <input type="text" name="nama_coffe" id="nama_coffe" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            </div>
            <div class="mb-4">
                <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Tambah Barang</button>
        </form>
    </div>
</body>
</html>