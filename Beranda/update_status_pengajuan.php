<!-- dibagian Beranda -->
<!-- Endpoint untuk memperbarui status pengajuan berdasarkan aksi tertentu ( admin memverifikasi berkas). -->

<?php
include 'Database/Database.php';

$nim = $_POST['nim']; // NIM mahasiswa
$langkah = $_POST['langkah']; // Langkah yang diperbarui (misalnya langkah3 untuk verifikasi)

// Validasi input
if (empty($nim) || empty($langkah)) {
    echo json_encode(["error" => "Data tidak valid"]);
    exit();
}

$query = "UPDATE status_pengajuan SET $langkah = '1' WHERE nim = '$nim'"; // '1' untuk status selesai
$result = mysqli_query($conn, $query);

if ($result) {
    echo json_encode(["success" => "Status pengajuan berhasil diperbarui"]);
} else {
    echo json_encode(["error" => "Gagal memperbarui status"]);
}
?>
