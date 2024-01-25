<?php
include 'koneksi.php'; // Make sure to include your database connection file

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumah Sakit Azzahra</title>
    <link rel="stylesheet" href="dist/output.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="dist/js/style.css">
    <link rel="stylesheet" href="src/input.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-...." crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-c3SvaybV5L8CtqMWsH+KxC5u2nqH9szk0hYDW7pP3lHmM5q8hQ4qMjme4w5BOIeU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-...." crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
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
</head>
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

<body>
    <?php
    $query_tampil = mysqli_query($conn, "SELECT * FROM karir") or die(mysqli_error($koneksi));
    $karirData = array();

    while ($data_rs = mysqli_fetch_assoc($query_tampil)) {
        $idKarir = $data_rs['id'];
        if (!isset($karirData[$idKarir])) {
            $karirData[$idKarir] = array(
                'id' => $data_rs['id'],
                'nama_loker' => $data_rs['nama_loker'],
                'pendidikan' => $data_rs['pendidikan'],
                'kualifikasi' => $data_rs['kualifikasi'],
                'deadline' => $data_rs['deadline'],
                'deskripsi' => $data_rs['deskripsi'],
                'alamat' => $data_rs['alamat'],
            );
        }
    }
    ?>
    <section id="karir">
        <?php foreach ($karirData as $karir) : ?>
            <div class="w-full px-4 flex flex-wrap">
                <div class="p-4 md:w-2/3 pt-5">
                    <div class="min-w-full max-w-md mx-auto bg-white rounded overflow-hidden">
                        <div class="px-6 py-4">
                            <div class="font-bold md:text-2xl text-lg md:mb-5 hover:text-blue-800 mt-5">
                                <?= $karir['nama_loker']; ?>
                            </div>
                            <p class="text-gray-600 text-xl mb-5">
                                <?= $karir['pendidikan']; ?> <i class="fas fa-graduation-cap text-blue-900"></i>
                                <br>
                            </p>
                            <span class="md:text-base text-sm mb-3"><?= $karir['deskripsi']; ?></span>
                            <p class="text-gray-600 md:text-base text-sm">
                                Batas Waktu Pendaftaran :
                                <br>
                                <?= $karir['deadline']; ?>
                            </p>
                            <br>
                            <a href="karirselect.php?id-loker=<?= $karir['id']; ?>" class="mt-10 text-base font-semibold text-white bg-blue-900 py-3 px-8 rounded-full hover hover:opacity-80 transition duration-300 ease-in-out">Selengkapnya</a>

                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
</body>
<?php include 'pages/footer.php'; ?>