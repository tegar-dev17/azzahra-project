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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-c3SvaybV5L8CtqMWsH+KxC5u2nqH9szk0hYDW7pP3lHmM5q8hQ4qMjme4w5BOIeU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-...." crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        /* Estilos para el señalador de posición (border-left) */
        .sidebar li:hover a::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 4px;
            background: linear-gradient(to bottom, #00FFFF, #008080);
            /* Gradiente cyan */
        }

        /* Estilos para cambiar el color del ícono y el texto a blanco al pasar el cursor */
        .sidebar li:hover a i,
        .sidebar li:hover a span {
            color: white;
        }
    </style>
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
                'end_time' => $data_rs['end_time']
            );
        }
        ?>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function() {
                // Fungsi untuk menampilkan data dokter saat diklik
                function showDoctorData(doctor) {
                    // Tampilkan data dokter pada bagian content (section)
                    $("#doctorName").text(doctor.nama);
                    $("#doctorImage").attr("src", doctor.image);
                    $("#doctorSpecialization").text(doctor.spesialis);
                    $("#doctorStatus").text(doctor.status);

                    // Loop untuk setiap hari dalam seminggu
                    var scheduleHtml = "<table class='md:min-w-full w-full border-collapse border border-gray-300 rounded'>";
                    scheduleHtml += "<thead class='bg-blue-900 text-white'><tr><th class='w-96'>Hari</th><th>Jam Mulai</th><th>Jam Selesai</th></tr></thead><tbody>";

                    for (var i = 0; i < doctor.jadwal.length; i++) {
                        var schedule = doctor.jadwal[i];
                        scheduleHtml += "<tr>";
                        scheduleHtml += "<td class='text-center'>" + schedule.day + "</td>";
                        scheduleHtml += "<td class='text-center' style='width: 200px;'>" + getFormattedTime(schedule.start_time) + "</td>";

                        // Tambahkan logika untuk mengecek jika end_time adalah "00:00:00"
                        if (schedule.end_time === "00:00:00") {
                            scheduleHtml += "<td class='text-center'>Sampai Selesai</td>";
                        } else {
                            scheduleHtml += "<td class='text-center'>" + getFormattedTime(schedule.end_time) + "</td>";
                        }

                        scheduleHtml += "</tr>";
                    }

                    scheduleHtml += "</tbody></table>";

                    // Ganti HTML pada elemen dengan ID "doctorScheduleContainer"
                    $("#doctorScheduleContainer").html(scheduleHtml);

                    // Tampilkan section dengan animasi
                    $("#doctorDetails").slideDown();
                }
                // Fungsi untuk memformat waktu ke dalam format jam:menit
                function getFormattedTime(time) {
                    var hours = time.substring(0, 2);
                    var minutes = time.substring(3, 5);
                    return hours + ":" + minutes;
                }
                // Simulasikan waktu loading dengan setTimeout (ganti dengan waktu yang sesuai)
                setTimeout(function() {
                    // Sembunyikan gambar loading
                    $("#loadingImage").hide();
                    // Tampilkan section doctorDetails setelah gambar loading disembunyikan
                    $("#doctorDetails").show();
                }, 2000);

                // Tampilkan semua data dokter saat halaman dimuat
                var allDoctors = <?php echo json_encode($dokterData); ?>;
                showDoctorData(allDoctors[Object.keys(allDoctors)[0]]);

                // Tambahkan event click pada setiap link dokter di aside
                $(".doctor-link").click(function(event) {
                    event.preventDefault();
                    var doctorName = $(this).text();
                    var doctorData = <?php echo json_encode($dokterData); ?>;

                    // Cari data dokter berdasarkan nama
                    var selectedDoctor = doctorData[doctorName];

                    // Tampilkan data dokter
                    showDoctorData(selectedDoctor);
                });

                // Event close pada tombol close section
                $("#closeDetails").click(function() {
                    // Sembunyikan section dengan animasi
                    $("#doctorDetails").slideUp();
                });
            });
        </script>
        <div class="flex md:pt-20">
            <img src="loading.gif" alt="Loading..." id="loadingImage">
            <!-- Section Content -->

            <!-- Aside with Navbar -->
            <!-- Aside with Navbar -->
            <nav class="w-full p-6 sm:w-60 dark:bg-gray-900 dark:text-gray-100 md:ml-10">
                <div class="space-y-4 text-sm flex flex-col items-start">
                    <h1 class="mb-4 md:text-3xl text-xs font-bold text-blue-900 border-b-4" style="text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.5);">
                        Dokter <font class="text-red-500">Spesialis</font>
                    </h1>
                    <?php
                    $spesialisList = ['Paru-Paru', 'Kandungan', 'Anak', 'Bedah', 'Gigi', 'Kulit Kelamin', 'Penyakit Dalam', 'THT'];

                    foreach ($spesialisList as $spesialis) {
                        $spesialisDokters = array_filter($dokterData, function ($dokter) use ($spesialis) {
                            return $dokter['spesialis'] === $spesialis;
                        });

                        if (!empty($spesialisDokters)) {
                            echo '<div class="bg-white">';
                            echo '<div class="flex justify-between items-start mb-2">';
                            echo '<h2 class="md:text-base text-xs font-semibold text-gray-800 cursor-pointer" data-spesialis="' . $spesialis . '">' . $spesialis . '</h2>';
                            echo '</div>';
                            echo '<div class="flex flex-col space-y-2 mt-2">';
                            echo '<nav class="list-none p-0 hidden" id="spesialis-' . $spesialis . '">';

                            foreach ($spesialisDokters as $dokter) {
                                echo '<li class="mb-1 border-b pb-1">';
                                echo '<a href="#" class="md:text-base text-xs text-blue-900 hover:underline doctor-link">' . $dokter['nama'] . '</a>';
                                echo '</li>';
                            }

                            echo '</nav>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const spesialisHeaders = document.querySelectorAll('[data-spesialis]');

                        spesialisHeaders.forEach((header) => {
                            header.addEventListener("click", function() {
                                const spesialis = this.getAttribute("data-spesialis");
                                const spesialisList = document.getElementById('spesialis-' + spesialis);

                                if (spesialisList) {
                                    spesialisList.classList.toggle('hidden');
                                }
                            });
                        });
                    });
                </script>
            </nav>
            <section id="doctorDetails" class="mx-auto bg-white lg:w-3/4 lg:h-64">
                <button id="closeDetails" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                <div class="container bg-white">
                    <div class="flex p-8">
                        <!-- Bagian Kiri -->
                        <div class="w-2/3 pr-8">
                            <!-- Informasi Profil -->
                            <div class="mb-8">
                                <h2 class="md:text-5xl text-base font-bold mb-4 text-blue-900">Informasi <font class="text-red-500">Profil</font>
                                </h2>
                                <div class="flex items-center">
                                    <div>
                                        <p class="md:text-2xl text-xs font-semibold text-red-500" id="doctorName"></p>
                                        <p class="md:text-base text-xs text-gray-600">Dokter Spesialis : <font id="doctorSpecialization"></font>
                                        </p>
                                        <P class="md:text-base text-xs">Melayani BPJS : <font id="doctorStatus"></font>
                                        </P>
                                    </div>
                                </div>
                            </div>

                            <!-- Tabel -->
                            <div>
                                <h2 class="md:text-2xl text-xs font-bold mb-4 text-blue-900">JADWAL DOKTER</h2>
                                <div id="doctorScheduleContainer">
                                    <!-- Doctor schedule will be displayed here using JavaScript -->
                                </div>
                            </div>
                        </div>

                        <!-- Bagian Kanan (Foto) -->
                        <div class="md:w-1/3 w-full">
                            <img src="" id="doctorImage" alt="Foto" class="md:w-full h-auto rounded-lg animate-pulse">
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <section id="pages2">
            <div class="container">
                <div class="w-full px-4 flex flex-wrap" id="tentang">
                    <div class="p-4 md:w-1/2 pt-10">
                        <br>
                        <h4 class="font-semibold text-lg text-red-500 mb-2">Rumah Sakit Azzahra Ujungbatu</h4>
                        <h2 class="font-bold text-blue-900 text-3xl mb-4 sm:text-4xl lg:text-5xl">
                            Jadwal Dokter
                        </h2>
                        <p class="text-lg text-slate-600 font-extralight">
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
        <script>
            $(document).ready(function() {
                // Fungsi untuk menampilkan data dokter saat diklik
                function showDoctorData(doctor) {
                    // Tampilkan data dokter pada bagian content (section)
                    $("#doctorName").text(doctor.nama);
                    $("#doctorImage").attr("src", doctor.image);
                    $("#doctorSpecialization").text(doctor.spesialis);

                    // Tampilkan jadwal dokter
                    var scheduleHtml = "";
                    $.each(doctor.jadwal, function(index, schedule) {
                        scheduleHtml += schedule.day + ' ' + schedule.start_time + ' - ' + schedule.end_time + '<br>';
                    });
                    $("#doctorSchedule").html(scheduleHtml);

                    // Tampilkan section dengan animasi
                    $("#doctorDetails").slideDown();
                }

                // Sembunyikan section saat halaman dimuat
                $("#doctorDetails").hide();

                // Tambahkan event click pada setiap link dokter di aside
                $(".doctor-link").click(function(event) {
                    event.preventDefault();
                    var doctorName = $(this).text();
                    var doctorData = <?= json_encode($dokterData); ?>;

                    // Cari data dokter berdasarkan nama
                    var selectedDoctor = doctorData[doctorName];

                    // Tampilkan data dokter
                    showDoctorData(selectedDoctor);
                });

                // Event close pada tombol close section
                $("#closeDetails").click(function() {
                    // Sembunyikan section dengan animasi
                    $("#doctorDetails").slideUp();
                });
            });
        </script>
    </body>
    <?php include 'pages/footer.php'; ?>