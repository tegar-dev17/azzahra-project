<?php include '../koneksi.php' ?>
<?= include '../pages/headeradmin.php' ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Rumah Sakit Azzahra</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../inputdokter.php"><button type="button" class="btn btn-block btn-primary">Tambah Dokter</button></a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Dokter Rumah Sakit Azzahra</h3>
                            <li class=""><a href="printjadwal.php"><button type="button" class="btn btn-block btn-secondary">Print Jadwal</button></a></li>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Dokter</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Spesialis</th>
                                        <th>Status BPJS</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query_tampil = mysqli_query($conn, "SELECT * FROM dokter") or die(mysqli_error($conn));
                                    while ($data_rs = mysqli_fetch_assoc($query_tampil)) {
                                    ?>
                                        <tr>
                                            <td><?= $data_rs['id_dokter']; ?></td>
                                            <td><?= $data_rs['nama']; ?></td>
                                            <td><?= $data_rs['jk']; ?></td>
                                            <td><?= $data_rs['spesialis']; ?></td>
                                            <td><?= $data_rs['status']; ?></td>
                                            <td>
                                                <a href="editdokter.php?id-jadwal=<?= $data_rs['id_dokter']; ?>" class="btn btn-success">
                                                    edit</a> |
                                                <a href="../proses/deletedokter.php?id-jadwal=<?= $data_rs['id_dokter'];  ?>" class="btn btn-danger" onclick="return confirm('are you sure to delete this data? ?')">hapus</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <!-- <tfoot>
                                    <tr>
                                        <th>Rendering engine</th>
                                        <th>Browser</th>
                                        <th>Platform(s)</th>
                                        <th>Engine version</th>
                                        <th>CSS grade</th>
                                    </tr>
                                </tfoot> -->
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>