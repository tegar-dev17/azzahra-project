<?php

include_once '../koneksi.php';


if (!isset($_GET['id-jadwal'])) {
    echo '<script>window.location="dokter.php";</script>';
}

$id_dokter = $_GET['id-jadwal'];

mysqli_query($conn, "DELETE FROM dokter WHERE id_dokter = '$id_dokter' ") or die(mysqli_error($conn));

if (mysqli_affected_rows($conn) > 0) {
    echo '<script>alert("Data berhasil dihapus");window.location="../admin/dokter.php";</script>';
} else {
    echo '<script>alert("Data gagal dihapus");window.location="../admin/dokter.php";</script>';
}
