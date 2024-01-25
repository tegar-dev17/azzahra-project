<?= include 'pages/header.php'; ?>

<body>
    <div class="container mx-auto flex flex-col sm:flex-row items-center sm:items-start w-full p-4">
        <!-- Navbar -->
        <aside class="w-full sm:w-1/4 p-4 bg-gradient-to-b text-blue-900 font-bold text-center sm:ml-4">
            <nav>
                <!-- Navbar Content Goes Here -->
                <ul class="space-y-2 pl-2 sm:pl-20">
                    <!-- Navbar Items -->
                    <li class="w-full mb-3 max-w-xs h-14 rounded-lg overflow-hidden shadow-2xl bg-blue-900 text-white hover:bg-red-500 transform transition-transform duration-300 hover:scale-105 flex items-center justify-center navbar-item" data-src="dist/img/foto1.jpg" data-caption="Pintu IGD">
                        <a href="#" onclick="changeBigPhoto('dist/img/foto2.jpg', 'Pintu IGD')" class="text-left flex items-center">
                            Pintu IGD
                            <span class="ml-2">&rarr;</span>
                        </a>
                    </li>
                    <li class="w-full mb-3 max-w-xs h-14 rounded-lg overflow-hidden shadow-2xl bg-blue-900 text-white hover:bg-red-500 transform transition-transform duration-300 hover:scale-105 flex items-center justify-center navbar-item" data-src="dist/img/foto2.jpg" data-caption="Ruang IGD">
                        <a href="#" onclick="changeBigPhoto('dist/img/foto1.jpg', 'Ruang IGD')" class="text-left flex items-center">
                            Ruang IGD
                            <span class="ml-2">&rarr;</span>
                        </a>
                    </li>
                    <li class="w-full mb-3 max-w-xs h-14 rounded-lg overflow-hidden shadow-2xl bg-blue-900 text-white hover:bg-red-500 transform transition-transform duration-300 hover:scale-105 flex items-center justify-center navbar-item" data-src="dist/img/foto3.jpg" data-caption="Tempat Pendaftaran">
                        <a href="#" onclick="changeBigPhoto('dist/img/foto3.jpg', 'Tempat Pendaftaran')" class="text-left flex items-center">
                            Tempat Pendaftaran
                            <span class="ml-2">&rarr;</span>
                        </a>
                    </li>
                    <li class="w-full max-w-xs h-14 rounded-lg overflow-hidden shadow-2xl bg-blue-900 text-white hover:bg-red-500 transform transition-transform duration-300 hover:scale-105 flex items-center justify-center navbar-item" data-src="dist/img/foto4.jpg" data-caption="Ruang Tindakan">
                        <a href="#" onclick="changeBigPhoto('dist/img/foto4.jpg', 'Ruang Tindakan')" class="text-left flex items-center">
                            Ruang Tindakan
                            <span class="ml-2">&rarr;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Album Section -->
        <section class="w-full sm:w-10/12 p-4 items-center">
            <!-- Large Photo -->
            <div class="mb-4">
                <img id="big-photo" src="dist/img/foto2.jpg" alt="Large Photo" class="w-full h-auto rounded-lg md:ml-36 md:w-3/4" style="max-width: 100%;">
            </div>

            <!-- Small Photos -->
            <div class="md:flex md:flex-row flex">
                <!-- Small Photo 1 -->
                <div class="w-3/4 sm:w-1/3 sm:mb-0 pr-2">
                    <img src="dist/img/foto1.jpg" alt="Small Photo 1" class="md:ml-36 md:w-3/4 w-full h-full rounded-xl small-photo" onclick="changeBigPhoto('dist/img/foto2.jpg', 'Ruang IGD')">
                </div>

                <!-- Small Photo 2 -->
                <div class="w-3/4 sm:w-1/3 sm:mb-0 pr-2">
                    <img src="dist/img/foto3.jpg" alt="Small Photo 2" class="md:ml-20 md:w-3/4 w-full h-full rounded-xl small-photo" onclick="changeBigPhoto('dist/img/foto3.jpg', 'Tempat Pendaftaran')">
                </div>

                <!-- Small Photo 3 -->
                <div class="w-3/4 sm:w-1/3">
                    <img src="dist/img/foto4.jpg" alt="Small Photo 3" class="md:mr-36 md:w-4/6 w-full h-full rounded-xl small-photo" onclick="changeBigPhoto('dist/img/foto4.jpg', 'Ruang Tindakan')">
                </div>
            </div>

            <!-- Photo Caption -->
            <p id="photo-caption" class="mt-4 text-center font-semibold">Pintu IGD</p>
        </section>
    </div>
    <script>
        function changeBigPhoto(photoSrc, photoCaption) {
            document.getElementById('big-photo').src = photoSrc;
            document.getElementById('photo-caption').innerText = photoCaption;
        }
    </script>
</body>
<?= include 'pages/footer.php'; ?>