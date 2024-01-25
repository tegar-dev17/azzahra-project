        <?php include 'pages/header.php';
        ?>

        <body style="background-image: url('dist/img/hd8.png'); background-size: contain; background-repeat: no-repeat;">
            <!-- Header End -->
            <!-- Hero section start-->
            <style>
                @keyframes ring {
                    0% {
                        transform: scale(1);
                        background-color: #ff0000;
                        /* Warna latar merah */
                        box-shadow: 0 0 10px 0px #ff0000;
                        /* Bayangan merah */
                    }

                    50% {
                        transform: scale(1.1);
                        background-color: #ff0000;
                        /* Warna latar tetap merah */
                        box-shadow: 0 0 20px 5px #ff0000;
                        /* Bayangan merah bertambah intensitas */
                    }

                    100% {
                        transform: scale(1);
                        background-color: #ffcc00;
                        /* Warna latar kuning */
                        box-shadow: 0 0 10px 0px #ffcc00;
                        /* Bayangan kuning */
                    }
                }
            </style>
            <section id="home" class="md:pt-20">
                <div class="container">
                    <div class="flex flex-wrap">
                        <div class="w-full self-center px-4 lg:w-1/2" id="header1">
                            <span class="block font-bold text-blue-900 text-4xl mt-1 lg:text-8xl" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);"><?= $data_rs_kerangka['judul']; ?><p class="text-red-500"><?= $data_rs_kerangka['judul1']; ?></p></span></h1>
                            <br>
                            <a href="#about" class="md:text-base text-sm px-3 font-semibold text-white bg-red-500 py-3 md:px-8 rounded-full hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out animate-bounce">Pendaftaran Online</a>
                        </div>
                        <div class="w-full self-end px-4 lg:w-1/2">
                            <div class=" relative mt-10 lg:mt-9 lg:right-0">
                                <img src="dist/img/foto1.png" alt="" class="w-full h-full md:max-w-full md:mx-auto overflow-hidden" width="900" height="900">
                                <span class="absolute bottom-0 -z-10 left-1/2 -translate-x-1/2 md:scale-125 hidden md:flex" id="animated-example">
                                    <svg width="480" height="600" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                        <path fill="#FF0066" d="M40.1,-69C52.1,-62.4,62.1,-52.1,69.9,-39.9C77.6,-27.8,83,-13.9,83.9,0.5C84.8,14.9,81.2,29.9,73.3,41.7C65.4,53.5,53.2,62.2,40.2,70.4C27.3,78.6,13.6,86.2,-0.9,87.7C-15.4,89.2,-30.7,84.5,-45.1,77.1C-59.4,69.8,-72.8,59.8,-81.6,46.5C-90.4,33.2,-94.6,16.6,-93.4,0.7C-92.2,-15.3,-85.8,-30.5,-75.7,-41.6C-65.6,-52.6,-51.9,-59.4,-38.7,-65.3C-25.5,-71.2,-12.7,-76.1,0.6,-77.2C14,-78.3,28,-75.6,40.1,-69Z" transform="translate(100 100)" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- hero section end -->
            <!-- About Section Start -->
            <section id="about" class="md:pt-36 pt-20 pb-20">
                <div class="container">
                    <div class="flex flex-wrap">
                        <div class="w-full px-4 mb-10 lg:w-1/2" id="tentang">
                            <h4 class="font-bold text-blue-900 uppercase text-lg mb-3 hidden md:flex" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Tentang</h4>
                            <h2 class="font-bold text-blue-900 text-3xl mb-5 max-w-md lg:text-4xl"><?= $data_rs_kerangka['judul']; ?><p class="text-red-500"><?= $data_rs_kerangka['judul1']; ?></p>
                            </h2>
                            <p class="text-lg text-slate-600 font-extralight text-justify"><?= $data_rs_kerangka['tentang']; ?></p>
                        </div>
                        <div class="w-full px-4 lg:w-1/2 pt-12" id="visi">
                            <h3 class="font-bold text-blue-900 text-2xl mb-4 lg:text-3xl lg:pt-10">Visi</h3>
                            <ul class="c">
                                <li class="text-lg text-slate-600 font-extralight"><?= $data_rs_kerangka['visi']; ?></li>
                            </ul>
                            <h3 class="font-bold text-red-500 text-2xl mb-4 lg:text-3xl lg:pt-10">Misi</h3>
                            <ul class="c text-lg text-slate-600 font-extralight">
                                <li>1. Memberikan pelayanan kesehatan bagi masyarakat secara profesional dan tulus</li>
                                <li>2. senantiasa mengedepankan kemampuan teknologi medik yang mutakhir</li>
                                <li>3. mengupayakan pengembangan yang berkesinambungan di bidang kesehatan</li>
                                <li>4. melaksanakan pembinaan dan pengembangan sumber daya manusia untuk meningkatkan pelayanan kesehatan bagi masyarakat</li>
                            </ul>
                            <br>
                        </div>
                    </div>
                </div>
            </section>
            <!-- portofolio section start -->
            <!-- Jadwal section -->
            <section id="jadwal">
                <div class="container">
                    <div class="w-full px-4 flex flex-wrap" id="header1">
                        <div class="p-4 md:w-1/2 pt-14">
                            <br>
                            <h2 class="font-bold text-blue-900 text-3xl mb-4 sm:text-4xl lg:text-5xl" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                                Jadwal <font class="text-red-500">Dokter</font>
                            </h2>
                            <br>
                            <p class="text-lg text-slate-600 font-extralight mb-8 text-justify">
                                Tabel diatas merupakan tabel Jadwal Dokter Rumah Sakit Azzahra,
                                untuk pasien kami yang berada jauh dari rumah sakit azzahra
                                harap untuk menghubungi rumah sakit azzahra untuk memastikan ketersediaan dokter.
                                untuk contact center dapat menghubungi melalui WhatsApp dibawah ini
                            </p>
                            <a href="dokter.php" class="rounded-full bg-red-500 text-white font-semibold text-lg px-4 pt-4 pb-4 hover:bg-blue-900">Jadwal</a>
                        </div>

                        <div class="p-4 md:w-1/2 flex items-end justify-end" id="header2">
                            <img src="dist/img/animasi/dokterjadwal.jpg" class="h-96" alt="">
                        </div>
                    </div>
                </div>
            </section>

            <!-- Rawat Inap section -->
            <section id="rawatinap">
                <div class="container">
                    <div class="w-full px-4 flex flex-wrap" id="header1">
                        <div class="p-4 md:w-1/2 flex justify-start" id="header1">
                            <img src="dist/img/9931313.png" class="h-96" alt="">
                        </div>
                        <div class="p-4 md:w-1/2 pt-10 items-end justify-end">
                            <br>
                            <h2 class="font-bold text-blue-900 text-3xl mb-4 sm:text-4xl lg:text-5xl" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                                <span class="underline-on-hover">Rawat <font class="text-red-500">Inap</font></span>
                            </h2>
                            <p class="text-lg text-slate-600 font-extralight text-justify mb-8">
                                Seluruh fasilitas kamar inap selalu dinilai kelayakannya mengikuti patient safety indicator.
                                Kami memiliki berbagai pilihan kamar untuk menyesuaikan kebutuhan Anda.
                                Apapun pilihannya, kami akan senantiasa memberikan pelayanan terbaik.
                            </p>
                            <br>
                            <a href="ranap.php" class="rounded-full bg-red-500 text-white font-semibold text-lg px-4 pt-4 pb-4 hover:bg-red-500">Rawat Inap</a>
                        </div>
                    </div>
                </div>
            </section>
            <section id="rawatinap">
                <div class="container">
                    <div class="w-full px-4 flex flex-wrap" id="header1">
                        <div class="p-4 md:w-1/2 items-end justify-end">
                            <br>
                            <div class="mb-5">
                                <h2 class="font-bold text-blue-900 text-3xl mb-4 sm:text-4xl lg:text-5xl" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                                    Layanan <font class="text-red-500">Poliklinik</font>
                                </h2>
                                <p class="text-lg text-slate-600 font-extralight mb-8 text-justify">Dedikasi kami dalam penanganan pasien secara profesional dan cepat tanggap juga direalisasikan dengan pengadaan poliklinik spesialis dengan dokter berpengalaman. Dapatkan informasi poliklinik yang sesuai dengan kebutuhan Anda.</p>
                            </div>
                            <a href="poliklinik.php" class="rounded-full bg-red-500 text-white font-semibold text-lg p-2 hover:bg-red-500">Poliklinik</a>
                        </div>
                        <div class="w-full md:w-1/2 px-4 pt-8">
                            <div class="flex flex-wrap justify-center overflow-x-auto" id="itemsContainer">
                                <div class="item">
                                    <div class="mb-12 p-1 md:w-1/7">
                                        <div class="rounded-md shadow-lg overflow-hidden bg-slate-200 pt-3 pb-3 pr-3 pl-3">
                                            <div class="rounded-full shadow-2xl shadow-white bg-white overflow-hidden pt-3 pb-3 pr-3 pl-3">
                                                <img src="dist/img/kandungan.png" alt="" width="80px">
                                            </div>
                                            <br>
                                            <div class="rounded-md bg-blue-950">
                                                <h3 class="text-white font-red-500 text-center text-md font-bold">Poliklinik<br>Kandungan</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="mb-12 p-1 md:w-1/7">
                                        <div class="rounded-md shadow-lg overflow-hidden bg-slate-200 pt-3 pb-3 pr-3 pl-3">
                                            <div class="rounded-full shadow-lg shadow-white bg-white overflow-hidden pt-3 pb-3 pr-3 pl-3">
                                                <img src="dist/img/anak.png" alt="" width="80px">
                                            </div>
                                            <br>
                                            <div class="rounded-md bg-blue-950">
                                                <h3 class="text-white font-red-500 text-center text-md font-bold">Poliklinik<br>Anak</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="mb-12 p-1 md:w-1/7">
                                        <div class="rounded-md shadow-lg overflow-hidden bg-slate-200 pt-3 pb-3 pr-3 pl-3">
                                            <div class="rounded-full shadow-lg shadow-white bg-white overflow-hidden pt-3 pb-3 pr-3 pl-3">
                                                <img src="dist/img/dalam.png" alt="" width="80px">
                                            </div>
                                            <br>
                                            <div class="rounded-md bg-blue-950">
                                                <h3 class="text-white font-red-500 text-center text-md font-bold">Penyakit<br>Dalam</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="mb-12 p-1 md:w-1/7">
                                        <div class="rounded-md shadow-lg overflow-hidden bg-slate-200 pt-3 pb-3 pr-3 pl-3">
                                            <div class="rounded-full shadow-lg shadow-white bg-white overflow-hidden pt-3 pb-3 pr-3 pl-3">
                                                <img src="dist/img/bedah.png" alt="" width="80px">
                                            </div>
                                            <br>
                                            <div class="rounded-md bg-blue-950">
                                                <h3 class="text-white font-red-500 text-center text-md font-bold">Poliklinik<br>Bedah</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="mb-12 p-1 md:w-1/7">
                                        <div class="rounded-md shadow-lg overflow-hidden bg-slate-200 pt-3 pb-3 pr-3 pl-3">
                                            <div class="rounded-full shadow-lg shadow-white bg-white overflow-hidden pt-3 pb-3 pr-3 pl-3">
                                                <img src="dist/img/paru.png" alt="" width="80px">
                                            </div>
                                            <br>
                                            <div class="rounded-md bg-blue-950">
                                                <h3 class="text-white font-red-500 text-center text-md font-bold">Poliklinik<br>Paru-Paru</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section end -->
            <!-- Berita -->

            <section id="portfolio" class="md:pt-20 pb-16 bg-gray-50">
                <div class="container">
                    <div class="w-full px-4 flex flex-wrap" id="header1">
                        <div class="p-4 md:w-1/2 items-start justify-start">
                            <br>
                            <h2 class="hidden md:flex font-bold text-gray-500 text-2xl sm:text-2xl lg:text-lg pb-2">
                                <span>Dapatkan Informasi Terkini Rumah Sakit Az-Zahra</span>
                            </h2>
                            <h2 class="font-bold text-blue-900 text-3xl mb-4 sm:text-4xl lg:text-5xl" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                                <span>Berita & <font class="text-red-500">Artikel</font></span>
                                <br>
                                <hr class="px-4">
                            </h2>

                            <br>
                        </div>
                        <div class="md:w-1/2 flex justify-end items-start md:pt-10">
                            <a href="homeberita.php" class="hidden md:flex rounded-full bg-red-500 text-white font-semibold text-lg hover:bg-red-500 p-2">
                                Semua Berita <span class="ml-2">&#8594;</span>
                            </a>
                        </div>
                    </div>
                    <div class="w-full flex flex-wrap justify-center mb-10 overflow-x-auto">
                        <div class="flex space-x-6">
                            <?php foreach ($beritaData as $berita) : ?>
                                <div class="w-52 max-w-xs h-96 rounded-3xl overflow-hidden shadow-2xl bg-white transform transition-transform duration-300 hover:scale-105" style="box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);" onclick="tampilkanBerita('<?= $berita['id_berita']; ?>')">
                                    <div class="flex flex-col items-center justify-center">
                                        <img class="w-64 h-36 object-cover transform transition-transform duration-300 hover:scale-95" src="<?= $berita['photo']; ?>" alt="<?= $berita['judul']; ?>">
                                    </div>
                                    <div class="p-4">
                                        <p class="text-gray-700 font-poli text-sm mb-2"><?= $berita['tanggal']; ?></p>
                                        <h3 class="font-semibold text-base mb-2 w-54 text-blue-900"><?= $berita['judul']; ?></h3>
                                        <p class="text-gray-700 w-54 h-16 overflow-hidden text-overflow-ellipsis font-light text-sm"><?= $berita['headline']; ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>
            </section>
            <section id="alamat" style="background-image: url('dist/img/map.png'); background-size: contain; background-repeat: no-repeat;" class="border-b">
                <div class="container">
                    <div class="w-full px-4 flex flex-wrap md:items-start justify-end pb-20" id="header1">
                        <div class="p-4 md:w-2/3 pt-14 flex-1">
                            <br>
                            <h2 class="hidden md:flex font-bold text-blue-900 text-2xl sm:text-2xl lg:text-xl pb-2 md:px-52">
                                <span class="line-with-circle">Temukan Kami Di Lokasi</span>
                            </h2>
                            <h2 class="font-bold text-blue-900 text-4xl mb-3 sm:text-5xl lg:text-5xl md:px-52 w-full transform transition-transform duration-300 hover:scale-105 animate-pulse" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                                Rumah Sakit <font class="text-red-500"><br>AZ-ZAHRA</font>
                            </h2>
                            <h2 class="text-blue-900 w-full h-16 overflow-hidden text-overflow-ellipsis font-light text-lg md:px-52">
                                <span class="line-with-circle">Jalan Rambutan No. 03 RK. Harapan,<br>Ujungbatu, Rokan Hulu</span>
                            </h2>
                            <br>
                            <div class="flex flex-col space-y-1 max-w-md mx-auto">
                                <!-- Item 1 -->
                                <div class="bg-blue-100 p-4">
                                    <h2 class="font-bold text-blue-900 text-2xl sm:text-2xl lg:text-xl">
                                        <span class="line-with-circle">Buka : 24 Jam</span>
                                    </h2>
                                </div>

                                <!-- Item 2 -->
                                <div class="bg-blue-100 p-4">
                                    <h2 class="font-bold text-blue-900 text-2xl sm:text-2xl lg:text-xl">
                                        <span class="line-with-circle">Call Center : 24 Jam</span>
                                    </h2>
                                </div>

                                <!-- Item 3 -->
                                <div class="bg-blue-100 p-4">
                                    <h2 class="font-bold text-blue-900 text-2xl sm:text-2xl lg:text-xl">
                                        <span class="line-with-circle">IGD : 24 Jam</span>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="md:w-1/3 flex items-end md:justify-end justify-start md:mr-16 md:mt-10" id="header2">
                            <div id="mapContainer" class="rounded-md w-96">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.5145025956435!2d100.53991289999999!3d0.707083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302b2dd210ff04b3%3A0x349a2e1b8a96628d!2sRS%20Az-Zahra%20UjungBatu!5e0!3m2!1sid!2sid!4v1704794064569!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

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
        <!-- icon pack end -->