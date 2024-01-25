<?php
include 'koneksi.php'; ?>
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
</head>

<body>
    <!-- <div id="loading-screen">
        <div class="loader"></div>
    </div> -->
    <!-- Header Start -->
    <header class="bg-transparent top-0 right-1 w-full flex items-center z-10">
        <div class="container">
            <div class="flex items-center justify-between relative">
                <div class="flex flex-wrap">
                    <div class="w-1/2">
                        <img src="dist/img/icon.png" class="items-start h-8" alt="">
                    </div>
                    <div class="w-1/2">
                        <p class="font-semibold pt-1 text-sm text-primary">Azzahra</p>
                    </div>
                </div>
                <div class="flex items-center px-4">
                    <div class="flex flex-wrap items-center justify-between mx-auto p-4 pt-10">
                        <button id="navbar-toggle" data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 text-sm text-gray-500 rounded-lg md:hidden " aria-controls="navbar-dropdown" aria-expanded="false">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                            </svg>
                        </button>
                        <div class="hidden w-full md:block md:max-w-lg" id="navbar-dropdown">
                            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white">
                                <li>
                                    <a href="index.php" class="block py-2 pl-3 pr-4 text-white bg-green-800 rounded md:bg-transparent md:text-green-800 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">Tentang</a>
                                </li>
                                <li>
                                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4  text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-green-800 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Layanan
                                        <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                        </svg></button>
                                    <!-- Dropdown menu -->
                                    <div id="dropdownNavbar" class="absolute z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                                            <li>
                                                <a href="igd.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Instalasi Gawat Darurat</a>
                                            </li>
                                            <li>
                                                <a href="poliklinik.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Poli Klinik</a>
                                            </li>
                                            <li>
                                                <a href="rawatinap.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Rawat Inap</a>
                                            </li>
                                            <li>
                                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Fasilitas Tambahan</a>
                                            </li>
                                            <li>
                                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Ruang Perawatan Khusus</a>
                                            </li>
                                            <li>
                                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Instalasi Penunjang</a>
                                            </li>
                                        </ul>
                                        <div class="py-1">
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Sign out</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="dokter.php" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-800 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Jadwal Dokter</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-800 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Hubungi Kami</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-800 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Karir</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <body>
        <?php
        $query_tampil = mysqli_query($conn, "SELECT dokter.nama, dokter.jk, dokter.spesialis, dokter.status, dokter.image, j_dokter.day, j_dokter.start_time, j_dokter.end_time
        FROM dokter
        JOIN j_dokter ON dokter.nama = j_dokter.nama;
        ") or die(mysqli_error($conn));
        $dokterData = array();
        while ($data_rs = mysqli_fetch_assoc($query_tampil)) {
            $namaDokter = $data_rs['nama'];
            if (!isset($dokterData[$namaDokter])) {
                $dokterData[$namaDokter] = array(
                    'nama' => $data_rs['nama'],
                    'jk' => $data_rs['jk'],
                    'spesialis' => $data_rs['spesialis'],
                    'status' => $data_rs['status'],
                    'image' => $data_rs['image'],
                    'jadwal' => array(),
                );
            }
            $dokterData[$namaDokter]['jadwal'][] = array(
                'day' => $data_rs['day'],
                'start_time' => $data_rs['start_time'],
                'end_time' => $data_rs['end_time'],
            );
        }
        ?>
        <section id="portfolio" class="mx-auto">
            <div class=" container">
                <div class="w-full px-10 flex flex-wrap justify-center">
                    <?php foreach ($dokterData as $dokter) : ?>
                        <div class="mb-12 p-1 md:w-1/7 pr-5">
                            <div class="rounded-md shadow-md overflow-hidden bg-putih pt-3 pb-3 pr-3 pl-3 w-48 h-96 mx-auto flex flex-col items-center">
                                <div class="rounded-full shadow-2xl overflow-hidden pt-3 pb-3 pr-6 pl-3 w-30 h-44" id="dokter">
                                    <img src="<?= $dokter['image']; ?>" alt="" class="w-full h-full object-cover">
                                </div>
                                <h3 class="font-semibold text-md text-black mt-5 mb-3 whitespace-normal overflow-hidden overflow-ellipsis block text-center" id="isi" style="overflow-wrap: break-word;">
                                    <?= $dokter['nama']; ?>
                                </h3>
                                <h5 class="text-primary text-center text-sm font-poli"><?= $dokter['spesialis']; ?></h5>
                                <h5 class="text-black text-center text-sm font-poli">Melayani BPJS <?= $dokter['status']; ?></h5>
                                <h5 class="text-black text-center text-sm font-poli">Jadwal:</h5>
                                <ul class="text-black text-center text-sm font-poli">
                                    <?php foreach ($dokter['jadwal'] as $jadwal) : ?>
                                        <li><?= $jadwal['day'] . ' <br>' . $jadwal['start_time'] . ' - ' . $jadwal['end_time']; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section id="pages2">
            <div class="container">
                <div class="w-full px-4 flex flex-wrap" id="tentang">
                    <div class="p-4 md:w-1/2 pt-10">
                        <br>
                        <h4 class="font-semibold text-lg text-primary mb-2">Rumah Sakit Azzahra Ujungbatu</h4>
                        <h2 class="font-bold text-blue-900 text-3xl mb-4 sm:text-4xl lg:text-5xl">
                            Jadwal Dokter
                        </h2>
                        <p class="font-light text-lg text-slate-600 font-extralight">
                            Tabel diatas merupakan tabel Jadwal Dokter Rumah Sakit Azzahra,
                            untuk pasien kami yang berada jauh dari rumah sakit azzahra
                            harap untuk menghubungi rumah sakit azzahra untuk memastikan ketersediaan dokter.
                            untuk contact center dapat menghubungi melalui WhatsApp dibawah ini
                        </p>
                        <br>
                        <a href="#" class="rounded-full bg-red-700 text-white font-semibold text-lg px-4 pt-2 pb-2 hover:bg-blue-900">WhatsApp</a>
                    </div>
                    <div class="p-4 md:w-1/2 flex items-end justify-end" id="visi">
                        <img src="dist/img/animasi/dokterjadwal.jpg" class="h-96" alt="">
                    </div>
                </div>
            </div>
        </section>
    </body>
    <?php include 'pages/footer.php'; ?>