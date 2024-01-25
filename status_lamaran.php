<?php include 'pages/headeradmin3.php'; ?>

<body>

    <?php
    // Sertakan file koneksi ke database
    include 'koneksi.php';
    // Logika penyortiran
    $sortColumn = isset($_GET['sort']) ? $_GET['sort'] : 'karir_nama_loker';
    $sortOrder = isset($_GET['order']) && strtoupper($_GET['order']) === 'DESC' ? 'DESC' : 'ASC';

    $query = "SELECT
    k.id AS karir_id,
    k.nama_loker AS karir_nama_loker,
    k.pendidikan AS karir_pendidikan,
    k.kualifikasi AS karir_kualifikasi,
    k.deadline AS karir_deadline,
    k.deskripsi AS karir_deskripsi,
    k.alamat AS karir_alamat,
    c.id AS cakar_id,
    c.nama_loker AS cakar_nama_loker,
    c.no_ktp AS cakar_no_ktp,
    c.nama AS cakar_nama,
    c.tempat_lahir AS cakar_tempat_lahir,
    c.tanggal_lahir AS cakar_tanggal_lahir,
    c.jk AS cakar_jk,
    c.s_pernikahan AS cakar_s_pernikahan,
    c.tb AS cakar_tb,
    c.bb AS cakar_bb,
    c.no_hp AS cakar_no_hp,
    c.email AS cakar_email,
    c.street AS cakar_street,
    c.kabupaten AS cakar_kabupaten,
    c.kecamatan AS cakar_kecamatan,
    c.kelurahan AS cakar_kelurahan,
    c.provinsi AS cakar_provinsi,
    c.kode_pos AS cakar_kode_pos,
    c.pas_photo AS cakar_pas_photo,
    c.berkas AS cakar_berkas,
    c.pendidikan AS cakar_pendidikan,
    sl.id AS status_lamaran_id,
    sl.status AS status_lamaran_status
FROM
    azzahra.karir k
JOIN
    azzahra.status_lamaran sl ON k.id = sl.id_karir
JOIN
    azzahra.cakar c ON sl.id_cakar = c.id
