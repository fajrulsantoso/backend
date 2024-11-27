<!-- kode digunakan untuk melakukan login -->
<?php 
session_start();
include 'Database/Database.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Cek apakah email dan password cocok
    $sql = "SELECT id, password FROM Users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Verifikasi password
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['user_id'] = $row['id'];
            echo "Login berhasil!";
        } else {
            echo "Password salah.";
        }
    } else {
        echo "Email tidak ditemukan.";
    }

    $stmt->close();
}
$conn->close();

?>