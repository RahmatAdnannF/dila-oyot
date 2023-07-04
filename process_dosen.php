<?php
// Menerima data dari form
$kodeDosen = $_POST['kodeDosen'];
$namaDosen = $_POST['namaDosen'];
$jabatan = $_POST['jabatan'];

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_akademik";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memasukkan data dosen
$insertDosenSql = "INSERT INTO dosen (kode_dosen, nama_dosen, jabatan) VALUES ('$kodeDosen', '$namaDosen', '$jabatan')";
if ($conn->query($insertDosenSql) === TRUE) {
    echo "Data dosen berhasil ditambahkan.";
} else {
    echo "Terjadi kesalahan: " . $conn->error;
}

// Menutup koneksi
$conn->close();
?>
