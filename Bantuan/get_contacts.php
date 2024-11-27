<?php 
session_start();
include 'Database/Database.php';

// Ambil program studi dari URL (contoh: DIV - Teknik Informatika)
$prodi = isset($_GET['prodi']) ? $_GET['prodi'] : '';

// Ambil data kontak berdasarkan prodi
$sql = "SELECT name, contact, description FROM Contact WHERE prodi = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $prodi);
$stmt->execute();
$result = $stmt->get_result();

// Buat array kontak
$contacts = [];
while ($row = $result->fetch_assoc()) {
    $contacts[] = $row;
}

// Tampilkan hasil dalam format JSON
header('Content-Type: application/json');
echo json_encode($contacts);

$stmt->close();
$conn->close();
?>

?>