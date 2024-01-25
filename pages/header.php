<?php
include 'koneksi.php';
// Query pertama untuk database 'kerangka'
$query_kerangka = mysqli_query($conn, "SELECT * FROM kerangka WHERE id=1") or die(mysqli_error($conn));

// Periksa apakah hasil query tidak kosong
if (mysqli_num_rows($query_kerangka) > 0) {
    $data_rs_kerangka = mysqli_fetch_assoc($query_kerangka);
} else {
    echo "Data tidak ditemukan";
}

// Query kedua untuk database 'azzahra'
$query_berita = mysqli_query($conn, "SELECT * FROM berita ORDER BY id_berita DESC") or die(mysqli_error($conn));
$beritaData = array();

while ($data_rs_berita = mysqli_fetch_assoc($query_berita)) {
    $judulBerita = $data_rs_berita['judul'];

    if (!isset($beritaData[$judulBerita])) {
        $beritaData[$judulBerita] = array(
            'id_berita' => $data_rs_berita['id_berita'],
            'judul' => $data_rs_berita['judul'],
            'isi' => $data_rs_berita['isi'],
            'headline' => $data_rs_berita['headline'],
            'tanggal' => $data_rs_berita['tanggal'],
            'photo' => $data_rs_berita['photo'],
            'admin_username' => $data_rs_berita['admin_username'],
        );
    }
}

// Sekarang Anda memiliki $data_rs_kerangka dan $beritaData untuk digunakan di bagian selanjutnya dari kodingan Anda.

