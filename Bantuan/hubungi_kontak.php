

<?php 
session_start();
include 'Database/Database.php';


// Ambil ID kontak dari URL
$contact_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Ambil informasi kontak dari database
$sql = "SELECT contact FROM Contact WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $contact_id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    // Redirect ke tautan atau nomor kontak
    header("Location: " . $row['contact']);
} else {
    echo "Kontak tidak ditemukan.";
}

$stmt->close();
$conn->close();

?>