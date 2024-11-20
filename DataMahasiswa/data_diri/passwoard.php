<?php
// File: change_password.php
include 'config.php'; // Koneksi ke database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = $_POST['nim']; // NIM mahasiswa
    $password_baru = $_POST['password_baru']; // Password baru

    // Update password di database
    $query = "UPDATE mahasiswa SET password = '$password_baru' WHERE nim = '$nim'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Password berhasil diperbarui!";
    } else {
        echo "Gagal mengubah password: " . mysqli_error($conn);
    }
}
?>
