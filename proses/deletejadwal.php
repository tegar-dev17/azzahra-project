<?php

include_once '../koneksi.php';


if (!isset($_GET['id-jadwal'])) {
    echo '<script>window.location="jadwal.php";</script>';
}

$nama = $_GET['id-jadwal'];

mysqli_query($conn, "DELETE FROM j_dokter WHERE nama = '$nama' ") or die(mysqli_error($conn));

if (mysqli_affected_rows($conn) > 0) {
    echo '<script>alert("Data berhasil dihapus");window.location="../admin/jadwal.php";</script>';
} else {
    echo '<script>alert("Data gagal dihapus");window.location="../admin/jadwal.php";</script>';
}

if (!isset($_GET['id-jadwal'])) {
    echo '<script>window.location="jadwal.php";</script>';
}
