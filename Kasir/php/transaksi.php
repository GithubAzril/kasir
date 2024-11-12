<?php
// Koneksi ke database
$host = "localhost"; // atau nama host Anda
$user = "root"; // username database
$password = ""; // password database
$database = "19018_webkasir"; // nama database

$conn = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses form jika ada data yang dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_pembeli = $_POST['nama_pembeli'];
    $jenis_kopi = $_POST['jenis_kopi'];
    $jumlah = $_POST['jumlah'];
    $harga_per_cup = 2000; // Harga per cup kopi
    $total_harga = $jumlah * $harga_per_cup;

    // Query untuk memasukkan data transaksi
    $sql = "INSERT INTO transaksi (nama_pembeli, jenis_kopi, jumlah, total_harga) VALUES ('$nama_pembeli', '$jenis_kopi', $jumlah, $total_harga)";

    if ($conn->query($sql) === TRUE) {
        // Redirect ke halaman data_transaksi.php
        header("Location: ../php/data_transaksi.php");
        exit(); // Pastikan untuk menghentikan script setelah redirect
    } else {
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Kopi</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Form Transaksi Kopi</h1>
        
        <?php if (isset($error_message)): ?>
            <div class="bg-red-500 text-white p-4 mb-4 rounded">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="" class="bg-white p-6 rounded shadow-md">
            <div class="mb-4">
                <label for="nama_pembeli" class="block text-gray-700">Nama Pembeli:</label>
                <input type="text" id="nama_pembeli" name="nama_pembeli" required class="mt-1 block w-full p-2 border border-gray-300 rounded">
            </div>

            <div class="mb-4">
            <label for="jenis_kopi" class="block text-gray-700">Jenis Kopi:</label>
            <select id="jenis_kopi" name="jenis_kopi" required class="mt-1 block w-full p-2 border border-gray-300 rounded">
                <option value="">Pilih Jenis Kopi</option>
                <option value="espresso">Espresso</option>
                <option value="latte">Latte</option>
                <option value="cappuccino">Cappuccino</option>
                <option value="americano">Americano</option>
                <option value="mocha">Mocha</option>
                <option value="flat_white">Flat White</option>
                <option value="cold_brew">Cold Brew</option>
            </select>
        </div>

            <div class="mb-4">
                <label for="jumlah" class="block text-gray-700">Jumlah:</label>
                <input type="number" id="jumlah" name="jumlah" required class="mt-1 block w-full p-2 border border-gray-300 rounded">
            </div>

            <div class="flex space-x-4 ">
                <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Transaksi</button>
                <a href="../php/dashboard.php" class=" text-center w-full bg-red-500 text-white p-2 rounded hover:bg-red-600">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>