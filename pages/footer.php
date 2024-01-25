        <!-- Header Start -->
        <section id="konsul" class="slider-container">
            <img src="dist/img/footer3.png" class="slider-image" alt="">
        </section>

        <footer class="bg-blue-950 pt-10 pb-12 bottom-0 w-full">
            <div class="container">
                <div class="flex flex-wrap">
                    <div class="w-full px-4 mb-12 text-black font-medium md:w-1/3 justify-center">
                        <h3 class="text-2xl mb-2 text-yellow-500">Hubungi Kami</h3>
                        <p class="inline-block text-white mb-1">rumahsakitazzahra@gmail.com</p>
                        <br>
                        <p class="inline-block text-white mb-1">Jl. Rambutan No.3, Ngaso, Kec. Ujungbatu</p>
                        <br>
                        <p class="inline-block text-white mb-1">Rokan Hulu, Riau, Indonesia</p>
                    </div>
                    <div class="w-full px-4 mb-12 md:w-1/3">
                        <h3 class="font-semibold text-xl text-yellow-500 mb-5">Kategori</h3>
                        <ul class="text-white">
                            <li>
                                <a href="index.php" class="inline-block text-base hover:text-white mb-1">
                                    Profil Rumah Sakit
                                </a>
                            </li>
                            <li>
                                <a href="#" class="inline-block text-base hover:text-white mb-1">
                                    Layanan Rumah Sakit
                                </a>
                            </li>
                            <li>
                                <a href="#" class="inline-block text-base hover:text-white mb-1">
                                    Jadwal Dokter
                                </a>
                            </li>
                            <li>
                                <a href="#" class="inline-block text-base hover:text-white mb-1">
                                    Karir
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="w-full px-4 mb-12 md:w-1/3">
                        <h3 class="font-semibold text-xl text-yellow-500 mb-5">Tautan</h3>
                        <ul class="text-white">
                            <li>
                                <a href="#home" class="inline-block text-base hover:text-white mb-1">
                                    Profil
                                </a>
                            </li>
                            <li>
                                <a href="#about" class="inline-block text-base hover:text-white mb-1">
                                    Visi & Misi
                                </a>
                            </li>
                            <li>
                                <a href="#portfolio" class="inline-block text-base hover:text-white mb-1">
                                    Karir
                                </a>
                            </li>
                            <li>
                                <a href="#client" class="inline-block text-base hover:text-white mb-1">
                                    WhatsApp
                                </a>
                            </li>
                            <li>
                                <a href="#blog" class="inline-block text-base hover:text-white mb-1">
                                    Hubungi Kami
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="w-full pt-5 border-t border-slate-500">
                <p class="font-medium text-sm text-white text-center"><?= $data_rs['copright']; ?></p>
            </div>
        </footer>
        <script src="dist/js/script.js"></script>
        <script src="dist/js/notifikasisweet.js"></script>
        <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
        <!-- Masukkan ini di dalam bagian head HTML Anda -->
        <script src="https://unpkg.com/gsap@3.9.2/dist/gsap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>
        <script src="path/to/sweetalert2.all.min.js"></script>
        <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const mobileMenuButton = document.getElementById('mobileMenuButton');
                const mobileMenu = document.getElementById('mobileMenu');

                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
            });
        </script>
        <script>
            document.getElementById("type_kamar").addEventListener("change", function() {
                document.getElementById("searchForm").submit();
            });
        </script>
        <script>
            // Script animasi teks
            function addUnderline() {
                var textElement = document.getElementById("animated-text");

                // Cek apakah underline sudah ada sebelumnya, jika iya, keluar dari fungsi
                if (textElement.querySelector(".underline")) return;

                var underline = document.createElement("div");
                underline.classList.add("underline");
                underline.style.borderBottomColor = "#001F3F"; // Warna biru tua
                textElement.appendChild(underline);

                // Menerapkan animasi underline
                setTimeout(function() {
                    underline.style.width = "100%";
                }, 10);
            }

            function removeUnderline() {
                var textElement = document.getElementById("animated-text");
                var underline = textElement.querySelector(".underline");

                // Menghilangkan underline saat mouse keluar
                if (underline) {
                    underline.style.width = "0";
                    setTimeout(function() {
                        textElement.removeChild(underline);
                    }, 300);
                }
            }
        </script>


        <script>
            // Ambil elemen yang akan diberikan animasi
            var emphasisElement = document.querySelector('.rounded-md');

            // Tambahkan event listener untuk mouseover dan mouseout
            emphasisElement.addEventListener('mouseover', function() {
                emphasisElement.classList.add('emphasis');
            });

            emphasisElement.addEventListener('mouseout', function() {
                emphasisElement.classList.remove('emphasis');
            });
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Simulate loading process
                setTimeout(function() {
                    document.getElementById("loading-screen").style.display = "none";
                }, 2000); // Change 2000 to the desired duration in milliseconds
            });
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Gunakan GSAP untuk animasi fadeIn pada elemen dengan ID "img1"
                gsap.from("#img1", {
                    opacity: 0,
                    duration: 1,
                    delay: 0.5
                });

                // Gunakan GSAP untuk animasi scale pada elemen dengan ID "animated-example"
                gsap.from("#animated-example", {
                    scale: 0,
                    duration: 1,
                    delay: 1
                });
            });
        </script>
        <script>
            // Animation for header1
            anime({
                targets: '#rawatinap',
                opacity: [0, 1],
                translateY: [30, 0],
                easing: 'easeInOutQuad',
                duration: 1000,
                delay: 500 // Adjust delay as needed
            });

            // Animation for header1
            anime({
                targets: '#header1',
                opacity: [0, 1],
                translateX: [-50, 0], // Adjust the starting position (negative value) as needed
                easing: 'easeInOutQuad',
                duration: 1000,
                delay: 500 // Adjust delay as needed
            });

            // Animation for header2
            anime({
                targets: '#header2',
                opacity: [0, 1],
                translateX: [50, 0], // Adjust the starting position (positive value) as needed
                easing: 'easeInOutQuad',
                duration: 1000,
                delay: 1000 // Adjust delay as needed
            });

            // Animation for visi
            const visiAnimation = anime({
                targets: '#visi',
                opacity: [0, 1],
                translateY: [30, 0],
                easing: 'easeInOutQuad',
                duration: 500,
                autoplay: false, // Delay the animation start until triggered
                delay: 300 // Adjust delay as needed
            });

            // Animation for tentang
            const tentangAnimation = anime({
                targets: '#tentang',
                opacity: [0, 1],
                translateX: [-50, 0], // Adjust the starting position (positive value) as needed
                easing: 'easeInOutQuad',
                duration: 500,
                autoplay: false, // Delay the animation start until triggered
                delay: 300 // Adjust delay as needed
            });

            const visiObserver = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // If the element is in view, start the animation
                        visiAnimation.play();
                        // Stop observing once the animation is triggered
                        visiObserver.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.5
            });

            const tentangObserver = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // If the element is in view, start the animation
                        tentangAnimation.play();
                        // Stop observing once the animation is triggered
                        tentangObserver.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.5
            });

            // Observe the target elements
            visiObserver.observe(document.getElementById('visi'));
            tentangObserver.observe(document.getElementById('tentang'));
        </script>

        <script>
            const items = document.querySelectorAll('.item');

            items.forEach((item, index) => {
                // Set up the Anime.js animation for each item
                anime({
                    targets: item,
                    opacity: [0, 1],
                    translateX: [index * 20, 0], // Adjust spacing between items
                    easing: 'easeInOutQuad',
                    duration: 800,
                    delay: 200 * index // Adjust delay for each item
                });
            });
        </script>
        <!-- ... Konten HTML lainnya ... -->
        </body>