// Fungsi untuk mendapatkan alamat IP pengunjung
function get_client_ip()
{
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

// Mendapatkan alamat IP pengunjung
$ip_address = get_client_ip();

// Mendapatkan tanggal hari ini
$date_visited = date('Y-m-d');

// Memeriksa apakah pengunjung dengan alamat IP yang sama sudah mengunjungi hari ini
$query_check = "SELECT * FROM visitor_count WHERE ip_address = '$ip_address' AND date_visited = '$date_visited'";
$result_check = mysqli_query($conn, $query_check);

if (mysqli_num_rows($result_check) == 0) {
    // Jika belum ada entri untuk pengunjung ini hari ini, tambahkan satu entri baru
    $query_insert = "INSERT INTO visitor_count (ip_address, date_visited) VALUES ('$ip_address', '$date_visited')";
    $result_insert = mysqli_query($conn, $query_insert);

    if (!$result_insert) {
        die("Query error: " . mysqli_error($conn));
    }
}
// Menutup koneksi ke database
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <link rel="icon" href="dist/img/icon.ico" type="image/x-icon">
    <title><?= $data_rs_kerangka['title']; ?></title>
    <link rel="stylesheet" href="dist/output.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="dist/js/style.css">
    <link rel="stylesheet" href="src/input.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-c3SvaybV5L8CtqMWsH+KxC5u2nqH9szk0hYDW7pP3lHmM5q8hQ4qMjme4w5BOIeU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-...." crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <!-- Tambahkan stylesheet FancyBox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />

    <!-- Tambahkan jQuery (pastikan Anda sudah memasukkan jQuery ke proyek Anda) -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Tambahkan script FancyBox -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

    <style>
        #loading-screen {
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.9);
            z-index: 999;
        }

        .loader {
            border: 8px solid #f3f3f3;
            border-top: 8px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        #visi {
            opacity: 0;
            /* Initial opacity */
        }

        #tentang {
            opacity: 0;
            /* Initial opacity */
        }


        .item {
            opacity: 0;
            transform: translateX(-100%);
            white-space: nowrap;
            /* Prevents line breaks */
            overflow: hidden;
            /* Hide overflowing text */
        }
    </style>
    <!-- ... tag-tag lainnya ... -->

    <!-- Skrip JavaScript -->
    <script>
        function showPopup() {
            document.getElementById('popup').classList.remove('hidden');
        }

        function closePopup() {
            document.getElementById('popup').classList.add('hidden');
        }
    </script>

    <!-- Gaya CSS -->
    <style>
        /* Hide the pop-up by default */
        #popup {
            transition: opacity 0.3s;
            opacity: 0;
        }

        /* Show the pop-up when it's not hidden */
        #popup:not(.hidden) {
            opacity: 1;
        }
    </style>
    <style>
        /* Tambahkan transisi garis bawah */
        .underline-on-hover {
            position: relative;
            display: inline-block;
        }

        .underline-on-hover::after {
            content: "";
            position: absolute;
            width: 100%;
            height: 6px;
            bottom: 0;
            left: 0;
            background-color: transparent;
            transition: background-color 0.3s ease-in-out;
        }

        .underline-on-hover:hover::after {
            background-color: green;
            /* Ganti warna sesuai keinginan Anda */
        }
    </style>
    <style>
        #mapContainer {
            width: 100%;
            height: 50%;
            border: 10px solid #f3f3f3;
            border-radius: 8px;
            overflow: hidden;
        }

        #map {
            width: 100%;
            height: 100%;
            border: none;
        }
    </style>
    <style>
        /* Add these styles to your stylesheet */
        @keyframes slideIn {
            from {
                transform: translateX(-100%);
            }

            to {
                transform: translateX(0);
            }
        }

        .slider-container {
            overflow: hidden;
            position: relative;
        }

        .slider-image {
            width: 100%;
            animation: slideIn 1s ease-in-out;
        }
    </style>
    <style>
        /* Your existing styles go here */

        /* Responsive Styles */
        @media (max-width: 768px) {
            .hidden.md\\:flex {
                display: flex !important;
            }

            .md\\:hidden {
                display: none !important;
            }

            .md\\:absolute {
                position: absolute !important;
            }

            .md\\:w-full {
                width: 100% !important;
            }
        }
    </style>
    <style>
        /* Add your existing styles here */

        @media screen and (max-width: 414px) {
            /* Styles for screens with a maximum width of 767px (typical mobile screens) */

            #mobileMenu {
                display: block;
            }

            .hidden.md\\:hidden {
                display: none;
            }

            /* You might need to adjust the styling for smaller screens */
            .bg-transparent.top-0.right-1.w-full.flex.items-center.z-10.mt-3 {
                position: relative;
                background-color: white;
                /* Change the background color as needed */
            }

            .container {
                padding: 5px;
                /* Add padding to the container for better visibility */
            }

            .md\\:hidden.absolute.z-10.hidden.font-normal.bg-white.divide-y.divide-gray-100.rounded-lg.shadow.w-full {
                position: relative;
                background-color: white;
                /* Change the background color as needed */
            }
        }
    </style>
    <style>
        /* Additional custom styles go here */

        /* Override specific styles for mobile */
        @media screen and (max-width: 414px) {
            #header1 {
                flex-direction: column-reverse;
            }

            #header2 {
                margin-right: 0;
                margin-top: 0;
            }

            .px-52 {
                padding-left: 2rem;
                padding-right: 2rem;
            }

            #mapContainer {
                width: 400px;
                height: 400px;
                /* Adjust the height as needed */
            }
        }
    </style>
</head>

