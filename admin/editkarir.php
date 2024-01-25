<?php include '../koneksi.php'; ?>
<?php include '../pages/headeradmin.php';

if (!isset($_GET['id-karir'])) {
    echo '<script>window.location="datakarir.php";</script>';
}

$id = $_GET['id-karir'];

$query_tampil = mysqli_query($conn, "SELECT * FROM karir WHERE id = '$id' ")
    or die(mysqli_error($conn));
$data_rs = mysqli_fetch_assoc($query_tampil);
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
                                    <input type="text" class="form-control" name="nama_loker" value="<?= $data_rs['nama_loker']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Masukkan Jenjang Pendidikan</label>
                                    <input type="text" class="form-control" name="pendidikan" value="<?= $data_rs['pendidikan']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Masukkan Deskripsi</label>
                                    <input type="text" class="form-control" name="deskripsi" value="<?= $data_rs['deskripsi']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Masukkan Tanggal Penutupan</label>
                                    <input type="date" class="form-control" name="deadline" value="<?= $data_rs['deadline']; ?>">
                                </div>
                                <div class="card-body">
                                    <label>Masukkan Kualifikasi</label>
                                    <textarea id="summernote" name="kualifikasi">
                                    <?= $data_rs['kualifikasi']; ?>
                                            </textarea>
                                </div>
                                <div class="form-group">
                                    <label>Masukkan Alamat</label>
                                    <input type="text" class="form-control" name="alamat" value="<?= $data_rs['alamat']; ?>">
                                </div>
                                <button type="submit" class="btn btn-block btn-success" name="simpan-data">Update</button>
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

        $query_update = mysqli_query($conn, "UPDATE karir SET
        nama_loker='$loker', 
        pendidikan='$pendidikan',
        kualifikasi='$kualifikasi',
        deadline='$deadline',
        deskripsi='$deskripsi',
        alamat = '$alamat'
        WHERE id='$id'") or die(mysqli_error($conn));
        if (mysqli_affected_rows($conn) > 0) {
            echo '<script>
                Swal.fire({
                    title: "Data berhasil Diedit",
                    icon: "success",
                    confirmButtonText: "OK"
                }).then(function() {
                    window.location="datakarir.php";
                });
             </script>';
        } else {
            echo '<script>
                Swal.fire({
                    title: "Data gagal Diedit",
                    icon: "error",
                    confirmButtonText: "OK"
                });
             </script>';
        }
    }
