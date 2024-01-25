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
                                    <label for="exampleInputFile2">FOTO RUANGAN</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="Filegambar" name="filegbr" onchange="previewImage(this)">
                                            <label class="custom-file-label" for="exampleInputFile2">Pilih file</label>
                                        </div>
                                    </div>
                                    <div id="imagePreview" style="margin-top: 10px;"></div>
                                </div>
                                <div class="form-group">
                                    <label>Tipe Kelas</label>
                                    <select id="pilihWarna" name="type_kamar" class="form-control">
                                        <option value="VVIP">VVIP</option>
                                        <option value="VIP">VIP</option>
                                        <option value="KELAS 1">KELAS 1</option>
                                        <option value="KELAS 2">KELAS 2</option>
                                        <option value="KELAS 3">KELAS 3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Pilih Jumlah Kamar</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="quantity" name="quantity" min="1" placeholder="Masukkan jumlah kamar" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Kamar</span>
                                        </div>
                                    </div>
                                    <small class="form-text text-muted">Masukkan jumlah kamar yang diinginkan.</small>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Update</label>
                                    <?php
                                    $waktu_sekarang = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
                                    $formatted_time = $waktu_sekarang->format('Y-m-d\TH:i');
                                    ?>
                                    <input type="datetime-local" class="form-control" name="last_update" value="<?= $formatted_time; ?>" readonly>
                                </div>
                                <div class="card-body">
                                    <label>Masukkan Deskripsi Tipe Kelas</label>
                                    <textarea id="summernote" name="deskripsi">
                                            </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="price">Harga</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="text" class="form-control" id="price" name="price" placeholder="Masukkan harga" aria-label="Amount (to the nearest rupiah)" autocomplete="off" data-type="currency" pattern="^\Rp\d{1,3}(.\d{3})*?(\,\d{0,2})?$" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
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
if (isset($_POST['type_kamar']) && isset($_POST['quantity']) && isset($_POST['last_update']) && isset($_POST['deskripsi']) && isset($_POST['price'])) {
    $type_kamar = $_POST['type_kamar'];
    $quantity = $_POST['quantity'];
    $last_update = $_POST['last_update'];
    $deskripsi = $_POST['deskripsi'];
    $price = $_POST['price'];


    // Ubah format tanggal untuk dlast_updatempan dalam database (tanpa detik)
    $tanggal_database = date('Y-m-d H:i', strtotime($last_update));

    $namafolder = "admin/gambar/"; //folder tempat menyimpan file
    if (!empty($_FILES["filegbr"]["tmp_name"])) {
        $jenis_gambar = $_FILES['filegbr']['type']; //memeriksa format gambar
        if ($jenis_gambar == "image/jpeg" || $jenis_gambar == "image/jpg" || $jenis_gambar == "image/gif" || $jenis_gambar == "image/png") {
            $lampiran = $namafolder . basename($_FILES['filegbr']['name']);

            //mengupload gambar dan update row table database dengan path folder dan nama image
            if (move_uploaded_file($_FILES['filegbr']['tmp_name'], $lampiran)) {
                mysqli_query($conn, "INSERT INTO ranap
                  (type_kamar, quantity,last_update,deskripsi,price, foto )
                  VALUES ('$type_kamar', '$quantity','$tanggal_database','$deskripsi','$price','$lampiran')") or die(mysqli_error($conn));

                if (mysqli_affected_rows($conn) > 0) {
                    echo '<script>alert("Data berhasil ditambahkan");window.location="databerita.php";</script>';
                } else {
                    echo '<script>alert("Data gagal ditambahkan");</script>';
                }
            } else {
                echo '<script>alert("Upload gambar gagal");</script>';
            }
        } else {
            echo '<script>alert("Format gambar tidak sesuai (jpg, jpeg, gif, png)");</script>';
        }
    } else {
        echo '<script>alert("File gambar tidak ada");</script>';
    }
}
?>

<!-- Tambahkan script JavaScript di bagian bawah halaman -->