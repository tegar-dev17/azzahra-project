<?php
// ambil_notifikasi.php

// Sesuaikan dengan skema tabel dan koneksi database Anda
include '../koneksi.php';

// Query untuk mengambil notifikasi
$query = "SELECT * FROM pesan WHERE notifikasi = 1 ORDER BY waktu DESC LIMIT 5";
$result = $conn->query($query);

$notifications = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $notifications[] = array(
            'message' => $row['pesan'],
            'time' => $row['waktu']
        );

        // Setelah diambil, atur notifikasi menjadi non-notifikasi
        $updateQuery = "UPDATE pesan SET notifikasi = 0 WHERE id = " . $row['id'];
        $conn->query($updateQuery);
    }
}

// Kembalikan notifikasi dalam format JSON
header('Content-Type: application/json');
echo json_encode($notifications);
