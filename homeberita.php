<?php
include 'koneksi.php'; ?>
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
</head>

<body style="background-image: url('dist/img/hd10.png'); background-size: contain; background-repeat: no-repeat;">
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
                <div class="flex items-center">
                    <img src="dist/img/icon.png" class="h-8" alt="">
                    <p class="font-semibold ml-2 text-sm text-primary">Azzahra</p>
                </div>

                <div class="flex items-center md:hidden">
                    <button id="navbar-toggle" data-collapse-toggle="navbar-dropdown" type="button" class="text-gray-500 hover:text-white focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>

                <div class="hidden md:flex space-x-8">
                    <a href="index.php" class="hover:text-green-800">Tentang</a>


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
                    <a href="dokter.php" class="hover:text-green-800">Dokter</a>
                    <a href="homeberita.php" class="hover:text-green-800">Berita</a>
                    <a href="hubungikami.php" class="hover:text-green-800">Hubungi Kami</a>
                    <a href="karir.php" class="hover:text-green-800">Karir</a>
                </div>
            </div>
        </div>
    </header>
    <div class="container mx-auto px-4 flex flex-wrap justify-center pt-10">
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
                'jumlah_klik' => $data_rs['jumlah_klik'],
            );
        }

        // Close the prepared statement
        mysqli_stmt_close($query_select);
        ?>

        <aside class="w-full md:w-1/4 p-4">
            <div class="mb-4 p-4 ">
                <h2 class="font-bold text-blue-900 text-3xl mb-4 sm:text-4xl lg:text-2xl">
                    <span>Berita <font class="text-yellow-500">Terpopuler</font></span>
                    <br>
                </h2>
                <?php foreach ($asideData as $data) : ?>
                    <div class="mb-4 p-4 flex items-start transition-all duration-300 hover:bg-gray-100">
                        <img src="<?= $data['photo']; ?>" alt="Profile Image" class="w-20 h-20 object-cover shadow-md mr-2 transform transition-transform duration-500 hover:scale-95">
                        <div>
                            <a href="#" onclick="tampilkanBerita('<?= $data['id_berita']; ?>')" class="mt-10 text-base font-semibold text-black hover:text-blue-900">
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
        $query_tampil = mysqli_query($conn, "SELECT * FROM azzahra.Berita ORDER BY id_berita DESC") or die(mysqli_error($conn));
        $beritaData = array();
        while ($data_rs = mysqli_fetch_assoc($query_tampil)) {
            $judulBerita = $data_rs['judul'];
            if (!isset($beritaData[$judulBerita])) {
                $beritaData[$judulBerita] = array(
                    'id_berita' => $data_rs['id_berita'],
                    'judul' => $data_rs['judul'],
                    'isi' => $data_rs['isi'],
                    'headline' => $data_rs['headline'],
                    'tanggal' => $data_rs['tanggal'],
                    'photo' => $data_rs['photo'],
                    'admin_username' => $data_rs['admin_username'],
                );
            }
        }

        // Tentukan jumlah berita yang akan ditampilkan per halaman
        $beritaPerHalaman = 6;

        // Hitung total halaman
        $totalHalaman = ceil(count($beritaData) / $beritaPerHalaman);

        // Dapatkan halaman yang sedang aktif
        $halamanAktif = isset($_GET['page']) ? $_GET['page'] : 1;

        // Tentukan index awal dan akhir berita yang akan ditampilkan
        $indexAwal = ($halamanAktif - 1) * $beritaPerHalaman;
        $indexAkhir = $indexAwal + $beritaPerHalaman;

        // Ambil berita yang sesuai dengan halaman aktif
        $beritaTampil = array_slice($beritaData, $indexAwal, $beritaPerHalaman);
        ?>
        <div class="w-full md:w-3/4 p-4">
            <div class="flex flex-wrap justify-center" id="berita">
                <div class="bg-white rounded shadow-lg min-w-full max-w-md mx-auto">
                    <div class="w-full h-full mb-20">
                        <?php foreach ($beritaTampil as $berita) : ?>
                            <div class="w-full mt-8">
                                <div class="image-container w-full">
                                    <img src="<?= $berita['photo']; ?>" alt="" class="w-full h-auto max-h-96 max-w-full object-cover" />
                                </div>
                                <br>
                                <i class="fas fa-calendar text-blue-900"></i>
                                <font class="text-base ml-1 text-gray-600"><?= date('Y-m-d H:i', strtotime($berita['tanggal'])); ?></font>
                                <i class="fas fa-user ml-2 text-blue-900"></i>
                                <font class="text-base text-gray-600"><?= $berita['admin_username']; ?></font>
                                <h3 class="font-semibold text-2xl mt-5 mb-3 text-black"><?= $berita['judul']; ?></h3>
                                <p class="font-light text-lg text-slate-600 font-extralight">
                                    <?= $berita['headline']; ?>
                                </p>
                                <br>
                                <!-- Read More Link -->
                                <a href="#" onclick="tampilkanBerita('<?= $berita['id_berita']; ?>')" class="mt-10 text-base font-semibold text-white bg-blue-900 py-3 px-8 rounded-lg hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out">Selengkapnya</a>
                            </div>
                        <?php endforeach ?>

                        <!-- Tombol Navigasi Halaman -->
                        <?php if ($totalHalaman > 1) : ?>
                            <div class="flex justify-center mt-4">
                                <?php for ($i = 1; $i <= $totalHalaman; $i++) : ?>
                                    <a href="?page=<?= $i; ?>" class="mx-2 px-4 py-2 rounded <?= ($i == $halamanAktif) ? 'bg-blue-500 text-white' : 'bg-gray-300'; ?>">
                                        <?= $i; ?>
                                    </a>
                                <?php endfor; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>



    </div>
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
</body>

<?php include 'pages/footer.php'; ?>