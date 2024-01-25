<?php
include "koneksi.php"; // Ganti dengan file koneksi database Anda

// Ambil nilai id_karir yang dikirim melalui AJAX
$id_karir = $_POST['id_karir'];

// Gunakan fungsi getCakarOptions dengan parameter $id_karir
$result = getCakarOptions($id_karir);

// Buat opsi pelamar
$options = "";
while ($row = mysqli_fetch_assoc($result)) {
    $options .= "<option value='{$row['nama']}'>{$row['nama']}</option>";
}

// Keluarkan opsi pelamar sebagai respons AJAX
echo $options;

// Tutup koneksi database
mysqli_close($connection);
