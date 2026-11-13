<?php
   require 'koneksi.php';

   $id = $_GET['id'] ?? '';

   if($id === '') {
    echo '<p style="color:red;">!! ID Tidak Valid. !! </p>';
   } elseif (!ctype_digit($id)) {
    echo '<p style="color:red;">!! ID Harus Berupa Angka. !! </p>';
   } else {
    $stmt = mysqli_prepare($conn, 'DELETE FROM menu WHERE id = ?');
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    if(mysqli_stmt_affected_rows($stmt) === 1) {
        echo '<p>Data Berhasil Dihapus</p>';
    } else {
        echo '<p>Data Tidak Ditemukan.</p>';
    }
   }
   echo '<a href="index.xhtml">Kembali</a>';

?>
