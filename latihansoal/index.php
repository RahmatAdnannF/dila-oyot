<!DOCTYPE html>
<html>
<head>
    <title>Form Tambah Data</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
    <h2>Transaksi</h2>

    <form method="post" action="process.php">
        <label for="kodeBarang">Kode Barang:</label>
        <input type="text" name="kodeBarang" id="kodeBarang" required>
        <br><br>
        <label for="jumlah">Jumlah:</label>
        <input type="number" name="jumlah" id="jumlah" required>
        <br><br>
        <input type="submit" value="Kirim">
    </form>

    <br><br>

    <h2>Data Barang</h2>

    <?php
        // Koneksi ke database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "db_transaksi";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // Mengambil data barang
        $sqlBarang = "SELECT * FROM barang";
        $resultBarang = $conn->query($sqlBarang);

        if ($resultBarang->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Kode Barang</th><th>Nama Barang</th><th>Stock Barang</th></tr>";
            while($rowBarang = $resultBarang->fetch_assoc()) {
                echo "<tr><td>".$rowBarang["kode_barang"]."</td><td>".$rowBarang["nama_barang"]."</td><td>".$rowBarang["stock_barang"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "Tidak ada data barang.";
        }

        $conn->close();
    ?>

    <br><br>

    <h2>Data Transaksi</h2>

    <?php
        // Koneksi ke database
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // Mengambil data transaksi
        $sqlTransaksi = "SELECT * FROM transaksi";
        $resultTransaksi = $conn->query($sqlTransaksi);

        if ($resultTransaksi->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID Transaksi</th><th>Kode Barang</th><th>Jumlah</th></tr>";
            while($rowTransaksi = $resultTransaksi->fetch_assoc()) {
                echo "<tr><td>".$rowTransaksi["id"]."</td><td>".$rowTransaksi["kode_barang"]."</td><td>".$rowTransaksi["jumlah"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "Tidak ada data transaksi.";
        }

        $conn->close();
    ?>
</body>
</html>
