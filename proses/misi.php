<?php include '../pages/headeradmin.php'; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-danger">Mau rubah apa hari ini ?</h1>
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
                            <div class="card-body">
                                <textarea id="summernote" name="inputmisi">
                                            <?= $data_rs['misi']; ?>
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
<?php
if (isset($_POST['inputmisi'])) {
    $misi = $_POST['inputmisi'];

    $query_update = mysqli_query($conn, "UPDATE kerangka SET 
            misi='$misi'
            WHERE id=1") or die(mysqli_error($conn));

    if ($query_update) {
        echo '<script>alert("Berhasil Update Data");window.location="../admin/misi.php";</script>';
    } else {
        echo '<script>alert("Gagal Update Data");</script>';
    }
}
