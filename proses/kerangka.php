<?php include '../pages/headeradmin.php'; ?>
<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="text-danger">mau rubah apa hari ini ?</h4>
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
                                    <label>Title Website</label>
                                    <input type="text" class="form-control" name="inputtitle" value="<?= $data_rs['title']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Departemen</label>
                                    <input type="text" class="form-control" name="inputjudul" value="<?= $data_rs['judul']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nama Departemen</label>
                                    <input type="text" class="form-control" name="inputjudul1" value="<?= $data_rs['judul1']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Copyright</label>
                                    <input type="text" class="form-control" name="inputcopyright" value="<?= $data_rs['copright']; ?>">
                                </div>
                                <div class="card-body">
                                    <textarea id="summernote" name="inputtentang">
                                            <?= $data_rs['tentang']; ?>
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
    if (isset($_POST['inputtitle']) && isset($_POST['inputjudul']) && isset($_POST['inputjudul1']) && isset($_POST['inputcopyright']) && isset($_POST['inputtentang'])) {
        $title = $_POST['inputtitle'];
        $judul = $_POST['inputjudul'];
        $judul1 = $_POST['inputjudul1'];
        $copyright = $_POST['inputcopyright'];
        $tentang = $_POST['inputtentang'];

        $query_update = mysqli_query($conn, "UPDATE kerangka SET 
            title='$title',
            judul='$judul',
            judul1='$judul1',
            copright='$copyright',
            tentang='$tentang'
            WHERE id=1") or die(mysqli_error($conn));

        if ($query_update) {
            echo '<script>alert("Berhasil Update Data");window.location="../admin/kerangka.php";</script>';
        } else {
            echo '<script>alert("Gagal Update Data");</script>';
        }
    }
