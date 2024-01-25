<?php include '../koneksi.php' ?>
<?php include '../pages/headeradmin.php' ?>
<?php

if (!isset($_GET['id-jadwal'])) {
    echo '<script>window.location="jadwal.php";</script>';
}

$nik = $_GET['id-jadwal'];

$query_tampil = mysqli_query($conn, "SELECT * FROM jadwal_dokter WHERE nik = '$nik' ")
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
                                <input type="hidden" name="nik" value="<?= $data_rs['nik']; ?> ">
                                <div class="form-group">
                                    <label for="nama">Nama:</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $data_rs['nama']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="day">Hari:</label>
                                    <select class="form-control" id="day" name="day" required>
                                        <option value="Senin" <?php echo isset($data_rs) && $data_rs['day'] == 'Senin' ? 'selected' : ''; ?>>Senin</option>
                                        <option value="Selasa" <?php echo isset($data_rs) && $data_rs['day'] == 'Selasa' ? 'selected' : ''; ?>>Selasa</option>
                                        <option value="Rabu" <?php echo isset($data_rs) && $data_rs['day'] == 'Rabu' ? 'selected' : ''; ?>>Rabu</option>
                                        <option value="Kamis" <?php echo isset($data_rs) && $data_rs['day'] == 'Kamis' ? 'selected' : ''; ?>>Kamis</option>
                                        <option value="Jumat" <?php echo isset($data_rs) && $data_rs['day'] == 'Jumat' ? 'selected' : ''; ?>>Jumat</option>
                                        <option value="Sabtu" <?php echo isset($data_rs) && $data_rs['day'] == 'Sabtu' ? 'selected' : ''; ?>>Sabtu</option>
                                        <option value="Minggu" <?php echo isset($data_rs) && $data_rs['day'] == 'Minggu' ? 'selected' : ''; ?>>Minggu</option>
                                        <option value="Full Time" <?php echo isset($data_rs) && $data_rs['day'] == 'Full Time' ? 'selected' : ''; ?>>Full Time</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="start_time">Waktu Mulai:</label>
                                    <input type="time" class="form-control" id="start_time" name="start_time" value="<?php echo isset($data_rs) ? $data_rs['start_time'] : ''; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="end_time">Waktu Selesai:</label>
                                    <input type="time" class="form-control" id="end_time" name="end_time" value="<?php echo isset($data_rs) ? $data_rs['end_time'] : ''; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status:</label>
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="Iya" <?php echo isset($data_rs) && $data_rs['status'] == 'Iya' ? 'selected' : ''; ?>>Iya</option>
                                        <option value="Tidak" <?php echo isset($data_rs) && $data_rs['status'] == 'Tidak' ? 'selected' : ''; ?>>Tidak</option>
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
if (isset($_POST['nama']) && isset($_POST['day']) && isset($_POST['start_time']) && isset($_POST['end_time']) && isset($_POST['status'])) {
    $nama = $_POST['nama'];
    $day = $_POST['day'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $status = $_POST['status'];


    mysqli_query($conn, "UPDATE jadwal_dokter SET
    nama='$nama', 
    day='$day',
    start_time='$start_time',
    end_time='$end_time',
    status='$status'
    WHERE nik='$nik'") or die(mysqli_error($conn));
    if (mysqli_affected_rows($conn) > 0) {
        echo '<script>
            Swal.fire({
                title: "Data berhasil Diedit",
                icon: "success",
                confirmButtonText: "OK"
            }).then(function() {
                window.location="jadwal.php";
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