<body>
    <div id="loading-screen">
        <div class="loader"></div>
    </div>
    <nav class=" text-black p-4">
        <div class="container mx-auto flex items-center justify-between">
            <div class="flex items-center">
                <button class="px-4 py-1 rounded-full bg-blue-900 hover:bg-green-700 text-white animate-pulse">Daftar</button>
            </div>
            <div class="flex items-center ml-4 space-x-4"> <!-- Added ml-4 to create space between the two sets of menu items -->
                <ul class="space-x-4 flex items-center"> <!-- Added flex and items-center to make menu items inline -->
                    <li><a href="#" class="hover:text-gray-300"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#" class="hover:text-gray-300"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#" class="hover:text-gray-300"><i class="fab fa-whatsapp"></i></i></a></li>
                </ul>

                <button class="py-1 rounded-full bg-red-600 hover:bg-green-700 text-white md:px-6 px-2 animate-bounce">Ambulans</button>
            </div>
        </div>
    </nav>

    <!-- Header Start -->
    <header class="bg-transparent top-0 right-1 w-full flex items-center z-10">
        <div class="container">
            <div class="flex items-center justify-between px-4 py-2 bg-transparent text-black">
                <div class="hidden md:flex items-center">
                    <img src="dist/img/icon.png" class="h-8" alt="">
                    <p class="font-semibold ml-2 text-sm text-black">Azzahra</p>
                </div>
                <div class="flex items-center justify-between px-4 py-2 bg-transparent text-black">
                    <div class="flex space-x-8 text-sm text-center">
                        <a href="index.php" class="hover:text-green-800">Tentang</a>
                        <div class="relative group">
                            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4  text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-green-800 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Layanan
                                <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownNavbar" class="absolute z-10 hidden font-normal bg-blue-900 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                                    <li>
                                        <a href="igd.php" class="block px-4 py-2 hover:bg-red-500 dark:hover:bg-gray-600 text-white dark:hover:text-white">IGD</a>
                                    </li>
                                    <li>
                                        <a href="poliklinik.php" class="block px-4 py-2 hover:bg-red-500 dark:hover:bg-gray-600 text-white dark:hover:text-white">Poli Klinik</a>
                                    </li>
                                    <li>
                                        <a href="rawatinap.php" class="block px-4 py-2 hover:bg-red-500 dark:hover:bg-gray-600 text-white dark:hover:text-white">Rawat Inap</a>
                                    </li>
                                    <li>
                                        <a href="instalasi_penunjang.php" class="block px-4 py-2 hover:bg-red-500 dark:hover:bg-gray-600 text-white dark:hover:text-white">Fasilitas</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <a href="dokter.php" class="hover:text-green-800">Dokter</a>
                        <a href="homeberita.php" class="hover:text-green-800 hidden md:flex">Berita</a>
                        <a href="hubungikami.php" class="hover:text-green-800 hidden md:flex">Hubungi Kami</a>
                        <a href="karir.php" class="hover:text-green-800 hidden md:flex">Karir</a>
                    </div>
                </div>

                <div id="mobileMenu" class="md:hidden absolute z-10 hidden font-normal bg-white divide-y divide-gray-100">
                    <div class="flex items-center justify-between py-2 bg-transparent text-black">
                        <div class="hidden md:flex items-center">
                            <img src="dist/img/icon.png" class="h-8" alt="">
                            <p class="font-semibold ml-2 text-xs text-black">Azzahra</p>
                        </div>
                        <div class="space-x-2 text-xs flex items-center">
                            <a href="index.php" class="hover:text-green-800">Tentang</a>
                            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between py-2 pl-2 pr-3 text-sm text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-green-800 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                                Layanan
                                <svg class="w-2 h-2 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownNavbar" class="absolute z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-40 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-2 text-xs text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                                    <li>
                                        <a href="igd.php" class="block px-3 py-1 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">IGD</a>
                                    </li>
                                    <li>
                                        <a href="poliklinik.php" class="block px-3 py-1 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Poli Klinik</a>
                                    </li>
                                    <li>
                                        <a href="rawatinap.php" class="block px-3 py-1 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Rawat Inap</a>
                                    </li>
                                    <li>
                                        <a href="instalasi_penunjang.php" class="block px-3 py-1 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Fasilitas</a>
                                    </li>
                                </ul>
                            </div>
                            <a href="dokter.php" class="hover:text-green-800">Dokter</a>
                            <a href="homeberita.php" class="hover:text-green-800">Berita</a>
                            <a href="hubungikami.php" class="hover:text-green-800">Hubungi</a>
                            <a href="karir.php" class="hover:text-green-800">Karir</a>
                        </div>
                    </div>
                </div>
            </div>
    </header>