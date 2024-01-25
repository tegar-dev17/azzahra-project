<?php include '../koneksi.php'; ?>
<?php include '../pages/headeradmin.php';
?>
<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="text-danger">Masukkan Info Loker</h4>
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
                            <form method="post" action="">
                                <div class="form-group">
                                    <label>Masukkan Jenis Loker</label>
                                    <input type="text" class="form-control" name="nama_loker">
                                </div>
                                <div class="form-group">
                                    <label>Masukkan Jenjang Pendidikan</label>
                                    <input type="text" class="form-control" name="pendidikan">
                                </div>
                                <div class="form-group">
                                    <label>Masukkan Deskripsi</label>
                                    <input type="text" class="form-control" name="deskripsi">
                                </div>
                                <div class="form-group">
                                    <label>Masukkan Tanggal Penutupan</label>
                                    <input type="date" class="form-control" name="deadline">
                                </div>
                                <div class="card-body">
                                    <label>Masukkan Kualifikasi</label>
                                    <textarea id="summernote" name="kualifikasi">
                                            </textarea>
                                </div>
                                <div class="form-group">
                                    <label>Masukkan Alamat</label>
                                    <input type="text" class="form-control" name="alamat">
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
    <?php
    if (isset($_POST['nama_loker']) && isset($_POST['pendidikan']) && isset($_POST['deskripsi']) && isset($_POST['deadline']) && isset($_POST['kualifikasi']) && isset($_POST['alamat'])) {
        $loker = $_POST['nama_loker'];
        $pendidikan = $_POST['pendidikan'];
        $deskripsi = $_POST['deskripsi'];
        $deadline = $_POST['deadline'];
        $kualifikasi = $_POST['kualifikasi'];
        $alamat = $_POST['alamat'];

        $query_insert = mysqli_query($conn, "INSERT INTO karir (nama_loker, pendidikan, kualifikasi, deadline, deskripsi, alamat) VALUES ('$loker', '$pendidikan', '$kualifikasi', '$deadline', '$deskripsi', '$alamat')") or die(mysqli_error($conn));

        if (mysqli_affected_rows($conn) > 0) {
            echo '<script>
                    Swal.fire({
                        title: "Data berhasil Diinput",
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(function() {
                        window.location="datakarir.php";
                    });
                 </script>';
        } else {
            echo '<script>
                    Swal.fire({
                        title: "Data gagal Diinput",
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                 </script>';
        }
    }
    ?>