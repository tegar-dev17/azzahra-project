<?php
include 'koneksi.php';
include 'pages/headeradmin2.php';

if (!isset($_GET['id-ranap'])) {
    echo '<script>window.location="dataranap.php";</script>';
}

$id_ranap = $_GET['id-ranap'];

$query_ranap = mysqli_query($conn, "SELECT * FROM ranap WHERE id_ranap = '$id_ranap'")
    or die(mysqli_error($conn));
$data_ranap = mysqli_fetch_assoc($query_ranap);

?>
<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <!-- Form untuk update quantity -->
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Perbarui Jumlah Kamar</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form class="form-horizontal" method="post" action="">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="selected_tipe_kamar" class="col-sm-2 col-form-label">Pilih Tipe Kelas</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?= $data_ranap['type_kamar'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="previous_quantity" class="col-sm-2 col-form-label">Jumlah Kamar Saat Ini</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="previous_quantity" value="<?= $data_ranap['quantity'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tersedia" class="col-sm-2 col-form-label">Input Jumlah Kamar Baru</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="tersedia" name="tersedia" min="1" max="<?= $data_ranap['quantity'] ?>" placeholder="Masukkan jumlah kamar baru" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-success" name="update_quantity">Perbarui Jumlah Kamar</button>
                                    </div>
                                    <!-- /.card-footer -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php
if (isset($_POST['tersedia'])) {
    $tersedia = $_POST['tersedia'];

    // Validation to ensure "tersedia" does not exceed "quantity"
    if ($tersedia <= $data_ranap['quantity']) {
        $query_update = mysqli_query($conn, "UPDATE ranap SET 
            tersedia='$tersedia'
            WHERE id_ranap='$id_ranap'") or die(mysqli_error($conn));

        if ($query_update) {
            echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Berhasil Update Data",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location="dataranap.php";
                });
            </script>';
        } else {
            echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Gagal Update Data",
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>';
        }
    } else {
        echo '<script>
            Swal.fire({
                icon: "error",
                title: "Jumlah Yang dimasukkan harus lebih kecil dari jumlah kamar",
                showConfirmButton: false,
                timer: 3000
            });
        </script>';
    }
}
?>