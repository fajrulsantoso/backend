<?php
// File: upload_foto.php
include 'config.php'; // Koneksi ke database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = $_POST['nim']; // NIM mahasiswa
    $foto = $_FILES['foto']; // File foto yang diunggah

    // Direktori upload
    $upload_dir = 'uploads/';
    $file_name = $nim . '_' . basename($foto['name']); // Nama file berdasarkan NIM
    $file_path = $upload_dir . $file_name;

    // Pindahkan file ke direktori upload
    if (move_uploaded_file($foto['tmp_name'], $file_path)) {
        // Update nama file foto di database
        $query = "UPDATE mahasiswa SET foto = '$file_name' WHERE nim = '$nim'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "Foto berhasil diunggah dan diperbarui!";
        } else {
            echo "Gagal menyimpan data ke database: " . mysqli_error($conn);
        }
    } else {
        echo "Gagal mengunggah file.";
    }
}
?>
