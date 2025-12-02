<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "koneksi.php";

// Pastikan data form masuk
if(isset($_POST['nama'], $_POST['nim'], $_POST['jurusan'])){

    $nama    = trim($_POST['nama']);
    $nim     = trim($_POST['nim']);
    $jurusan = trim($_POST['jurusan']);

    // Prepared statement untuk keamanan
    $stmt = $koneksi->prepare("INSERT INTO mahasiswa (nama, nim, jurusan) VALUES (?, ?, ?)");

    if(!$stmt){
        die("Gagal prepare: " . $koneksi->error);
    }

    $stmt->bind_param("sss", $nama, $nim, $jurusan);

    if($stmt->execute()){
        echo "Data berhasil disimpan. <a href='input.html'>Input lagi</a>";
    } else {
        echo "Gagal menyimpan: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Form belum lengkap!";
}

$koneksi->close();
?>
