
        <?php
        // Mulai session
        session_start();

        // Periksa apakah session beritaData sudah ada
        if (isset($_SESSION['beritaData'])) {
            // Mengambil data berita dari session
            $beritaData = $_SESSION['beritaData'];

            // Sekarang, $beritaData berisi data berita yang dapat Anda gunakan di sini
            // Misalnya, menampilkan judul dan headline:
            // Di file `index.php` sebelum foreach:
            var_dump($_SESSION['beritaData']);
            foreach ($beritaData as $berita) {
                echo "<h3>{$berita['judul']}</h3>";
                echo "<p>{$berita['headline']}</p>";
                // ... tambahkan kode lain sesuai kebutuhan tampilan di sini
            }
        } else {
            echo "Data berita tidak tersedia.";
        }
        // Di awal file `index.php` untuk mengaktifkan error reporting:
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        ?>