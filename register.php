<?php
include "koneksi.php";
session_start();

if(isset($_POST['username'], $_POST['password'], $_POST['password2'])){
    $username = trim($_POST['username']);
    $pass1 = $_POST['password'];
    $pass2 = $_POST['password2'];

    if($pass1 !== $pass2){
        $error = "Password tidak cocok!";
    } else {
        $hash = password_hash($pass1, PASSWORD_DEFAULT);

        // Cek username sudah ada?
        $stmt = $koneksi->prepare("SELECT id FROM mahasiswa_user WHERE username=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows > 0){
            $error = "Username sudah digunakan!";
        } else {
            // Masukkan akun baru
            $stmt_insert = $koneksi->prepare("INSERT INTO mahasiswa_user (username, password) VALUES (?, ?)");
            $stmt_insert->bind_param("ss", $username, $hash);
            if($stmt_insert->execute()){
                $success = "Akun berhasil dibuat! <a href='index.php'>Login di sini</a>";
            } else {
                $error = "Gagal membuat akun.";
            }
            $stmt_insert->close();
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrasi Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Buat Akun Mahasiswa</h2>
    <?php 
    if(isset($error)) echo "<p style='color:red;'>$error</p>";
    if(isset($success)) echo "<p style='color:green;'>$success</p>";
    ?>
    <form method="POST" action="">
        <label>Username (NIM):</label>
        <input type="text" name="username" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <label>Ulangi Password:</label>
        <input type="password" name="password2" required>

        <button type="submit">Buat Akun</button>
    </form>

    <p>Sudah punya akun? <a href="index.php">Login di sini</a></p>
</div>
</body>
</html>
