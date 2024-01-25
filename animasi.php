<?php
include 'koneksi.php';

// Query untuk mendapatkan nama_loker dari tabel karir
$query_loker = "SELECT DISTINCT nama_loker FROM karir";
$result_loker = mysqli_query($conn, $query_loker);

// Query untuk mendapatkan nama pelamar dari tabel cakar berdasarkan nama_loker yang dipilih
$query_pelamar = "SELECT DISTINCT nama FROM cakar WHERE nama_loker = ?";
$stmt_pelamar = mysqli_prepare($conn, $query_pelamar);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Dropdown Select PHP</title>
</head>

<body>

    <form action="" method="post">

        <label for="nama_loker">Pilih Nama Loker:</label>
        <select name="nama_loker" id="nama_loker">
            <?php
            while ($row_loker = mysqli_fetch_assoc($result_loker)) {
                echo "<option value='" . $row_loker['nama_loker'] . "'>" . $row_loker['nama_loker'] . "</option>";
            }
            ?>
        </select>

        <label for="nama">Pilih Nama Pelamar:</label>
        <select name="nama" id="nama">
            <!-- Placeholder untuk opsi nama pelamar -->
        </select>

        <input type="submit" value="Submit">

    </form>

    <script>
        // Menangani perubahan pada select pertama (nama_loker)
        document.getElementById("nama_loker").addEventListener("change", function() {
            var selected_loker = this.value;

            // Kirim AJAX request untuk mendapatkan nama pelamar berdasarkan nama_loker yang dipilih
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "animasi.php?nama=" + selected_loker, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Update select kedua (nama) dengan hasil dari AJAX request
                    document.getElementById("nama").innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        });
    </script>

</body>

</html>