<?php include 'koneksi.php'; ?>
<?php include 'pages/headeradmin2.php';
if (!isset($_GET['id-berita'])) {
    echo '<script>window.location="databerita.php";</script>';
}

$id_berita = $_GET['id-berita'];

$query_tampil = mysqli_query($conn, "SELECT * FROM berita WHERE id_berita = '$id_berita' ")
    or die(mysqli_error($conn));
$data_rs = mysqli_fetch_assoc($query_tampil);
?>
?>
<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="text-danger">Masukkan Berita Terbaru</h4>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Creator</label>
                                    <input type="text" class="form-control" name="admin_username" value="<?php echo $admin_username; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile2">FOTO SAMPUL</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="Filegambar" name="filegbr" onchange="previewImage(this)">
                                            <label class="custom-file-label" for="Filegambar">Pilih file</label>
                                        </div>
                                    </div>
                                    <img id="preview" src="<?= $data_rs['photo']; ?>" alt="Preview" style="max-width: 100%; max-height: 200px; margin-top: 10px;">
                                </div>
                                <div class="form-group">
                                    <label>Judul Berita</label>
                                    <input type="text" class="form-control" name="judul" value="<?= $data_rs['judul']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Headline</label>
                                    <input type="text" class="form-control" name="headline" value="<?= $data_rs['headline']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Posting</label>
                                    <?php
                                    $waktu_sekarang = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
                                    $formatted_time = $waktu_sekarang->format('Y-m-d\TH:i');
                                    ?>
                                    <input type="datetime-local" class="form-control" name="tanggal" value="<?= $formatted_time; ?>" readonly>
                                </div>
                                <div class="card-body">
                                    <label>Masukkan Content Berita</label>
                                    <textarea id="summernote" name="isi" value="<?= $data_rs['isi']; ?>">
                                            </textarea>
                                </div>
                                <button type="submit" class="btn btn-block btn-success" name="simpan-data">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
</div>
<script>
    function previewImage(input) {
        var preview = document.getElementById('preview');
        var file = input.files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }
</script>
<?php
if (isset($_POST['judul'], $_POST['headline'], $_POST['isi'], $_POST['tanggal'], $_POST['admin_username'])) {
    $judul = $_POST['judul'];
    $headline = $_POST['headline'];
    $isi = $_POST['isi'];
    $tanggal = $_POST['tanggal'];

    // Ubah format tanggal untuk disimpan dalam database (tanpa detik)
    $tanggal_database = date('Y-m-d H:i', strtotime($tanggal));

    $admin_username = $_POST['admin_username'];
    $namafolder = "admin/gambar/"; //folder tempat menyimpan file

    // Cek apakah ada file yang diupload
    if (!empty($_FILES["filegbr"]["tmp_name"])) {
        $jenis_gambar = $_FILES['filegbr']['type']; //memeriksa format gambar
        if ($jenis_gambar == "image/jpeg" || $jenis_gambar == "image/jpg" || $jenis_gambar == "image/gif" || $jenis_gambar == "image/png") {
            $lampiran = $namafolder . basename($_FILES['filegbr']['name']);

            // Mengupload gambar dan update row table database dengan path folder dan nama image
            if (move_uploaded_file($_FILES['filegbr']['tmp_name'], $lampiran)) {
                mysqli_query($conn, "UPDATE berita SET
                    judul='$judul',
                    headline='$headline',
                    isi = '$isi',
                    tanggal = '$tanggal_database',
                    photo = '$lampiran'
                    WHERE id_berita='$id_berita'") or die(mysqli_error($conn));
            } else {
                echo '<script>alert("Gagal mengupload gambar");</script>';
            }
        }
    } else {
        // Jika tidak ada file yang diupload, hanya update data tanpa mengubah foto
        mysqli_query($conn, "UPDATE berita SET
            judul='$judul',
            headline='$headline',
            isi = '$isi',
            tanggal = '$tanggal_database'
            WHERE id_berita='$id_berita'") or die(mysqli_error($conn));
    }

    if (mysqli_affected_rows($conn) > 0) {
        echo '<script>alert("Data berhasil diupdate");window.location="databerita.php";</script>';
    } else {
        echo '<script>alert("Data gagal diupdate");</script>';
    }
}
?>