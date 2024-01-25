<?php

include_once '../koneksi.php';


if (!isset($_GET['id-karir'])) {
    echo '<script>window.location="datakarir.php";</script>';
}

$id = $_GET['id-karir'];

mysqli_query($conn, "DELETE FROM karir WHERE id = '$id' ") or die(mysqli_error($conn));

if (mysqli_affected_rows($conn) > 0) {
    echo '<script>alert("Data berhasil dihapus");window.location="../admin/datakarir.php";</script>';
} else {
    echo '<script>alert("Data gagal dihapus");window.location="../admin/datakarir.php";</script>';
}
