<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data_rs['title']; ?></title>
    <link rel="stylesheet" href="dist/output.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="dist/js/style.css">
    <link rel="stylesheet" href="src/input.css">
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
    <script>
        // Fungsi untuk menangkap total klik
        function tambahkanKlik(idBerita) {
            // Kirim permintaan AJAX ke server untuk menambahkan jumlah klik
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "tambahklik.php?id=" + idBerita, true);

            xhr.send();
        }

        // Fungsi untuk menginisialisasi tindakan setelah halaman dimuat
        document.addEventListener("DOMContentLoaded", function() {
            // Ambil elemen berita
            var beritaContainer = document.getElementById("berita");

            // Tambahkan event listener untuk mengirim total klik saat berita diklik
            beritaContainer.addEventListener("click", function() {
                // Ganti 'ID_BERITA' dengan ID berita yang sesuai
                tambahkanKlik('id_berita');
            });
        });
    </script>
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
    <?php
    // Assuming you have a valid database connection in $conn

    // Use prepared statement to prevent SQL injection
    $query_select = mysqli_prepare($conn, "SELECT * FROM berita ORDER BY id_berita DESC");

    // Execute the query
    mysqli_stmt_execute($query_select);

    // Get the result set
    $result = mysqli_stmt_get_result($query_select);

    // Fetch data for the aside section
    $asideData = array();
    while ($data_rs = mysqli_fetch_assoc($result)) {
        $asideData[] = array(
            'id_berita' => $data_rs['id_berita'],
            'judul' => $data_rs['judul'],
            'tanggal' => $data_rs['tanggal'],
            'photo' => $data_rs['photo'],
            'jumlah_klik' => $data_rs['jumlah_klik'],
            'headline' => $data_rs['headline'],
        );
    }

    // Close the prepared statement
    mysqli_stmt_close($query_select);
    ?>
    <div class="container mx-auto px-4 flex flex-wrap justify-center pt-10">
        <aside class="w-full md:w-1/4 p-4">
            <div class="mb-4 p-4">
                <h2 class="font-bold text-blue-900 md:text-3xl text-xl md:text-left text-center mb-4 sm:text-4xl lg:text-2xl">
                    <span>Berita <font class="text-yellow-500">Terbaru</font></span>
                    <br>
                </h2>
                <?php foreach ($asideData as $data) : ?>
                    <div class="md:mb-4 p-4 flex items-start transition-all duration-300 hover:bg-gray-100">
                        <img src="<?= $data['photo']; ?>" alt="Profile Image" class="w-32 md:w-20 h-20 object-cover shadow-md mr-2">
                        <div>
                            <a href="#" onclick="tampilkanBerita('<?= $data['id_berita']; ?>')" class="text-sm font-semibold text-black hover:text-blue-900">
                                <?= $data['judul'] ?>
                            </a>
                            <br>
                            <font class="text-sm">
                                <i class="fas fa-calendar text-blue-900"></i>
                                <?= date('Y-m-d', strtotime($data['tanggal'])); ?>
                                <br>
                                <i class="fas fa-clock text-blue-900"></i>
                                <?= date('H:i', strtotime($data['tanggal'])); ?>
                            </font>
                            <p class="flex items-center" id="jumlah-klik">
                                <i class="far fa-eye text-sm mr-1 text-blue-900"></i>
                                <?= $data['jumlah_klik']; ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </aside>
        <?php
        if (!isset($_GET['id-berita'])) {
            echo '<script>window.location="beritaselect.php";</script>';
        }
        $id_berita = $_GET['id-berita'];
        $query_tampil = mysqli_query($conn, "SELECT * FROM berita WHERE id_berita = '$id_berita' ")
            or die(mysqli_error($conn));
        $berita = mysqli_fetch_assoc($query_tampil);
        ?>
        <div class="w-full md:w-3/4 p-4">
            <div class="w-full px-4 flex flex-wrap justify-center" id="berita">
                <div class="bg-white min-w-full md:w-1/2">
                    <div class="md:mb-12 p-10 border-b">
                        <div class="image-container">
                            <img src="<?= $berita['photo']; ?>" alt="" class="w-full h-full object-cover" />
                        </div>
                        <br>
                        <div class="flex items-center justify-between md:mb-5">
                            <div>
                                <i class="fas fa-calendar text-blue-900 md:text-base text-xs"></i>
                                <font class="ml-1 text-gray-600 md:text-base text-xs"><?= date('Y-m-d H:i', strtotime($berita['tanggal'])); ?></font>
                                <i class="fas fa-user ml-2 text-blue-900 md:text-base text-xs"></i>
                                <font class="md:text-base text-xs text-gray-600"><?= $berita['admin_username']; ?></font>
                            </div>
                            <p class="flex items-center md:text-base text-xs" id="jumlah-klik">
                                <i class="far fa-eye mr-2 text-blue-900 md:text-base text-xs"></i>
                                <?= $berita['jumlah_klik']; ?>
                            </p>
                        </div>
                        <h3 class="font-semibold md:text-3xl text-lg text-blue-900 text-start "><?= $berita['judul']; ?></h3>
                        <br>
                        <p class="font-light md:text-base text-sm text-slate-600">
                            <?= $berita['isi']; ?>
                        </p>
                    </div>
                    <?php
                    // Assuming you have a valid database connection in $conn

                    // Use prepared statement to prevent SQL injection
                    $query_select = mysqli_prepare($conn, "SELECT * FROM berita ORDER BY jumlah_klik DESC");

                    // Execute the query
                    mysqli_stmt_execute($query_select);

                    // Get the result set
                    $result = mysqli_stmt_get_result($query_select);

                    // Fetch data for the aside section
                    $asideData = array();
                    while ($data_rs = mysqli_fetch_assoc($result)) {
                        $asideData[] = array(
                            'id_berita' => $data_rs['id_berita'],
                            'judul' => $data_rs['judul'],
                            'tanggal' => $data_rs['tanggal'],
                            'photo' => $data_rs['photo'],
                            'headline' => $data_rs['headline'],
                            'jumlah_klik' => $data_rs['jumlah_klik'],
                        );
                    }

                    // Close the prepared statement
                    mysqli_stmt_close($query_select);
                    ?>

                    <div class="md:w-4/5 flex flex-wrap" id="header1">
                        <div class="p-4 md:w-1/2">
                            <br>
                            <h2 class="font-bold text-blue-900 md:text-3xl text-xl md:text-left text-center mb-4 sm:text-4xl lg:text-2xl">
                                <span>Berita <font class="text-yellow-500">Terpopuler</font></span>
                                <br>
                            </h2>
                            <br>
                        </div>
                    </div>
                    <div class="w-full flex flex-wrap justify-center mb-10 overflow-x-auto">
                        <div class="flex space-x-6">
                            <?php foreach ($asideData as $data) : ?>
                                <div class="md:w-52 max-w-xs md:h-96 w-40 h-80 rounded-3xl overflow-hidden shadow-2xl bg-white transform transition-transform duration-300 hover:scale-105" style="box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);" onclick="tampilkanBerita('<?= $berita['id_berita']; ?>')">
                                    <div class="flex flex-col items-center justify-center">
                                        <img class="w-64 h-36 object-cover transform transition-transform duration-300 hover:scale-95" src="<?= $data['photo']; ?>" alt="<?= $data['judul']; ?>">
                                    </div>
                                    <div class="p-4">
                                        <p class="text-gray-700 font-poli text-sm mb-2"><?= date('Y-m-d H:i', strtotime($data['tanggal'])); ?></p>
                                        <h3 class="font-semibold text-base mb-2 w-54 text-blue-900"><?= $data['judul']; ?></h3>
                                        <p class="text-gray-700 w-54 h-16 overflow-hidden text-overflow-ellipsis font-light text-sm"><?= $data['headline']; ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    // Fungsi untuk menangkap total klik dan menampilkan berita
    function tampilkanBerita(idBerita) {
        // Kirim permintaan AJAX ke server untuk menambahkan jumlah klik
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "tambahklik.php?id-berita=" + idBerita, true);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // Tangani respons jika sukses
                    console.log(xhr.responseText);
                    // Setelah menambahkan klik, redirect ke beritaselect.php
                    window.location.href = "beritaselect.php?id-berita=" + idBerita;
                } else {
                    // Tangani kesalahan
                    console.error("Terjadi kesalahan: " + xhr.statusText);
                }
            }
        };

        xhr.send();
    }
</script>
<?php include 'pages/footer.php'; ?>