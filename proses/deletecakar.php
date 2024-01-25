<?php
include '../koneksi.php';

// Ambil id-cakar dari parameter URL
$id = $_GET['id'];

// Query untuk mendapatkan informasi file yang akan dihapus
$query_select_file = mysqli_query($conn, "SELECT pas_photo, berkas FROM cakar WHERE id = $id");
$data_rs = mysqli_fetch_assoc($query_select_file);

// Hapus file dari sistem file
unlink($data_rs['pas_photo']);
unlink($data_rs['berkas']);

// Query untuk menghapus data dari database
$query_delete = mysqli_query($conn, "DELETE FROM cakar WHERE id = $id");

if ($query_delete) {
    echo '<script>
        alert("Data berhasil dihapus");
        window.location="../index.php";
    </script>';
} else {
    echo '<script>
        alert("Data gagal dihapus");
        window.location="../index.php";
    </script>';
}

mysqli_close($conn);
