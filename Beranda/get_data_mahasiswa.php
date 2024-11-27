<!-- dibagian Beranda -->
<!-- Endpoint untuk mengambil data mahasiswa dari database. -->

<?php
session_start();
include 'Database/Database.php'; // file koneksi database

$nim = $_SESSION['nim']; // Ambil NIM dari sesi login

// Query untuk mengambil data mahasiswa
//Query ini mengambil nama, NIM, program studi, dan jurusan mahasiswa 
//dengan menggabungkan data dari tabel `Users`, `UserDetail`, dan `Prodi` berdasarkan NIM.
$query = "
    SELECT u.name AS nama, ud.nim, p.name AS program_studi, ud.jurusan
    FROM Users u
    JOIN UserDetail ud ON u.id = ud.user_id
    JOIN Prodi p ON ud.prodi_id = p.id
    WHERE ud.nim = '$nim'
";

$result = mysqli_query($conn, $query);

if ($result) {
    $data = mysqli_fetch_assoc($result);
    echo json_encode($data);
} else {
    echo json_encode(["error" => "Gagal mendapatkan data mahasiswa"]);
}
?>
