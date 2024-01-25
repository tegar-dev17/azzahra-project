<?php
// reset_notification_count.php

// Sesuaikan dengan skema tabel dan koneksi database Anda
include '../koneksi.php';

// Hapus data notifikasi yang sesuai
$query_delete = mysqli_query($conn, "DELETE FROM notifikasi WHERE DATE(waktu_notifikasi) = CURDATE()") or die(mysqli_error($conn));

// Tutup koneksi ke database
$conn->close();