ORDER BY $sortColumn $sortOrder;";

    // Fungsi untuk mendapatkan data status lamaran
    function getStatusLamaran()
    {
        global $conn;
        $query = "SELECT
        k.id AS karir_id,
        k.nama_loker AS karir_nama_loker,
        k.pendidikan AS karir_pendidikan,
        k.kualifikasi AS karir_kualifikasi,
        k.deadline AS karir_deadline,
        k.deskripsi AS karir_deskripsi,
        k.alamat AS karir_alamat,
        c.id AS cakar_id,
        c.nama_loker AS cakar_nama_loker,
        c.no_ktp AS cakar_no_ktp,
        c.nama AS cakar_nama,
        c.tempat_lahir AS cakar_tempat_lahir,
        c.tanggal_lahir AS cakar_tanggal_lahir,
        c.jk AS cakar_jk,
        c.s_pernikahan AS cakar_s_pernikahan,
        c.tb AS cakar_tb,
        c.bb AS cakar_bb,
        c.no_hp AS cakar_no_hp,
        c.email AS cakar_email,
        c.street AS cakar_street,
        c.kabupaten AS cakar_kabupaten,
        c.kecamatan AS cakar_kecamatan,
        c.kelurahan AS cakar_kelurahan,
        c.provinsi AS cakar_provinsi,
        c.kode_pos AS cakar_kode_pos,
        c.pas_photo AS cakar_pas_photo,
        c.berkas AS cakar_berkas,
        c.pendidikan AS cakar_pendidikan,
        sl.id AS status_lamaran_id,
        sl.status AS status_lamaran_status
    FROM
        azzahra.karir k
    JOIN
        azzahra.status_lamaran sl ON k.id = sl.id_karir
    JOIN
        azzahra.cakar c ON sl.id_cakar = c.id;
    ";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    // Fungsi untuk mendapatkan data karir
    function getKarirOptions()
    {
        global $conn;
        $query = "SELECT id, nama_loker FROM karir";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    // Fungsi untuk mendapatkan data cakar
    function getCakarOptions()
    {
        global $conn;
        $query = "SELECT id, nama FROM cakar";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    // Fungsi untuk menambahkan status lamaran
    function tambahStatusLamaran($id_karir, $id_cakar, $status)
    {
        global $conn;
        $query = "INSERT INTO status_lamaran (id_karir, id_cakar, status) VALUES ('$id_karir', '$id_cakar', '$status')";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    // Fungsi untuk mengubah status lamaran
    function updateStatusLamaran($id, $status)
    {
        global $conn;
        $query = "UPDATE status_lamaran SET status='$status' WHERE id='$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }


    // Fungsi untuk menghapus status lamaran
    function hapusStatusLamaran($id)
    {
        global $conn;
        $query = "DELETE FROM status_lamaran WHERE id='$id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    // Proses form jika tombol submit ditekan
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['submit'])) {
            // Ambil data dari form
            $id_karir = $_POST['id_karir'];
            $id_cakar = $_POST['id_cakar'];
            $status = $_POST['status'];

            // Ambil nilai id jika ada (digunakan saat mengubah data)
            $id = isset($_POST['id']) ? $_POST['id'] : null;

            if ($id) {
                // Jika id ada, lakukan update data
                if (updateStatusLamaran($id, $id_karir, $id_cakar, $status)) {
                    echo "Status lamaran berhasil diubah.";
                } else {
                    echo "Gagal mengubah status lamaran.";
                }
            } else {
                // Jika id tidak ada, lakukan tambah data baru
                if (tambahStatusLamaran($id_karir, $id_cakar, $status)) {
                    echo "Status lamaran berhasil ditambahkan.";
                } else {
                    echo "Gagal menambahkan status lamaran.";
                }
            }
        } elseif (isset($_POST['hapus'])) {
            // Jika tombol hapus ditekan, lakukan hapus data
            $id = $_POST['id'];
            if (hapusStatusLamaran($id)) {
                echo "Status lamaran berhasil dihapus.";
            } else {
                echo "Gagal menghapus status lamaran.";
            }
        } elseif (isset($_POST['update'])) {
            // Proses update data
            $id = $_POST['id'];
            $status_update = $_POST['status_update'];

            if (updateStatusLamaran($id, $status_update)) {
                echo "Status lamaran berhasil diupdate.";
            } else {
                echo "Gagal mengupdate status lamaran.";
            }
        }
    }


    ?>
    <section class="content">
        <!-- Your content goes here -->
        <div class="container-fluid">
            <!-- Formulir untuk menambah atau mengubah status lamaran -->
            <form method="POST" class="form-inline">
                <input type="hidden" name="id" value="">

                <div class="form-group mr-2">
                    <label for="id_karir">Pilih Lowongan Pekerjaan:</label>
                    <select class="form-control" name="id_karir" required>
                        <?php
                        $karirOptions = getKarirOptions();
                        while ($karir = mysqli_fetch_assoc($karirOptions)) {
                            echo "<option value='{$karir['id']}'>{$karir['nama_loker']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group mr-2">
                    <label for="id_cakar">Pilih Pelamar:</label>
                    <select class="form-control" name="id_cakar" required>
                        <?php
                        $cakarOptions = getCakarOptions();
                        while ($cakar = mysqli_fetch_assoc($cakarOptions)) {
                            echo "<option value='{$cakar['id']}'>{$cakar['nama']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group mr-2">
                    <label for="status">Status Lamaran:</label>
                    <select class="form-control" name="status" required>
                        <option value="PENDAFTARAN DITERIMA">PENDAFTARAN DITERIMA</option>
                        <option value="PEMERIKSAAN BERKAS">PEMERIKSAAN BERKAS</option>
                        <option value="TIDAK SESUAI">TIDAK SESUAI</option>
                        <option value="PROSES RECRUITMENT TAHAP 1 (INTERVIEW)">PROSES RECRUITMENT TAHAP 1 (INTERVIEW)</option>
                        <option value="DITERIMA">DITERIMA</option>
                        <option value="TIDAK DITERIMA">TIDAK DITERIMA</option>
                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </form>



            <!-- Tabel untuk menampilkan data status lamaran -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Status Lamaran</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>>Nama Lowongan</a></th>
                                <th>NO IDENTITAS</th>
                                <th>Nama Pelamar</th>
                                <th>Status Lamaran</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $statusLamaran = getStatusLamaran();
                            while ($status = mysqli_fetch_assoc($statusLamaran)) {
                                echo "<tr>
        <td class='sort-nama-loker'>{$status['karir_nama_loker']}</td>
        <td>{$status['cakar_no_ktp']}</td>
        <td>{$status['cakar_nama']}</td>
        <td>{$status['status_lamaran_status']}</td>
        <td>
            <!-- Form untuk mengupdate status lamaran -->
            <form method='POST'>
                <input type='hidden' name='id' value='{$status['status_lamaran_id']}'>
                <div class='form-group d-flex'>
                    <select name='status_update' class='form-control mr-2' style='width: 250px;' required>
                        <option value='PENDAFTARAN DITERIMA'>PENDAFTARAN DITERIMA</option>
                        <option value='PEMERIKSAAN BERKAS'>PEMERIKSAAN BERKAS</option>
                        <option value='TIDAK SESUAI'>TIDAK SESUAI</option>
                        <option value='PROSES RECRUITMENT TAHAP 1 (INTERVIEW)'>PROSES RECRUITMENT TAHAP 1 (INTERVIEW)</option>
                        <option value='DITERIMA'>DITERIMA</option>
                        <option value='TIDAK DITERIMA'>TIDAK DITERIMA</option>
                    </select>
                    <button type='submit' name='update' class='btn btn-warning'>Update</button>
                </div>
            </form>
        </td>
        <td>
            <form method='POST'>
                <input type='hidden' name='id' value='{$status['status_lamaran_id']}'>
                <button type='submit' name='hapus' class='btn btn-danger'>Hapus</button>
            </form>
        </td>
    </tr>";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Inisialisasi DataTables
            var table = $('.table').DataTable();

            // Menangani pengurutan kolom "Nama Lowongan"
            $('.sort-nama-loker').click(function() {
                table.order([0, 'asc']).draw(); // Mengurutkan berdasarkan kolom pertama secara ascending (sesuaikan dengan indeks kolom yang sesuai)
            });
        });
    </script>

</body>

</html>