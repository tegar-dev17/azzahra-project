<?php include '../koneksi.php'; ?>
<?php include '../pages/headeradmin.php' ?>
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
                            <label for="nama">Dokter:</label>
                            <select name="nama" id="nama" class="form-control">
                                <?php
                                $query_dokter = mysqli_query($conn, "SELECT * FROM dokter") or die(mysqli_error($conn));
                                while ($data_dokter = mysqli_fetch_assoc($query_dokter)) {
                                    echo "<option value='" . $data_dokter['nama'] . "'>" . $data_dokter['nama'] . "</option>";
                                }
                                ?>
                            </select>
                            <div class="form-group">
                                <label>Hari:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="senin" name="day[]" value="Senin">
                                    <label class="form-check-label" for="senin">Senin</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="selasa" name="day[]" value="Selasa">
                                    <label class="form-check-label" for="selasa">Selasa</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rabu" name="day[]" value="Rabu">
                                    <label class="form-check-label" for="rabu">Rabu</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="kamis" name="day[]" value="Kamis">
                                    <label class="form-check-label" for="kamis">Kamis</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="jumat" name="day[]" value="Jumat">
                                    <label class="form-check-label" for="jumat">Jumat</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="sabtu" name="day[]" value="Sabtu">
                                    <label class="form-check-label" for="sabtu">Sabtu</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="minggu" name="day[]" value="Minggu">
                                    <label class="form-check-label" for="minggu">Minggu</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="full-time" name="day[]" value="Full Time">
                                    <label class="form-check-label" for="full-time">Full Time</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="start_time">Waktu Mulai:</label>
                                <input type="time" class="form-control" id="start_time" name="start_time" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="end_time">Waktu Selesai:</label>
                                <input type="time" class="form-control" id="end_time" name="end_time" value="" required>
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
if (isset($_POST['nama']) && isset($_POST['day']) && isset($_POST['start_time']) && isset($_POST['end_time'])) {
    $nama = $_POST['nama'];
    $day = $_POST['day'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    // Ambil nilai checkbox dari formulir
    $selectedDays = isset($_POST['day']) ? $_POST['day'] : [];

    // Gabungkan nilai checkbox menjadi satu string (misalnya, "Senin,Selasa,Rabu")
    $selectedDaysString = implode(",", $selectedDays);

    // Lakukan sanitasi data sebelum menyimpan ke database
    $selectedDaysString = mysqli_real_escape_string($conn, $selectedDaysString);

    mysqli_query($conn, "INSERT INTO j_dokter
              (nama,day,start_time,end_time)
              VALUES ('$nama','$selectedDaysString','$start_time','$end_time')") or die(mysqli_error($conn));
    if (mysqli_affected_rows($conn) > 0) {
        echo '<script>
                Swal.fire({
                    title: "Data berhasil Diinput",
                    icon: "success",
                    confirmButtonText: "OK"
                }).then(function() {
                    window.location="jadwal.php";
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
