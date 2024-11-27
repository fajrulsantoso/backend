<!-- file yang digunakan untuk mereset passwoard dibagian Data diri mahasiswa -->

<?php
session_start();
include 'Database/Database.php';

$nim = $_SESSION['nim'];  // Mengambil nim dari session
$password_lama = $_POST['password_lama'];
$password_baru = $_POST['password_baru'];
$ulang_password_baru = $_POST['ulang_password_baru'];

// Validasi input
if (empty($password_lama) || empty($password_baru) || empty($ulang_password_baru)) {
    echo json_encode(["error" => "Semua field wajib diisi"]);
    exit();
}

// Cek apakah password baru cocok dengan konfirmasi password
if ($password_baru !== $ulang_password_baru) {
    echo json_encode(["error" => "Password baru tidak cocok"]);
    exit();
}

// Ambil user_id dan password dari tabel Users berdasarkan nim
$query = "SELECT id, password FROM Users WHERE email = '$nim'";  // Menggunakan email sebagai identifikasi (misalnya nim digunakan sebagai email)
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

// Cek apakah password lama yang dimasukkan benar
if (!password_verify($password_lama, $data['password'])) {
    echo json_encode(["error" => "Password lama salah"]);
    exit();
}

// Enkripsi password baru
$password_baru_hashed = password_hash($password_baru, PASSWORD_BCRYPT);

// Update password baru di tabel Users
$query = "UPDATE Users SET password = '$password_baru_hashed' WHERE id = {$data['id']}";
if (mysqli_query($conn, $query)) {
    echo json_encode(["success" => "Password berhasil diubah"]);
} else {
    echo json_encode(["error" => "Gagal mengubah password"]);
}
?>
