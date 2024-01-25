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
<div id="loading-screen">
    <div class="loader"></div>
</div>
<nav class=" text-black p-4">
    <div class="container mx-auto flex items-center justify-between">
        <div class="flex items-center">
            <button class="px-3 py-1 rounded-full bg-blue-900 hover:bg-green-700 text-white animate-pulse">Pendaftaran Online</button>
        </div>

        <div class="flex items-center ml-4 space-x-4"> <!-- Added ml-4 to create space between the two sets of menu items -->
            <ul class="space-x-4 flex items-center"> <!-- Added flex and items-center to make menu items inline -->
                <li><a href="#" class="hover:text-gray-300"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#" class="hover:text-gray-300"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#" class="hover:text-gray-300"><i class="fab fa-whatsapp"></i></i></a></li>
            </ul>

            <button class="py-1 rounded-full bg-red-600 hover:bg-green-700 text-white px-6 animate-bounce">Ambulans</button>
        </div>
    </div>
</nav>
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
                                            <a href="instalasi_penunjang.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Fasilitas</a>
                                        </li>
                                </div>
                            </li>
                            <li>
                                <a href="dokter.php" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-800 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Dokter</a>
                            </li>
                            <li>
                                <a href="hubungikami.php" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-800 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Hubungi Kami</a>
                            </li>
                            <li>
                                <a href="karir.php" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-800 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Karir</a>
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
    if (!isset($_GET['id-loker'])) {
        echo '<script>window.location="karirselect.php";</script>';
    }
    $id_loker = $_GET['id-loker'];
    $query_tampil = mysqli_query($conn, "SELECT * FROM karir WHERE id = '$id_loker' ")
        or die(mysqli_error($conn));
    $data_rs = mysqli_fetch_assoc($query_tampil);
    ?>
    <section id="karir" class="mt-20 mb-36 bg-white rounded overflow-hidden shadow-lg">
        <div class="w-full px-4 flex flex-wrap container" id="satu">
            <div class="p-4 md:w-2/3 pt-5 mb-20">
                <div class="min-w-full max-w-md mx-auto bg-white rounded overflow-hidden shadow-lg">
                    <div class="px-6 py-4 mb-16">
                        <div class="font-bold text-2xl mb-5 hover:text-green-400 mt-5">
                            <?= $data_rs['nama_loker']; ?>
                        </div>
                        <p class="text-gray-600 text-xl ">
                            <i class="fas fa-graduation-cap text-green-500"></i> <?= $data_rs['pendidikan']; ?>
                            <br>
                            <?= $data_rs['deskripsi']; ?>
                            <br class="mb-5"><br>
                            <?= $data_rs['kualifikasi']; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="p-4 md:w-1/3 pt-4">
                <div class="bg-white rounded shadow-lg min-w-full max-w-md mx-auto">
                    <div class="px-6 py-4 pt-9 pb-4">
                        <h1 class="font-bold text-2xl mb-5 hover:text-green-400">INFORMATION</h1>
                        <p class="text-gray-600 text-xl">
                            <i class="fas fa-map-marker-alt text-green-500"></i>
                            <?= $data_rs['alamat']; ?>
                            <br>
                            Batas Waktu Pendaftaran :
                            <br>
                            <i class="fas fa-calendar text-green-500"></i> <?= $data_rs['deadline']; ?>
                            <br><br>
                            <i class="pt-4 text-xs">nb : Kami tidak memungut biaya sepeserpun untuk proses recruitment</i>
                        </p>
                    </div>
                </div>
                <br>
                <a href="cakar.php?= $karir['id']; ?>" class="mt-20 items-center text-lg font-semibold text-white bg-blue-900 py-3 px-44 rounded-lg hover:shadow-lg transition duration-300 ease-in-out animate-pulse">APPLY NOW!</a>
            </div>
    </section>

    </section>
</body>
<?php include 'pages/footer.php'; ?>