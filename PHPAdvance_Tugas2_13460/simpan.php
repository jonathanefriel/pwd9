<?php
   require 'koneksi.php';

   if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_menu = trim($_POST['nama_menu'] ?? '');
    $kategori = trim($_POST['kategori'] ?? '');
    $harga = trim($_POST['harga'] ?? '');

    if($nama_menu === '' || $kategori === '' || $harga === '') {
        echo '<p style="color:red;">!! Harap Lengkapi Semua Data. !! </p>';
    } elseif (!ctype_digit($harga)) {
        echo '<p style="color:red;">!! Harga Hanya Boleh Mengandung Angka. !! </p>';
    } else {
        $stmt = mysqli_prepare($conn, 'INSERT INTO menu (nama_menu, kategori, harga) VALUES (?, ?, ?)');
        mysqli_stmt_bind_param($stmt, 'ssi', $nama_menu, $kategori, $harga);
        mysqli_stmt_execute($stmt);

        echo '<p> Data Berhasil Disimpan (' . mysqli_stmt_affected_rows($stmt) . ' baris).</p>';
    }
   } else {
    echo '<p>Silahkan Isi Formulir Terlebih Dahulu.</p>';
   }

   echo '<a href="index.xhtml">Kembali</a>';

?>