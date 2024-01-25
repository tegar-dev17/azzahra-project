<!-- Form Input Data -->
<?php include 'pages/headeradmin2.php' ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="text-success">Ini adalah Settingan Website kamu sekarang!</h4>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="id_dokter">ID DOKTER:</label>
                                <input type="text" class="form-control" name="id_dokter" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Dokter:</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin:</label>
                                <select class="form-control" id="jk" name="jk" required>
                                    <option value="Laki-Laki">Laki Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="spesialis">Spesialis:</label>
                                <select class="form-control" id="spesialis" name="spesialis" required>
                                    <option value="Kandungan">Kandungan</option>
                                    <option value="Penyakit Dalam">Penyakit Dalam</option>
                                    <option value="Anak">Anak</option>
                                    <option value="Bedah">Bedah</option>
                                    <option value="Paru-Paru">Paru-Paru</option>
                                    <option value="Gigi">Gigi</option>
                                    <option value="THT">THT</option>
                                    <option value="Kulit Kelamin">Kulit & Kelamin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status BPJS</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="YA">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <p>Pilih File Gambar : <br /><input type='file' name='filegbr' id='Filegambar'></p>

                            </div>
                            <button type="submit" name="simpan-data" class="btn btn-primary"> Tambah Data
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- /.col-->
</div>

<?php
if (isset($_POST['id_dokter']) && isset($_POST['nama']) && isset($_POST['jk']) && isset($_POST['spesialis']) && isset($_POST['status'])) {
    $id_dokter = $_POST['id_dokter'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $spesialis = $_POST['spesialis'];
    $status = $_POST['status'];
    $namafolder = "admin/gambar/"; //folder tempat menyimpan file
    if (!empty($_FILES["filegbr"]["tmp_name"])) {
        $jenis_gambar = $_FILES['filegbr']['type']; //memeriksa format gambar
        if ($jenis_gambar == "image/jpeg" || $jenis_gambar == "image/jpg" || $jenis_gambar == "image/gif" || $jenis_gambar == "image/png") {
            $lampiran = $namafolder . basename($_FILES['filegbr']['name']);

            //mengupload gambar dan update row table database dengan path folder dan nama image
            if (move_uploaded_file($_FILES['filegbr']['tmp_name'], $lampiran))
                mysqli_query($conn, "INSERT INTO dokter
              (id_dokter, nama,jk,spesialis,status, image)
              VALUES ('$id_dokter', '$nama','$jk','$spesialis','$status','$lampiran')") or die(mysqli_error($conn));
            if (mysqli_affected_rows($conn) > 0) {
                echo '<script>alert("Data berhasil ditambahkan");window.location="admin/dokter.php";</script>';
            } else {
                echo '<script>alert("Data gagal ditambahkan");</script>';
            }
        }
    }
}
