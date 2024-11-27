<!-- file yang digunakan untuk mengubah data pribadi dibagian Data diri mahasiswa -->
<!-- digunakan untuk mendapatkan data mahasiswa dari database atau nim -->

<?php 
session_start();
include 'Database/Database.php'; //file yang ke database
$nim = $_SESSION['nim']; //Ambil nim dari sesi login
$query = "SELECT * FROM UserDetail WHERE nim = '$nim'";
$result = mysqli_query($sconn, $query);

if($result){   
$data =mysqli_fetch_assoc($result);
echo json_decode($data); //digunakan untuk mengubah data ke dalam format json
} else {
    echo json_encode(["error" => "Gagal mendapatkan data mahasiswa"]);
}


?>