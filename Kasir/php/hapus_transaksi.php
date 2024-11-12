<?php
include("../php/koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Siapkan dan jalankan query untuk menghapus data
    $stmt = $conn->prepare("DELETE FROM transaksi WHERE id = ?");
    $stmt->bind_param("i", $id); // 'i' menandakan bahwa parameter adalah integer

    if ($stmt->execute()) {
        // Jika berhasil, arahkan ke halaman lain atau tampilkan pesan
        $_SESSION['message'] = "Transaksi berhasil dihapus.";
    } else {
        $_SESSION['message'] = "Terjadi kesalahan saat menghapus transaksi: " . $stmt->error;
    }

    $stmt->close();
} else {
    $_SESSION['message'] = "ID transaksi tidak ditemukan.";
}

// Tutup koneksi
$conn->close();

// Arahkan kembali ke halaman sebelumnya
header("Location: ../php/data_transaksi.php"); // Ganti dengan halaman yang sesuai
exit();
?>