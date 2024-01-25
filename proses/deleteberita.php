<?php

include_once '../koneksi.php';


if (!isset($_GET['id-berita'])) {
    echo '<script>window.location="databerita.php";</script>';
}

$id_berita = $_GET['id-berita'];

mysqli_query($conn, "DELETE FROM berita WHERE id_berita = '$id_berita' ") or die(mysqli_error($conn));

if (mysqli_affected_rows($conn) > 0) {
    echo '<script>alert("Data berhasil dihapus");window.location="../databerita.php";</script>';
} else {
    echo '<script>alert("Data gagal dihapus");window.location="../databerita.php";</script>';
}
