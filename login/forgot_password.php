<!-- kode ini untuk lupa kata sandi -->

<?php 
session_start();
include 'Database/Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Periksa apakah email ada di database
    $sql = "SELECT id FROM Users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Kirim email (disederhanakan tanpa implementasi sesungguhnya)
        echo "Email untuk reset password telah dikirim!";
    } else {
        echo "Email tidak ditemukan.";
    }

    $stmt->close();
}

?>