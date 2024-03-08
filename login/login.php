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

// Ambil data dari form login
$username = $_POST['Username'];
$password = $_POST['Password'];

// Query untuk memeriksa apakah username dan password cocok
$query = "SELECT * FROM akun WHERE Username='$username' AND Password='$password'";
$result = $conn->query($query);

// Periksa hasil query
if ($result->num_rows == 1) {
    // Login berhasil
    // Redirect ke halaman add-file.html
    header("Location: ../add-file/add-file.html");
    exit();
} else {
    // Login gagal
    echo "Login gagal. Silakan coba lagi.";
}

// Tutup koneksi
$conn->close();
?>