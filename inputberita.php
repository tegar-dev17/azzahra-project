<?php include 'koneksi.php'; ?>
<?php include 'pages/headeradmin2.php';
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
                                            <label class="custom-file-label" for="exampleInputFile2">Pilih file</label>
                                        </div>
                                    </div>
                                    <div id="imagePreview" style="margin-top: 10px;"></div>
                                </div>
                                <div class="form-group">
                                    <label>Judul Berita</label>
                                    <input type="text" class="form-control" name="judul">
                                </div>
                                <div class="form-group">
                                    <label>Headline</label>
                                    <input type="text" class="form-control" name="headline">
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
                                    <textarea id="summernote" name="isi">
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
<?php
if (isset($_POST['judul']) && isset($_POST['headline']) && isset($_POST['isi']) && isset($_POST['tanggal']) && isset($_POST['admin_username'])) {
    $judul = $_POST['judul'];
    $headline = $_POST['headline'];
    $isi = $_POST['isi'];
    $tanggal = $_POST['tanggal'];
    $tanggal = $_POST['tanggal'];

    // Ubah format tanggal untuk disimpan dalam database (tanpa detik)
    $tanggal_database = date('Y-m-d H:i', strtotime($tanggal));

    $admin_username = $_POST['admin_username'];
    $namafolder = "admin/gambar/"; //folder tempat menyimpan file
    if (!empty($_FILES["filegbr"]["tmp_name"])) {
        $jenis_gambar = $_FILES['filegbr']['type']; //memeriksa format gambar
        if ($jenis_gambar == "image/jpeg" || $jenis_gambar == "image/jpg" || $jenis_gambar == "image/gif" || $jenis_gambar == "image/png") {
            $lampiran = $namafolder . basename($_FILES['filegbr']['name']);

            //mengupload gambar dan update row table database dengan path folder dan nama image
            if (move_uploaded_file($_FILES['filegbr']['tmp_name'], $lampiran)) {
                mysqli_query($conn, "INSERT INTO berita
                  (judul, headline,isi,tanggal,photo, admin_username )
                  VALUES ('$judul', '$headline','$isi','$tanggal_database','$lampiran','$admin_username')") or die(mysqli_error($conn));

                if (mysqli_affected_rows($conn) > 0) {
                    echo '<script>Swal.fire({
                        icon: "success",
                        title: "Data berhasil ditambahkan",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function(){
                        window.location="databerita.php";
                    });</script>';
                } else {
                    echo '<script> Swal.fire({
                        icon: "error",
                        title: "Data gagal ditambahkan"
                    });</script>';
                }
            } else {
                echo '<script> Swal.fire({
                    icon: "error",
                    title: "Upload gambar gagal"
                });</script>';
            }
        } else {
            echo '<script> Swal.fire({
                icon: "error",
                title: "Format gambar tidak sesuai (jpg, jpeg, gif, png)"
            });</script>';
        }
    } else {
        echo '<script> Swal.fire({
            icon: "error",
            title: "File gambar tidak ada"
        });</script>';
    }
}
?>

<!-- Tambahkan script JavaScript di bagian bawah halaman -->