<?php
// File: update_profile.php
include 'config.php'; // Koneksi database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $program_studi = $_POST['program_studi'];
    $jurusan = $_POST['jurusan'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $no_telp = $_POST['no_telp'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    // Validasi data 
    if (empty($nama) || empty($nim) || empty($no_telp)) {
        echo "Harap lengkapi semua data!";
        exit;
    }

    // Query update data
    $query = "UPDATE mahasiswa SET 
                nama = '$nama', 
                program_studi = '$program_studi', 
                jurusan = '$jurusan', 
                tempat_lahir = '$tempat_lahir', 
                tanggal_lahir = '$tanggal_lahir', 
                no_telp = '$no_telp', 
                jenis_kelamin = '$jenis_kelamin' 
              WHERE nim = '$nim'";

    if (mysqli_query($conn, $query)) {
        echo "Profil berhasil diperbarui!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
