<?php
include 'koneksi.php';

// Inisialisasi response
$response = array('success' => false, 'message' => 'Terjadi kesalahan');

// Ambil ID berita dari permintaan GET
$id_berita = $_GET['id-berita'];

// Tambahkan jumlah klik pada database
$query_tambah_klik = "UPDATE berita SET jumlah_klik = jumlah_klik + 1 WHERE id_berita = '$id_berita'";
if (mysqli_query($conn, $query_tambah_klik)) {
    // Ambil data terbaru setelah penambahan klik
    $query_tampil = mysqli_query($conn, "SELECT * FROM berita WHERE id_berita = '$id_berita' ");
    $berita = mysqli_fetch_assoc($query_tampil);

    // Tutup koneksi ke database
    mysqli_close($conn);

    // Set response sukses
    $response['success'] = true;
    $response['message'] = 'Berhasil menambahkan jumlah klik';
    $response['jumlah_klik'] = $berita['jumlah_klik'];
} else {
    // Jika terjadi kesalahan saat menambahkan klik
    $response['message'] = 'Gagal menambahkan jumlah klik';
}

// Set header sebagai JSON
header('Content-Type: application/json');

// Output response dalam format JSON
echo json_encode($response);
