<!-- dibagian Beranda -->
<!-- Endpoint untuk mahasiswa mengunduh surat jika langkah sebelumnya selesai. -->

<?php
session_start();
include 'Database/Database.php';

$nim = $_SESSION['nim'];

// Cek apakah langkah 4 (unduh surat) sudah selesai
$query = "SELECT langkah4 FROM status_pengajuan WHERE nim = '$nim'";
$result = mysqli_query($conn, $query);

$data = mysqli_fetch_assoc($result);
if ($data['langkah4'] == '1') {
$file_path = "surat_bebas_tanggungan/$nim.pdf"; // Contoh path file surat

if (file_exists($file_path)) {
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
readfile($file_path);
exit();

} else {
        echo json_encode(["error" => "File surat tidak ditemukan"]);
        }
} else {
    echo json_encode(["error" => "Surat belum tersedia untuk diunduh"]);
        }
?>
