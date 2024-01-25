<?php
include 'koneksi.php';

// Ambil nilai dari formulir
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$pesan = $_POST['pesan'];

// Validasi dan proses nomor WhatsApp
$no_hp = preg_replace('/^0/', '', $no_hp);

// Siapkan pernyataan SQL untuk menyimpan data ke dalam database
$sql = "INSERT INTO pesan (nama, no_hp, pesan) VALUES ('$nama', '$no_hp', '$pesan')";

// Eksekusi pernyataan SQL
if ($conn->query($sql) === TRUE) {
    $response['status'] = 'success';
    $response['message'] = 'Pesan Berhasil Dikirim!';
} else {
    $response['status'] = 'error';
    $response['message'] = 'Terjadi kesalahan: ' . $conn->error;
}

// Tutup koneksi ke database
$conn->close();

// Mengembalikan respons dalam format JSON
header('Content-Type: application/json');
echo json_encode($response);
