<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="../gambar/logo.png" rel="shortcut icon" type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../php/login.php");
    exit;
}
?>
</head>
<body style="background-image:url(../gambar/Tanpa\ judul\ \(1980\ x\ 1080\ piksel\).png); background-size:cover;" >
<nav class="fixed  top-0 z-50 w-full  dark:bg-[#2C1712] ">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end space-x-4">
                <img class="w-16 h-14 rounded-full" src="../gambar/logokasir.jpg" alt="">
                <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Kasir Coffe (Admin)</span>
            </div>
            <div class="flex items-center">
            <div class="relative"> <!-- Tambahkan class relative di sini -->
    <button type="button" id="drop" class="flex text-sm bg-white rounded-full focus:ring-4 focus:ring-white dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
        <span class="sr-only">Open menu</span>
        <img class="w-18 h-10 rounded-full" src="../gambar/karakter laki laki (4 x 4 cm).png" alt="">
    </button>
    <div class="absolute right-0 z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-[#C8A78F] dark:divide-white" id="dropdown-user">
        <div class="px-4 py-3" role="none">
            <p class="text-sm text-gray-900 font-semibold dark:text-white" role="none">Admin</p>
            <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">azrilfathanf@gmail.com</p>
        </div>
        <ul class="py-1" role="none">
            <li>
                <a href="../php/profile.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#2C1712] dark:text-gray-300 dark:hover:bg-[#2C1712] dark:hover:text-white" role="menuitem">Profil</a>
            </li>
            <li>
                <a href="../php/login.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#2C1712] dark:text-gray-300 dark:hover:bg-[#2C1712] dark:hover:text-white" role="menuitem">Log Out</a>
            </li>
        </ul>
    </div>
</div>
            </div>
        </div>
    </div>
</nav>

<main class="mt-16 p-4">
<div>
    <div class=" text-center mb-8 ">
        <h1 class="text-5xl font-bold text-[#ECB176]">Selamat <span class="text-[#603F26]">Datang</span>  </h1>
        <h1 class="mt-4 text-black text-xl font-semibold">Di Dashboard Admin </h1>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <a href="../php/profile.php"><div class="bg-[#F7F3E9] shadow-lg rounded-lg p-6 transition-transform transform hover:scale-105 hover:shadow-xl">
            <h2 class="text-xl font-bold mb-2">Profile</h2>
            <p class="font-semibold text-gray-600 mb-4">Profile Admin</p>
            <div class="animate-pulse">
                <div class="h-2 bg-blue-500 rounded mb-2"></div>
                <div class="h-2 bg-blue-400 rounded mb-2"></div>
                <div class="h-2 bg-blue-300 rounded"></div>
            </div>
        </div></a>
        <a href="../php/data_barang.php"><div class="bg-[#F7F3E9] shadow-lg rounded-lg p-6 transition-transform transform hover:scale-105 hover:shadow-xl">
            <h2 class="text-xl font-bold mb-2">Data Barang</h2>
            <p class="font-semibold text-gray-600 mb-4">Data yang tersedia</p>
            <div class="animate-pulse">
                <div class="h-2 bg-blue-500 rounded mb-2"></div>
                <div class="h-2 bg-blue-400 rounded mb-2"></div>
                <div class="h-2 bg-blue-300 rounded"></div>
            </div>
        </div></a>
        <a href="../php/data_pembelian.php"><div class="bg-[#F7F3E9] shadow-lg rounded-lg p-6 transition-transform transform hover:scale-105 hover:shadow-xl">
            <h2 class="text-xl font-bold mb-2">Data Pembelian</h2>
            <p class="font-semibold text-gray-600 mb-4">Data dari pembelian</p>
            <div class="animate-pulse">
                <div class="h-2 bg-green-500 rounded mb-2"></div>
                <div class="h-2 bg-green-400 rounded mb-2"></div>
                <div class="h-2 bg-green-300 rounded"></div>
            </div>
        </div></a>
        <a href="../php/transaksi.php"><div class="bg-[#F7F3E9] shadow-lg rounded-lg p-6 transition-transform transform hover:scale-105 hover:shadow-xl">
            <h2 class="text-xl font-bold mb-2">Transaksi</h2>
            <p class="font-semibold text-gray-600 mb-4">Menjual Barang</p>
            <div class="animate-pulse">
                <div class="h-2 bg-red-500 rounded mb-2"></div>
                <div class="h-2 bg-red-400 rounded mb-2"></div>
                <div class="h-2 bg-red-300 rounded"></div>
            </div>
        </div></a>
        <a href="../php/data_transaksi.php"><div class="bg-[#F7F3E9] shadow-lg rounded-lg p-6 transition-transform transform hover:scale-105 hover:shadow-xl">
            <h2 class="text-xl font-bold mb-2">Data Transaksi</h2>
            <p class="font-semibold text-gray-600 mb-4">Data dari penjualan</p>
            <div class="animate-pulse">
                <div class="h-2 bg-yellow-500 rounded mb-2"></div>
                <div class="h-2 bg-yellow-400 rounded mb-2"></div>
                <div class="h-2 bg-yellow-300 rounded"></div>
            </div>
        </div></a>
        <a href="../php/login.php"><div class="bg-[#6F4F37] shadow-lg rounded-lg p-6 transition-transform transform hover:scale-105 hover:shadow-xl">
            <h2 class=" text-white text-2xl font-bold mb-2 p-8 text-center">Keluar</h2>
        </div></a>
    </div>
</div>
</main>


</body>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const dropdownButton = document.querySelector('[data-dropdown-toggle="dropdown-user"]');
    const dropdownMenu = document.getElementById('dropdown-user');

    dropdownButton.addEventListener('click', function(event) {
        // Mencegah event bubbling
        event.stopPropagation();
        dropdownMenu.classList.toggle('hidden');
    });

    // Menutup dropdown jika klik di luar dropdown
    document.addEventListener('click', function(event) {
        if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
        }
    });
});
</script>
</html>