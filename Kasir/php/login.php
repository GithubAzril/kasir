<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<?php
session_start();
include("../php/koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username'], $_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Menyiapkan pernyataan untuk memeriksa username dan password
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // Membandingkan password
            if ($user['password'] === $password) { // Ganti dengan password_hash() dan password_verify() jika menggunakan hashing
                // Jika login berhasil, simpan data pengguna di session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role']; // Menyimpan role pengguna

                // Redirect berdasarkan role
                if ($_SESSION['role'] === 'admin') {
                    header("Location: ../php/dashboard.php"); // Halaman admin
                } else {
                    header("Location: ../php/home.php"); // Halaman pengguna biasa
                }
                exit();
            } else {
                echo "Password salah.";
            }
        } else {
            echo "Username tidak ditemukan.";
        }

        // Menutup pernyataan
        $stmt->close();
    } 
}

// Menutup koneksi
$conn->close();
?>
<body class="bg-gray-900 flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg shadow-lg flex overflow-hidden max-w-4xl w-full">
        <div class="bg-gray-100 p-10 flex-1 flex flex-col items-center justify-center">
            <img alt="Illustration of a coffee cup with coffee beans and steam" class="mb-6" height="200" src="../gambar/download.jpeg" width="200"/>
            <h2 class="text-2xl font-semibold mb-2">Coffee Kitaa</h2>
            <p class="text-gray-600">Find the best coffee to accompany your days</p>
        </div>
        <div class="bg-gray-800 text-white p-10 flex-1 flex flex-col justify-center">
            <div class="mb-6 text-center">
                <img alt="Logo" class="mb-4 rounded-full" height="50" src="../gambar/logokasir.jpg" width="90" />
                <h2 class="text-2xl font-semibold">Selamat Datang</h2>
                <p class="text-gray-400">Tolong Login Terlebih Dahulu</p>
            </div>
            <form method="POST">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-400" for="username">Username</label>
                    <input id="username" name="username" class="mt-1 block w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-gray-500"  type="text" required/>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-400" for="password">Password</label>
                    <input name="password" class="mt-1 block w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-gray-500" id="password" type="password" required/>
                </div>
                <div class="flex items-center justify-between mb-6">
                    <label class="flex items-center text-sm text-gray-400">
                        <input class="form-checkbox bg-gray-700 border-gray-600 text-gray-500" type="checkbox" id="show-password" onclick="togglePasswordVisibility()"/>
                        <span class="ml-2">Tampilkan Password</span>
                    </label>
                </div>
                <button class="w-full py-2 bg-white text-gray-800 rounded-md font-semibold hover:bg-gray-200" type="submit">Log in</button>
            </form>
        </div>
    </div>
    
</body>
<script>
    function togglePasswordVisibility() {
        var passwordField = document.getElementById("password");
        var checkbox = document.getElementById("show-password");

        // Ubah tipe passwordField berdasarkan status checkbox
        if (checkbox.checked) {
            passwordField.type = "text"; // Tampilkan password
        } else {
            passwordField.type = "password"; // Sembunyikan password
        }
    }
</script>
</html>