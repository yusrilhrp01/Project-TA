<?php
// Mendefinisikan koneksi ke database
$servername = "localhost"; // Ganti dengan nama server Anda
$username = "root"; // Ganti dengan nama pengguna MySQL Anda
$password = ""; // Ganti dengan kata sandi MySQL Anda
$database = "db_user"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Retrieve form data and sanitize inputs
$username = $conn->real_escape_string($_POST['username']);
$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['password']);

// SQL to insert data into table using prepared statement
$sql = "INSERT INTO akun(username, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $email, $password);

try {
    // Execute the statement
    $stmt->execute();
    // Redirect to login page
    header("Location: ../login/login.html");
    exit(); // Ensure script stops execution after redirection
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
