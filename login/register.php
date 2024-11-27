
<?php 
session_start();
include 'Database/Database.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $prodi_id = $_POST['prodi_id'];
    $nim = $_POST['nim'];

    // Insert ke tabel Users
    $sql = "INSERT INTO Users (name, email, password, role) VALUES (?, ?, ?, '0')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $name, $email, $password);

    if ($stmt->execute()) {
        $user_id = $stmt->insert_id;

        // Insert ke tabel UserDetail
        $sql_detail = "INSERT INTO UserDetail (user_id, prodi_id, nim) VALUES (?, ?, ?)";
        $stmt_detail = $conn->prepare($sql_detail);
        $stmt_detail->bind_param('iis', $user_id, $prodi_id, $nim);
        $stmt_detail->execute();

        echo "Registrasi berhasil!";
        $stmt_detail->close();
    } else {
        echo "Registrasi gagal: " . $stmt->error;
    }

    $stmt->close();
}

 ?>       