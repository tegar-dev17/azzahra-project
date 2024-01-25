<?php
// Sambungkan ke database
include '../koneksi.php';

/// Waktu terakhir pembaruan (Anda perlu menyimpan ini, misalnya di database atau sesuai kebutuhan)
$lastUpdateTimestamp = time(); // Menyesuaikan dengan waktu saat ini

// Query untuk mendapatkan jumlah notifikasi yang masuk hari ini
$query_count = mysqli_query($conn, "SELECT COUNT(*) as count FROM notifikasi WHERE DATE(waktu_notifikasi) = CURDATE()") or die(mysqli_error($conn));
$data_count = mysqli_fetch_assoc($query_count);
$notification_count = $data_count['count'];

// Inisialisasi respons JSON
$response = array(
    'count' => $notification_count,
    'notifications' => '',
    'newNotification' => false, // Diatur sebagai false secara default
);

// Query untuk mendapatkan notifikasi yang masuk hari ini
$query_notifikasi = mysqli_query($conn, "SELECT nama_pengirim, waktu_notifikasi FROM notifikasi WHERE DATE(waktu_notifikasi) = CURDATE() ORDER BY waktu_notifikasi DESC") or die(mysqli_error($conn));

// Loop untuk menyiapkan notifikasi dalam respons
while ($data_notifikasi = mysqli_fetch_assoc($query_notifikasi)) {
    $waktu_jam = date('H:i', strtotime($data_notifikasi['waktu_notifikasi']));

    $response['notifications'] .= '
    <a href="#" class="dropdown-item">
        <i class="fas fa-envelope mr-2"></i>
        <small class="float-right text-muted">' . $waktu_jam . '</small>
        <span class="float-right text-muted text-sm mr-2">' . $data_notifikasi['nama_pengirim'] . '</span>
    </a>
    <div class="dropdown-divider"></div>';

    // Perbandingan timestamp notifikasi terbaru dengan waktu terakhir pembaruan
    if (strtotime($data_notifikasi['waktu_notifikasi']) > $lastUpdateTimestamp) {
        $response['newNotification'] = true; // Set true jika ada notifikasi baru

        // Update timestamp terakhir jika ada notifikasi baru
        $lastUpdateTimestamp = strtotime($data_notifikasi['waktu_notifikasi']);
        // Simpan $lastUpdateTimestamp ke database atau tempat penyimpanan lainnya jika diperlukan
        // Misalnya: mysqli_query($conn, "UPDATE last_update SET timestamp = $lastUpdateTimestamp");
    }
}

// Tutup koneksi ke database
$conn->close();

// Kembalikan respons dalam format JSON
header('Content-Type: application/json');
echo json_encode($response);
