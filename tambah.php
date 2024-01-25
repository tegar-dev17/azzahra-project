<?php
include 'koneksi.php';

// Total data yang ingin dimasukkan dalam setahun
$totalDataPerTahun = 100000;

// Loop untuk setiap bulan dan masukkan data dengan jumlah acak
for ($bulan = 1; $bulan <= 12; $bulan++) {
    $bulan_str = str_pad($bulan, 2, '0', STR_PAD_LEFT); // Format bulan menjadi dua digit (01, 02, ..., 12)

    // Hitung jumlah data yang akan dimasukkan untuk bulan ini
    $jumlahDataPerBulan = rand(8000, 12000); // Jumlah data acak antara 8000 dan 12000

    for ($i = 1; $i <= $jumlahDataPerBulan; $i++) {
        $tanggal = rand(1, 28); // Pilih tanggal acak antara 1 dan 28 (asumsi setiap bulan memiliki 28 hari)
        $tanggal_str = str_pad($tanggal, 2, '0', STR_PAD_LEFT); // Format tanggal menjadi dua digit (01, 02, ..., 28)

        $date_visited = "2024-$bulan_str-$tanggal_str"; // Format tanggal sesuai dengan YYYY-MM-DD

        $ip_address = "192.168.1.$i"; // Ganti dengan algoritma atau metode penghasilan alamat IP yang sesuai dengan kebutuhan Anda

        // Query untuk memeriksa apakah entri sudah ada sebelumnya
        $query_check = "SELECT * FROM visitor_count WHERE ip_address = '$ip_address' AND date_visited = '$date_visited'";
        $result_check = mysqli_query($conn, $query_check);

        if (mysqli_num_rows($result_check) == 0) {
            // Jika belum ada entri untuk pengunjung ini pada tanggal ini, tambahkan satu entri baru
            $query_insert = "INSERT INTO visitor_count (ip_address, date_visited) VALUES ('$ip_address', '$date_visited')";
            $result_insert = mysqli_query($conn, $query_insert);

            if (!$result_insert) {
                die("Query error: " . mysqli_error($conn));
            }
        }
    }
}

echo "Data berhasil dimasukkan.";

// Tutup koneksi
mysqli_close($conn);
