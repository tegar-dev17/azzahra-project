<?php
include 'koneksi.php';
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['email'])) {
    header("Location: logincakar.php"); // Redirect jika belum login
    exit();
}

// Ambil informasi pengguna dari sesi
$email = $_SESSION['email'];

// Query untuk mendapatkan informasi pengguna dari database
$sql = "SELECT
        k.id AS karir_id,
        k.nama_loker AS karir_nama_loker,
        k.pendidikan AS karir_pendidikan,
        k.kualifikasi AS karir_kualifikasi,
        k.deadline AS karir_deadline,
        k.deskripsi AS karir_deskripsi,
        k.alamat AS karir_alamat,
        c.id AS cakar_id,
        c.nama_loker AS cakar_nama_loker,
        c.no_ktp AS cakar_no_ktp,
        c.nama AS cakar_nama,
        c.tempat_lahir AS cakar_tempat_lahir,
        c.tanggal_lahir AS cakar_tanggal_lahir,
        c.jk AS cakar_jk,
        c.s_pernikahan AS cakar_s_pernikahan,
        c.tb AS cakar_tb,
        c.bb AS cakar_bb,
        c.no_hp AS cakar_no_hp,
        c.email AS cakar_email,
        c.street AS cakar_street,
        c.kabupaten AS cakar_kabupaten,
        c.kecamatan AS cakar_kecamatan,
        c.kelurahan AS cakar_kelurahan,
        c.provinsi AS cakar_provinsi,
        c.kode_pos AS cakar_kode_pos,
        c.pas_photo AS cakar_pas_photo,
        c.berkas AS cakar_berkas,
        c.pendidikan AS cakar_pendidikan,
        sl.id AS status_lamaran_id,
        sl.status AS status_lamaran_status
    FROM
        azzahra.karir k
    JOIN
        azzahra.status_lamaran sl ON k.id = sl.id_karir
    JOIN
        azzahra.cakar c ON sl.id_cakar = c.id
    WHERE
        c.email = '$email'";

$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $nama = $row['cakar_nama']; // Ganti 'cakar_nama' dengan kolom yang sesuai di tabel cakar
} else {
    // Handle jika informasi pengguna tidak ditemukan
    echo "Informasi pengguna tidak ditemukan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil Karyawan</title>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200 font-sans" style="background-image: url('dist/img/igd1.png'); background-size: cover; background-repeat: no-repeat;">

    <div class="container mx-auto my-8 p-8 bg-white rounded-lg shadow-md">
        <!-- Kop Surat -->
        <div class="flex items-center justify-between mb-6 border-b">
            <div class="flex items-center">
                <!-- Logo Perusahaan -->
                <img src="dist/img/icon.ico" alt="Logo Perusahaan" class="w-16 h-16 mr-4">

                <!-- Informasi Perusahaan -->
                <div>
                    <h1 class="text-3xl text-blue-900 font-bold">E-RECRUITMENT</h1>
                    <p class="text-red-500">RUMAH SAKIT AZZAHRA</p>
                </div>
            </div>
            <!-- Tanggal -->
            <p class="text-gray-500 hidden md:flex"><?php echo date('d F Y'); ?></p>

        </div>

        <h1 class="text-lg text-gray-800 mb-6 font-extralight">Selamat Datang,<br>
            <font class="text-3xl"><?php echo $nama; ?>!</font>
        </h1>
        <br>
        <!-- Tampilkan data status lamaran -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div>
                <p class="text-gray-700 font-semibold">LOKER</p>
                <p class="text-gray-800"><?php echo $row['karir_nama_loker']; ?></p>
            </div>

            <div>
                <p class="text-gray-700 font-semibold">ID Lamaran</p>
                <p class="text-gray-800"><?php echo $row['status_lamaran_id']; ?></p>
            </div>

            <div>
                <p class="text-gray-700 font-semibold">Status Lamaran</p>
                <p class="text-gray-800 rounded-lg"><?php echo $row['status_lamaran_status']; ?></p>
            </div>
            <!-- Status Tahapan Lamaran -->
            <div class="mb-6 col-span-3">
                <div class="col-span-2 mt-4">
                    <p class="text-center mt-2 text-2xl font-bold text-blue-900">Status Tahapan Lamaran</p>
                </div>
                <br>
                <div class="mb-4">
                    <p class="text-center status-label <?php echo ($row['status_lamaran_status'] == 'PENDAFTARAN DITERIMA') ? 'text-red-500 font-bold' : 'text-gray-200 '; ?>">PENDAFTARAN DITERIMA</p>
                    <hr class="border-b border-gray-300">
                </div>

                <div class="mb-4">
                    <p class="text-center status-label <?php echo ($row['status_lamaran_status'] == 'PEMERIKSAAN BERKAS') ? 'text-red-500 font-bold' : 'text-gray-200 '; ?>">PEMERIKSAAN BERKAS</p>
                    <hr class="border-b border-gray-300">
                </div>

                <div class="mb-4">
                    <p class="text-center status-label <?php echo ($row['status_lamaran_status'] == 'TIDAK SESUAI') ? 'text-red-500 font-bold' : 'text-gray-200 '; ?>">TIDAK SESUAI</p>
                    <hr class="border-b border-gray-300">
                </div>

                <div class="mb-4">
                    <p class="text-center status-label <?php echo ($row['status_lamaran_status'] == 'PROSES RECRUITMENT TAHAP 1 (INTERVIEW)') ? 'text-red-500 font-bold' : 'text-gray-200 '; ?>">PROSES RECRUITMENT TAHAP 1 (INTERVIEW)</p>
                    <hr class="border-b border-gray-300">
                </div>

                <div class="mb-4">
                    <p class="text-center status-label <?php echo ($row['status_lamaran_status'] == 'TIDAK DITERIMA') ? 'text-red-500 font-bold' : 'text-gray-200 '; ?>">TIDAK DITERIMA</p>
                    <hr class="border-b border-gray-300">
                </div>

                <div class="mb-4">
                    <p class="text-center status-label <?php echo ($row['status_lamaran_status'] == 'DITERIMA') ? 'text-red-500 font-bold' : 'text-gray-200 '; ?>">DITERIMA</p>
                    <hr class="border-b border-gray-300">
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>