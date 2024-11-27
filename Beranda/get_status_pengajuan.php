<!-- dibagian Beranda -->
<!-- Endpoint untuk mengambil status pengajuan mahasiswa. -->
<?php
session_start();
include 'Database/Database.php';

$nim = $_SESSION['nim']; // Ambil NIM dari sesi login

$query = "SELECT langkah1, langkah2, langkah3, langkah4, langkah5 FROM status_pengajuan WHERE nim = '$nim'";
$result = mysqli_query($conn, $query);

if ($result) {
    $data = mysqli_fetch_assoc($result);
    echo json_encode($data);
} else {
    echo json_encode(["error" => "Gagal mendapatkan status pengajuan"]);
}
?>
