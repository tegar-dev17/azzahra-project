<?php include '../koneksi.php' ?>
<?php include '../pages/headeradmin.php' ?>
<?php

if (!isset($_GET['id-jadwal'])) {
    echo '<script>window.location="jadwal.php";</script>';
}

$id_dokter = $_GET['id-jadwal'];

$query_tampil = mysqli_query($conn, "SELECT * FROM dokter WHERE id_dokter = '$id_dokter' ")
    or die(mysqli_error($conn));
$data_rs = mysqli_fetch_assoc($query_tampil);
?>
?>
<!-- Form Input Data -->
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
                        <form method="post" action="">
                            <!-- Form Input Data -->
                            <form method="post" action="">
                                <div class="form-group">
                                    <label for="nama">NIK:</label>
                                    <input type="text" class="form-control" id="id_dokter" name="id_dokter" value="<?= $data_rs['id_dokter']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Dokter:</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $data_rs['nama']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="jk">Hari:</label>
                                    <select class="form-control" id="jk" name="jk" required>
                                        <option value="Laki-Laki" <?php echo isset($data_rs) && $data_rs['jk'] == 'Laki-Laki' ? 'selected' : ''; ?>>Laki-Laki</option>
                                        <option value="Perempuan" <?php echo isset($data_rs) && $data_rs['jk'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="spesialis">Spesialis:</label>
                                    <select class="form-control" id="spesialis" name="spesialis" required>
                                        <option value="Kandungan" <?php echo isset($data_rs) && $data_rs['spesialis'] == 'Kandungan' ? 'selected' : ''; ?>>Kandungan</option>
                                        <option value="Penyakitdalam" <?php echo isset($data_rs) && $data_rs['spesialis'] == 'Penyakitdalam' ? 'selected' : ''; ?>>Penyakit Dalam</option>
                                        <option value="Anak" <?php echo isset($data_rs) && $data_rs['spesialis'] == 'Anak' ? 'selected' : ''; ?>>Anak</option>
                                        <option value="Bedah" <?php echo isset($data_rs) && $data_rs['spesialis'] == 'Bedah' ? 'selected' : ''; ?>>Bedah</option>
                                        <option value="Paru-Paru" <?php echo isset($data_rs) && $data_rs['spesialis'] == 'Paru-Paru' ? 'selected' : ''; ?>>Paru-Paru</option>
                                        <option value="Gigi" <?php echo isset($data_rs) && $data_rs['spesialis'] == 'Gigi' ? 'selected' : ''; ?>>Gigi</option>
                                        <option value="THT" <?php echo isset($data_rs) && $data_rs['spesialis'] == 'THT' ? 'selected' : ''; ?>>THT</option>
                                        <option value="KulitKelamin" <?php echo isset($data_rs) && $data_rs['spesialis'] == 'KulitKelamin' ? 'selected' : ''; ?>>Kulit & Kelamin</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status:</label>
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="YA" <?php echo isset($data_rs) && $data_rs['status'] == 'YA' ? 'selected' : ''; ?>>Ya</option>
                                        <option value="TIDAK" <?php echo isset($data_rs) && $data_rs['status'] == 'TIDAK' ? 'selected' : ''; ?>>Tidak</option>
                                    </select>
                                </div>
                                <td>
                                    <button type="submit" name="simpan-data" class="btn btn-success">Update</button>
                                </td>
                            </form>

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


    mysqli_query($conn, "UPDATE dokter SET
    id_dokter='$id_dokter',
    nama='$nama', 
    jk='$jk',
    spesialis='$spesialis',
    status='$status'
    WHERE id_dokter='$id_dokter'") or die(mysqli_error($conn));
    if (mysqli_affected_rows($conn) > 0) {
        echo '<script>
                Swal.fire({
                    title: "Data berhasil Diedit",
                    icon: "success",
                    confirmButtonText: "OK"
                }).then(function() {
                    window.location="dokter.php";
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
