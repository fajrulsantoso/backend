<!-- file yang digunakan untuk untuk menggungah foto dibagian Data diri mahasiswa -->
<?php
session_start();
include 'Database/Database.php';
$nim = $_SESSION['nim'];
$user_id = $_SESSION['user_id'];

// Kode dibawah ini mengecek apakah ada file yang diunggah dengan nama foto. 
//Jika ada, maka akan membuat nama file yang unik berdasarkan $nim
if (isset($_FILES['foto'])) {
$file_name = $nim . "_" . time() . ".jpg";
$target_file = "uploads" . $file_name;


if (in_array(pathinfo($target_file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png'])) {
if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
    mysqli_query($conn, "UPDATE UserDetail SET path = '$target_file' WHERE user_id = '$user_id'");
    echo "Foto berhasil diunggah";
    } else {
    echo "Gagal mengunggah foto";
        }
    } else {
        echo "Format file tidak didukung";
    }
} else {
    echo "Tidak ada file yang diunggah";
}
?>


