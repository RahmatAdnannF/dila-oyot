<!DOCTYPE html>
<html>
<head>
    <title>Transaksi Jadwal Kuliah</title>
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
<h2>Menu</h2>

<ul>
    <li><a href="add_dosen.php">Tambah Dosen</a></li>
    <li><a href="add_matkul.php">Tambah Matkul</a></li>
</ul>

    <h2>Form Tambah Jadwal Kuliah</h2>

    <form method="post" action="process.php">
        <label for="kodeDosen">Kode Dosen:</label>
        <input type="text" name="kodeDosen" id="kodeDosen" required>
        <br><br>
        <label for="kodeMatkul">Kode Mata Kuliah:</label>
        <input type="text" name="kodeMatkul" id="kodeMatkul" required>
        <br><br>
        <label for="waktu">Waktu:</label>
        <input type="datetime-local" name="waktu" id="waktu" required>
        <br><br>
        <input type="submit" value="Tambah Jadwal">
    </form>

    <br><br>

    <h2>Data Jadwal Kuliah</h2>

<?php
    // Koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_akademik";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Mengambil data jadwal
    $sql = "SELECT jadwal.id, dosen.nama_dosen, matkul.nama_matkul, jadwal.waktu
            FROM jadwal
            INNER JOIN dosen ON jadwal.kode_dosen = dosen.kode_dosen
            INNER JOIN matkul ON jadwal.kode_matkul = matkul.kode_matkul";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Nama Dosen</th><th>Mata Kuliah</th><th>Waktu</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["id"]."</td><td>".$row["nama_dosen"]."</td><td>".$row["nama_matkul"]."</td><td>".$row["waktu"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada data jadwal kuliah.";
    }

    $conn->close();
?>
    
    <h2>Data Dosen</h2>

    <?php
        // Koneksi ke database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "db_akademik";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        
        
        
        
        // Mengambil data dosen
        $sqlDosen = "SELECT * FROM dosen";
        $resultDosen = $conn->query($sqlDosen);

        if ($resultDosen->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Kode Dosen</th><th>Nama Dosen</th><th>Jabatan</th></tr>";
            while($rowDosen = $resultDosen->fetch_assoc()) {
                echo "<tr><td>".$rowDosen["kode_dosen"]."</td><td>".$rowDosen["nama_dosen"]."</td><td>".$rowDosen["jabatan"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "Tidak ada data dosen.";
        }

        $conn->close();
    ?>

    <br><br>

    <h2>Data Mata Kuliah</h2>

    <?php
        // Koneksi ke database
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // Mengambil data mata kuliah
        $sqlMatkul = "SELECT * FROM matkul";
        $resultMatkul = $conn->query($sqlMatkul);

        if ($resultMatkul->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Kode Mata Kuliah</th><th>Nama Mata Kuliah</th><th>SKS</th></tr>";
            while($rowMatkul = $resultMatkul->fetch_assoc()) {
                echo "<tr><td>".$rowMatkul["kode_matkul"]."</td><td>".$rowMatkul["nama_matkul"]."</td><td>".$rowMatkul["sks"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "Tidak ada data mata kuliah.";
        }

        $conn->close();
    ?>
</body>
</html>
