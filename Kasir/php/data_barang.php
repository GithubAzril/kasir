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
include("../php/koneksi.php");

$search = '';

// Cek apakah form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil input pencarian dan membersihkannya
    $search = $_POST['search'];
    $search = $conn->real_escape_string($search); // Mencegah SQL injection

    // Query untuk mencari data
    $sql = "SELECT * FROM barang WHERE nama_coffe LIKE '%$search%'";
    $result = $conn->query($sql);
} else {
    // Jika tidak ada pencarian, ambil semua data
    $sql = "SELECT * FROM barang";
    $result = $conn->query($sql);
}

// Menampilkan tabel
?>

</head>
<body class="bg-[cyan]">
<nav class="fixed top-0 z-50 w-full bg-white  dark:bg-[#2C1712]">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start rtl:justify-end">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
         </button>
         <div class="flex items-center justify-start rtl:justify-end space-x-4">
                <img class="w-16 h-14 rounded-full" src="../gambar/logokasir.jpg" alt="">
                <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Kasir Coffee </span>
            </div>
      </div>
      <div class="flex items-center">
          <div class="flex items-center ms-3">
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
  </div>
</nav>

<main class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-[#2C1712] sm:translate-x-0 dark:bg-[#2C1712] aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-[#2C1712]">
      <ul class="space-y-2 font-medium">
         <li>
            <a href="../php/dashboard.php#post" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-[#D1B29A] group">
            <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 36 36">
    <path d="M18 2l14 12h-6v14H12V14H6L18 2zm0 5L8 14v16h4V18h16v12h4V14l-10-7z"/>
</svg>
               <span class="ms-3">Dashboard</span>
            </a>
         </li>
         <li>
            <a href="../php/data_barang.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-[#D1B29A] group">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5">
    <path d="M21 3H3c-1.1 0-1.99.9-1.99 2L1 19c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14l-3-4 2-2 3 4 3-4 2 2-5 6zm5-10H7V5h10v2z"/>
</svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Data Barang</span>
            </a>
         </li>
         <li>
            <a href="../php/data_pembelian.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-[#D1B29A] group">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5">
    <path d="M3 3h2v18H3V3zm4 2h2v14H7V5zm4 3h2v11h-2V8zm4-1h2v12h-2V7zm4-2h2v14h-2V5z"/>
</svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Data Pembelian</span>
            </a>
            
            <li>
               <a href="../php/transaksi.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-[#D1B29A] group">
               <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-6 h-6">
       <path d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm0 14H4V8h16z"/>
   </svg>
                  <span class="flex-1 ms-3 whitespace-nowrap">Transaksi</span>
               </a>
            </li>
            <li>
               <a href="../php/data_transaksi.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-[#D1B29A] group">
               <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5">
    <path d="M19 10.5a4.5 4.5 0 0 0-4.5-4.5A4.5 4.5 0 0 0 10 7a4.5 4.5 0 0 0-4.5 4.5A4.5 4.5 0 0 0 3 16a4.5 4.5 0 0 0 4.5 4.5H19a4.5 4.5 0 0 0 0-9zM19 18H7.5A2.5 2.5 0 0 1 5 15.5 2.5 2.5 0 0 1 7.5 13H19a2.5 2.5 0 0 1 0 5z"/>
</svg>
                  <span class="flex-1 ms-3 whitespace-nowrap">Data Transaksi</span>
               </a>
            </li>
         <li>

            <a href="../php/login.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-[#D1B29A] group">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5">
            <path d="M10 17l-5-5 5-5v3h9v4H10v3z"/>
            <path d="M20 3h-6V1h6a2 2 0 0 1 2 2v18a2 2 0 0 1-2 2h-6v-2h6V3z"/>
            </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Keluar</span>
            </a>
         </li>
      </ul>
   </div>
</main>
<div class=" sm:ml-64">
            <div class="container mx-auto p-20 h-screen ">
               <div class="flex px-4 py-2 space-x-4 justify-between">
                  <div class="flex space-x-2 ">
                     <form method="POST">
                        <input name="search" class="text-center px-2 rounded border border-solid border-black" type="text"  id="search" placeholder="Cari Barang ...." value="<?php echo htmlspecialchars($search); ?>">
                        <button class="text-white px-4 rounded bg-blue-600" id="search-btn">Cari</button>
                     </form>
                  </div>
                  <div class="space-x-2">
                     <a href="../php/tambah_barang.php" class="font-semibold px-4 py-1 rounded text-white bg-green-700 hover:bg-green-500 hover:text-black hover:font-semibold">Tambah Data</a>
                  </div>
               </div>
               <div class="container flex text-4xl p-16 justify-center">
                  <a class="font-bold" href="#">Data Barang</a>
               </div>
               <div class="bg-white shadow-md rounded">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 bg-blue-200">No</th>
                            <th class="py-2 px-4 bg-blue-200">Nama Coffe</th>
                            <th class="py-2 px-4 bg-blue-200">Jumlah</th>
                            <th class="py-2 px-4 bg-blue-200">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td class='text-center border border-blue-300 p-2'>{ $no}</td>
                <td class='text-center border border-blue-300 p-2'>{$row['nama_coffe']}</td>
                <td class='text-center border border-blue-300 p-2'>{$row['jumlah']}</td>
                <td class='text-center border border-blue-300 p-2'>
                    <a href='edit_barang.php?id={$row['id']}' class='text-yellow-500 hover:text-yellow-600'>Edit</a>
                    <a href='hapus_barang.php?id={$row['id']}' class='text-red-500 hover:text-red-600 ml-2'>Hapus</a>
                </td>
            </tr>";
            $no++;
        }
        ?>
                    </tbody>

                </table>
            </div>
         </div>
    </div>
</div>

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