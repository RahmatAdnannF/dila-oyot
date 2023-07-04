<?php
// Menerima data dari form
$kodeDosen = $_POST['kodeDosen'];
$kodeMatkul = $_POST['kodeMatkul'];
$waktu = $_POST['waktu'];

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_akademik";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memasukkan data jadwal
$insertJadwalSql = "INSERT INTO jadwal (kode_dosen, kode_matkul, waktu) VALUES ('$kodeDosen', '$kodeMatkul', '$waktu')";
if ($conn->query($insertJadwalSql) === TRUE) {
    echo "Jadwal kuliah berhasil ditambahkan.";
} else {
    echo "Terjadi kesalahan: " . $conn->error;
}

// Menutup koneksi
$conn->close();
?>
