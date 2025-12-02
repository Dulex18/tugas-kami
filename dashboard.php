<?php
session_start();
include "koneksi.php";

if(!isset($_SESSION['user'])){
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Selamat datang, <?php echo $_SESSION['user']; ?></h2>
    <p>Silakan isi data diri Anda di bawah ini:</p>

    <form action="simpan.php" method="POST">
        <label>Nama:</label>
        <input type="text" name="nama" required value="<?php echo isset($nama_simpan)?$nama_simpan:''; ?>">

        <label>NIM:</label>
        <input type="text" name="nim" required value="<?php echo isset($nim_simpan)?$nim_simpan:''; ?>">

        <label>Jurusan:</label>
        <select name="jurusan" required>
            <option value="">--Pilih Jurusan--</option>
            <option value="Sistem Informasi" <?php if(isset($jurusan_simpan) && $jurusan_simpan=='Sistem Informasi') echo 'selected'; ?>>Sistem Informasi</option>
            <option value="Teknik Informatika" <?php if(isset($jurusan_simpan) && $jurusan_simpan=='Teknik Informatika') echo 'selected'; ?>>Teknik Informatika</option>
            <option value="Manajemen Informatika" <?php if(isset($jurusan_simpan) && $jurusan_simpan=='Manajemen Informatika') echo 'selected'; ?>>Manajemen Informatika</option>
            <option value="Ilmu Komputer" <?php if(isset($jurusan_simpan) && $jurusan_simpan=='Ilmu Komputer') echo 'selected'; ?>>Ilmu Komputer</option>
        </select>

        <button type="submit">Simpan</button>
    </form>

    <p><a href="logout.php">Logout</a></p>
</div>
</body>
</html>