<?php include 'pages/header.php'; ?>

<body>
    <div class="bg-cover sm:w-auto">
        <section id="Poli" class="pt-10 pb-16">
            <div class="w-full px-1">
                <div class="max-w-xl mx-auto text-center mb-16">
                    <h1 class="font-poli font-bold text-blue-900 text-4xl mb-5">Instalasi <font class="text-red-500">Penunjang</font>
                    </h1>
                    <p class="text-slate-600 text-center text-lg font-light ">Teknologi modern, dokter berpengalaman, dan fasilitas canggih menjadikan layanan kesehatan kami terdepan dalam perawatan pasien dan kepuasan pelanggan.</p>
                </div>
            </div>
            <div class="container">
                <div class="w-full px-4 flex flex-wrap justify-center">
                    <div class="p-4 md:w-1/2 md:ml-auto">
                        <div class="ml-96 w-96 max-w-xs h-36 rounded-3xl overflow-hidden shadow-2xl bg-white transform transition-transform duration-300 hover:scale-105" style="box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);" id="ugd">
                            <div class="flex justify-center items-center h-full">
                                <div class="flex flex-col items-center justify-center">
                                    <!-- Contoh untuk gambar Ambulance -->
                                    <img class="ml-6 w-40 h-24 object-cover rounded-md cursor-pointer" src="dist/img/fasilitas1.png" alt="Gambar Fasilitas" data-fancybox="fasilitas" data-caption="Kecepatan dan Keandalan: Layanan Ambulans 24 Jam Kami Siap Melayani Setiap Kebutuhan Kesehatan Anda Kapan Saja!" />
                                </div>
                                <div class="p-4 ml-6">
                                    <p class="text-gray-700 font-poli text-sm"></p>
                                    <h3 class="font-semibold text-base mb-1 text-blue-900">UGD 24 JAM</h3>
                                    <p class="text-gray-700 w-36 h-16 overflow-hidden text-overflow-ellipsis font-light text-xs justify-center">Menjaga setiap detik, menyelamatkan setiap nyawa. UGD 24 Jam: Pahlawan tanpa batas waktu.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-12 p-4 md:w-1/2">
                        <div class="w-96 max-w-xs h-36 rounded-3xl overflow-hidden shadow-2xl bg-white transform transition-transform duration-300 hover:scale-105" style="box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);" id="ambulance">
                            <div class="flex justify-center items-center h-full">
                                <div class="flex flex-col items-center justify-center">
                                    <img class="ml-6 w-40 h-24 object-cover rounded-md cursor-pointer" src="dist/img/ambulans.jpg" alt="Gambar Fasilitas">
                                </div>
                                <div class="p-4 ml-6">
                                    <p class="text-gray-700 font-poli text-sm"></p>
                                    <h3 class="font-semibold text-base mb-1 text-blue-900">AMBULANCE</h3>
                                    <p class="text-gray-700 w-36 h-16 overflow-hidden text-overflow-ellipsis font-light text-xs justify-center">Kecepatan dan Keandalan: Layanan Ambulans 24 Jam Kami Siap Melayani Setiap Kebutuhan Kesehatan Anda Kapan Saja!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-12 p-4 md:w-1/2">
                        <div class="ml-96 w-96 max-w-xs h-36 rounded-3xl overflow-hidden shadow-2xl bg-white transform transition-transform duration-300 hover:scale-105" style="box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);" id="laboratorium">
                            <div class="flex justify-center items-center h-full">
                                <div class="flex flex-col items-center justify-center">
                                    <img class="ml-6 w-40 h-24 object-cover rounded-md cursor-pointer" src="dist/img/laboratium.jpg" alt="Gambar Fasilitas">
                                </div>
                                <div class="p-4 ml-6">
                                    <p class="text-gray-700 font-poli text-sm"></p>
                                    <h3 class="font-semibold text-base mb-1 text-blue-900">LABORATORIUM</h3>
                                    <p class="text-gray-700 w-36 h-16 overflow-hidden text-overflow-ellipsis font-light text-xs justify-center">Inovasi yang Teruji, Pelayanan Laboratorium Tanpa Kompromi. Kami Hadir untuk Kepuasan Anda!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-12 p-4 md:w-1/2">
                        <div class="w-96 max-w-xs h-36 rounded-3xl overflow-hidden shadow-2xl bg-white transform transition-transform duration-300 hover:scale-105" style="box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);" id="radiologi">
                            <div class="flex justify-center items-center h-full">
                                <div class="flex flex-col items-center justify-center">
                                    <img class="ml-6 w-40 h-24 object-cover rounded-md cursor-pointer" src="dist/img/radiologi.jpg" alt="Gambar Fasilitas">
                                </div>
                                <div class="p-4 ml-6">
                                    <p class="text-gray-700 font-poli text-sm"></p>
                                    <h3 class="font-semibold text-base mb-1 text-blue-900">RADIOLOGI</h3>
                                    <p class="text-gray-700 w-36 h-16 overflow-hidden text-overflow-ellipsis font-light text-xs justify-center">Menyinari Kesehatan Anda: Layanan Radiologi Kami Siap Melayani dengan Keahlian dan Perhatian yang Tak Tertandingi!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pop-up Content -->
                <div id="popup" class="hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 items-center justify-center">
                    <!-- Your pop-up content goes here -->
                    <div class="bg-white p-6 rounded-md">
                        <p>Informasi tambahan mengenai foto atau teks</p>
                        <!-- Close button -->
                        <button onclick="closePopup()">Tutup</button>
                    </div>
                </div>
            </div>
        </section>

    </div>
</body>
<?php include 'pages/footer.php'; ?>