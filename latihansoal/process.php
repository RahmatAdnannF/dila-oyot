<?php
// Menerima data dari form
$kodeBarang = $_POST['kodeBarang'];
$jumlah = $_POST['jumlah'];

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_transaksi";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

// Memulai transaksi
$conn->begin_transaction();

try {
  // Mengurangi stock barang
  $updateStockSql = "UPDATE barang SET stock_barang = stock_barang - $jumlah WHERE kode_barang = $kodeBarang";
  $conn->query($updateStockSql);

  // Memasukkan data transaksi
  $insertTransaksiSql = "INSERT INTO transaksi (kode_barang, jumlah) VALUES ($kodeBarang, $jumlah)";
  $conn->query($insertTransaksiSql);

  // Jika semua operasi berhasil, komit transaksi
  $conn->commit();

  echo "Transaksi berhasil dilakukan.";
} catch (Exception $e) {
  // Jika terjadi kesalahan, batalkan transaksi
  $conn->rollback();

  echo "Terjadi kesalahan dalam transaksi: " . $e->getMessage();
}

// Menutup koneksi
$conn->close();
?>
