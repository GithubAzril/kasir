<?php
session_start();
if (isset($_FILES['profile_image'])) {
    $file = $_FILES['profile_image'];
    $uploadDir = 'uploads/'; // Pastikan folder ini ada dan dapat ditulis
    $uploadFile = $uploadDir . basename($file['name']);

    // Cek apakah file adalah gambar
    $check = getimagesize($file['tmp_name']);
    if ($check !== false) {
        if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
            // Update path gambar di database
            $userId = $_SESSION['user_id'];
            // Update query ke database untuk menyimpan path gambar
            $conn = new mysqli("localhost", "root", "", "19018_webkasir");
            $query = "UPDATE users SET profile_image = '$uploadFile' WHERE id = $userId";
            if ($conn->query($query) === TRUE) {
                // Setelah berhasil, simpan gambar ke session
                $_SESSION['profile_image'] = $uploadFile;
                header("Location: dashboard.php");
                exit();
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        } else {
            echo "Gagal mengupload gambar.";
        }
    } else {
        echo "File yang diupload bukan gambar.";
    }
}