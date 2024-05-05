<?php
// Hubungkan ke database Anda
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'scoobell';

$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Ambil data dari formulir
$name = $_POST['name'];
$address = $_POST['address'];
$datetime = $_POST['datetime'];
$menu = $_POST['select1'];
$special_request = $_POST['message'];

// Masukkan data ke dalam tabel dalam database
$sql = "INSERT INTO orders (name, address, datetime, menu, special_request) VALUES ('$name', '$address', '$datetime', '$menu', '$special_request')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Pesan berhasil dikirim'); window.location.href = 'booking.html';</script>";
} else {
    // Jika gagal, tambahkan pesan error ke halaman formulir
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi database
$conn->close();
?>
