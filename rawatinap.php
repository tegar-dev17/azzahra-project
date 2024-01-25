<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="dist/img/icon.ico" type="image/x-icon">
    <title><?= $data_rs['title']; ?></title>
    <link rel="stylesheet" href="dist/output.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="dist/js/style.css">
    <link rel="stylesheet" href="src/input.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-c3SvaybV5L8CtqMWsH+KxC5u2nqH9szk0hYDW7pP3lHmM5q8hQ4qMjme4w5BOIeU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-...." crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
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
</head>

<body>
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

    <!-- Header Start -->
    <header class="bg-transparent top-0 right-1 w-full flex items-center z-10 mt-10">
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
                        </div>
                        <a href="dokter.php" class="hover:text-green-800">Dokter</a>
                        <a href="homeberita.php" class="hover:text-green-800">Berita</a>
                        <a href="hubungikami.php" class="hover:text-green-800">Hubungi Kami</a>
                        <a href="karir.php" class="hover:text-green-800">Karir</a>
                    </div>
                </div>

                <div id="mobileMenu" class="md:hidden absolute z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-full">
                    <div class="flex items-center justify-between px-4 py-2 bg-transparent text-black">
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
                                        <a href="#" class="block px-3 py-1 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Fasilitas</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-3 py-1 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Ruang Khusus</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-3 py-1 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Penunjang</a>
                                    </li>
                                </ul>
                                <div class="py-1">
                                    <a href="#" class="block px-3 py-1 text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Sign out</a>
                                </div>
                            </div>
                            <a href="dokter.php" class="hover:text-green-800">Jadwal Dokter</a>
                            <a href="homeberita.php" class="hover:text-green-800">Berita</a>
                            <a href="#" class="hover:text-green-800">Hubungi Kami</a>
                            <a href="karir.php" class="hover:text-green-800">Karir</a>
                        </div>
                    </div>
                </div>


            </div>
    </header>
    <section id="portfolio" class="bg-white">
        <div class="container">
            <div class="w-full px-4 flex flex-wrap" id="header1">
                <div class="p-4 md:w-1/2 md:pt-10">
                    <br>
                    <h4 class="font-semibold md:text-lg text-xs text-blue-900 mb-2">Rumah Sakit Azzahra Ujungbatu</h4>
                    <h2 class="font-bold text-blue-900 md:text-3xl mb-4 sm:text-4xl lg:text-5xl" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                        Rawat <font class="text-red-500">Inap</font>
                    </h2>
                    <p class="font-light md:text-lg text-xs text-slate-600 font-extralight text-justify">
                        Seluruh fasilitas kamar inap selalu dinilai kelayakannya mengikuti patient safety indicator.
                        Kami memiliki berbagai pilihan kamar untuk menyesuaikan kebutuhan Anda.
                        Apapun pilihannya, kami akan senantiasa memberikan pelayanan terbaik.
                    </p>
                    <br>
                </div>
                <div class="p-4 md:w-1/2 flex items-end justify-end" id="header2">
                    <img src="dist/img/animasi/9931313.jpg" class="md:h-96 md:flex" alt="">
                </div>
            </div>
            <?php
            $query_tampil = mysqli_query($conn, "SELECT * FROM ranap") or die(mysqli_error($koneksi));
            $ranapData = array();

            while ($data_rs = mysqli_fetch_assoc($query_tampil)) {
                $idRanap = $data_rs['id_ranap'];
                if (!isset($ranapData[$idRanap])) {
                    $ranapData[$idRanap] = array(
                        'id_ranap' => $data_rs['id_ranap'],
                        'type_kamar' => $data_rs['type_kamar'],
                        'quantity' => $data_rs['quantity'],
                        'tersedia' => $data_rs['tersedia'],
                        'last_update' => $data_rs['last_update'],
                        'deskripsi' => $data_rs['deskripsi'],
                        'price' => $data_rs['price'],
                        'foto' => $data_rs['foto'],
                    );
                }
            }

            // Set the default selectedType to "KELAS_1"
            $selectedType = isset($_POST['type_kamar']) ? $_POST['type_kamar'] : 'VVIP';

            // Filter data based on the selected type
            $filteredRanapData = array_filter($ranapData, function ($ranap) use ($selectedType) {
                return $ranap['type_kamar'] === $selectedType;
            });
            ?>

            <div class="w-full px-4 flex flex-wrap border-b" id="header1">
                <div class="md:p-4 md:w-1/2 w-full md:pt-10 mt-5">
                    <form method="POST" id="searchForm">
                        <label for="type_kamar" class="font-bold text-blue-900 text-base sm:text-4xl lg:text-3xl" style="text-shadow: 2px 2px 4px rgba(59, 130, 246, 0.5);">Jenis <font class="text-primary">Kamar</font></label>
                        <br>
                        <select class="md:mt-2 md:px-4 md:py-2 border-2 w-1/2 mt-3 rounded-md border-blue-900 w-full md:w-2/3 lg:w-1/2 form-control" id="type_kamar" name="type_kamar" onchange="this.form.submit()">
                            <?php
                            $jenisKamarOptions = array("VVIP", "VIP", "KELAS 1", "KELAS 2", "KELAS 3");
                            foreach ($jenisKamarOptions as $option) {
                                $selected = ($option == $selectedType) ? 'selected' : '';
                                echo "<option value='$option' $selected>$option</option>";
                            }
                            ?>
                        </select>
                        <!-- Remove the submit button -->
                    </form>
                </div>

                <?php foreach ($filteredRanapData as $ranap) : ?>
                    <div class="p-4 md:w-1/2 w-full md:pt-10 mb-20">
                        <div class="md:border-t md:border-gray-200">
                            <label for="type_kamar" class="font-bold text-blue-900 text-lg md:text-3xl mb-10 sm:text-4xl lg:text-3xl ml-5" style="text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);">
                                Ketersediaan<font class="text-primary"> Kamar</font>
                            </label>
                            <dl id="spesifikasi" class="mt-5">
                                <div class="bg-gray-50 px-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 mb-1">
                                    <dt class="md:text-lg font-medium text-gray-500 flex items-start">
                                        <i class="fas fa-bed text-blue-500 md:text-3xl text-sm mr-4"></i>
                                        <span class="text-bold"><?= $ranap['type_kamar'] ?></span>
                                    </dt>
                                    <dd class="md:mt-1 md:text-lg text-gray-900 mt-0 col-span-2 bg-blue-200 p-2 rounded-md">
                                        <?= $ranap['quantity']; ?>
                                    </dd>
                                </div>
                                <div class="bg-white px-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 mb-1">
                                    <dt class="md:text-lg text-sm font-medium text-gray-500 flex items-start">
                                        <i class="fas fa-info-circle text-blue-500 md:text-3xl text-sm mr-4"></i>
                                        <span class="text-bold ml-1">Tersedia</span>
                                    </dt>
                                    <dd class="md:mt-1 md:md:text-lg text-sm text-gray-900 mt-0 col-span-2 bg-blue-200 p-2 rounded-md">
                                        <?= $ranap['tersedia']; ?>
                                    </dd>
                                </div>
                                <div class="bg-gray-50 px-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 mb-1">
                                    <dt class="md:text-lg text-sm font-medium text-gray-500 flex items-start">
                                        <i class="far fa-calendar-alt text-blue-500 md:text-3xl text-sm mr-4"></i>
                                        <span class="text-bold ml-2">Update</span>
                                    </dt>
                                    <dd class="md:mt-1 md:md:text-lg text-sm text-gray-900 mt-0 col-span-2 bg-blue-200 p-2 rounded-md">
                                        <?= $ranap['last_update']; ?>
                                    </dd>
                                </div>
                                <div class="bg-gray-50 px-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="md:text-lg text-sm font-medium text-gray-500 flex items-start">
                                        <i class="fas fa-dollar-sign text-blue-500 md:text-3xl text-sm mr-2"></i>
                                        <span class="text-bold ml-6">Harga</span>
                                    </dt>
                                    <dd class="md:mt-1 md:md:text-lg text-sm text-gray-900 mt-0 col-span-2 bg-blue-200 p-2 rounded-md">
                                        Rp. <?= $ranap['price']; ?> / Malam
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="w-full px-4 flex flex-wrap justify-center" id="berita">
                <div class="bg-white rounded shadow-lg min-w-full max-w-md mx-auto">
                    <h3 class="font-semibold text-5xl mt-10 mb-3 text-blue-900 px-4 text-center" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Fasilitas</h3>
                    <div class="mb-12 p-10 flex flex-col items-center">
                        <div class="flex flex-col md:flex-row items-center justify-center">
                            <div class="md:w-1/2 mb-4 md:mb-0">
                                <div class="image-container flex items-center justify-center shadow-md overflow-hidden">
                                    <img src="<?= $ranap['foto']; ?>" alt="" class="w-full h-auto object-cover" />
                                </div>
                            </div>
                            <div class="md:w-1/2 ml-20">
                                <ul class="font-light text-lg text-slate-600">
                                    <?= $ranap['deskripsi']; ?>
                                </ul>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </section>
</body>
<?php include 'pages/footer.php'; ?>