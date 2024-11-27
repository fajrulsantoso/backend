<!-- kode untuk mereset passwoard -->

<?php 
session_start();
include 'Database/Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);

    // Update password di database
    $sql = "UPDATE Users SET password = ? WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $new_password, $email);

    if ($stmt->execute()) {
        echo "Password berhasil diubah!";
    } else {
        echo "Gagal mengubah password.";
    }

    $stmt->close();
}

?>