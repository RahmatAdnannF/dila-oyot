<?php
// Menerima data dari form
$kodeMatkul = $_POST['kodeMatkul'];
$namaMatkul = $_POST['namaMatkul'];
$sks = $_POST['sks'];

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_akademik";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memasukkan data mata kuliah
$insertMatkulSql = "INSERT INTO matkul (kode_matkul, nama_matkul, sks) VALUES ('$kodeMatkul', '$namaMatkul', '$sks')";
if ($conn->query($insertMatkulSql) === TRUE) {
    echo "Data mata kuliah berhasil ditambahkan.";
} else {
    echo "Terjadi kesalahan: " . $conn->error;
}

// Menutup koneksi
$conn->close();
?>
