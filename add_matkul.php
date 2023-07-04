<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Mata Kuliah</title>
</head>
<body>
    <h2>Tambah Data Mata Kuliah</h2>

    <form method="post" action="process_matkul.php">
        <label for="kodeMatkul">Kode Mata Kuliah:</label>
        <input type="text" name="kodeMatkul" id="kodeMatkul" required>
        <br><br>
        <label for="namaMatkul">Nama Mata Kuliah:</label>
        <input type="text" name="namaMatkul" id="namaMatkul" required>
        <br><br>
        <label for="sks">SKS:</label>
        <input type="number" name="sks" id="sks" required>
        <br><br>
        <input type="submit" value="Tambah Data Mata Kuliah">
    </form>
</body>
</html>
