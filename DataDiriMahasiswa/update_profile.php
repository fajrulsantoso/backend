<!-- file yang digunakan untuk mengubah data pribadi dibagian Data diri mahasiswa -->
 <!-- Memperbarui data pribadi seperti tempat lahir, tanggal lahir, jenis kelamin, dan nomor telepon. -->

 <?php 
session_start();
include 'Database/Database.php';

$nim = $_SESSION['nim'];                    // Mengambil NIM dari session
$tempat_lahir = $_POST['tempat_lahir'];     // Mengambil tempat lahir dari form
$tgl_lahir = $_POST['tgl_lahir'];   // Mengambil tanggal lahir dari form
$jenis_kelamin = $_POST['jenis_kelamin'];   // Mengambil jenis kelamin dari form
$no_tlp = $_POST['no_tlp']; 

//tujuan dari code ini apakah semua nya sudah diisi fiel atau belum jika tidak maka sistem akan memberitahu
if (!$tempat_lahir || !$tgl_lahir || !$jenis_kelamin || !$no_tlp) {
    echo json_encode(["error" => "Semua field wajib diisi"]);
    exit();
}

// maksud dari kode di gunakan untuk memperbarui data mahasiswa berdasarkan nim
$query = "UPDATE UserDetail SET tempat_lahir =
'$tempat_lahir', tgl_lahir = 
'$tgl_lahir', jenis_kelamin = 
'$jenis_kelamin', no_telepon = 
'$no_tlp' WHERE nim = '$nim'";

// digunakan untuk mengecek apakah tabel udah berhasil diperbarui atau tidak
$result = mysqli_query($conn, $query);

if ($result) {
    echo json_encode(["success" => "Data berhasil diperbarui"]);
} else {
    echo json_encode(["error" => "Gagal memperbarui data"]);
}

?>