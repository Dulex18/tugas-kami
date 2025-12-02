<!DOCTYPE html>
<html>
<head>
    <title>Form Mahasiswa</title>
    <link rel="stylesheet" href="from.css">
</head>
<body>

    <div class="form-container">
        <h2>Form Pendaftaran Mahasiswa</h2>

        <form action="process.php" method="POST">
            <label>Nama:</label>
            <input type="text" name="nama" required>

            <label>NPM:</label>
            <input type="text" name="npm" required>

            <label>Jurusan:</label>
            <select name="jurusan" required>
                <option value="">-- Pilih Jurusan --</option>
                <option>Sistem Informasi</option>
                <option>Informatika</option>
            </select>

            <button type="submit">Simpan</button>
        </form>
    </div>

</body>
</html>
