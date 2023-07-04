<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Dosen</title>
</head>
<body>
    <h2>Tambah Data Dosen</h2>

    <form method="post" action="process_dosen.php">
        <label for="kodeDosen">Kode Dosen:</label>
        <input type="text" name="kodeDosen" id="kodeDosen" required>
        <br><br>
        <label for="namaDosen">Nama Dosen:</label>
        <input type="text" name="namaDosen" id="namaDosen" required>
        <br><br>
        <label for="jabatan">Jabatan:</label>
        <input type="text" name="jabatan" id="jabatan" required>
        <br><br>
        <input type="submit" value="Tambah Data Dosen">
    </form>
</body>
</html>
