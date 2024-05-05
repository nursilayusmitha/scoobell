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
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Masukkan data ke dalam database
$sql = "INSERT INTO messages (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Pesan berhasil dikirim'); window.location.href = 'contact.html';</script>";
} else {
    // Jika gagal, tambahkan pesan error ke halaman formulir
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi database
$conn->close();
?>
