<?php include '../koneksi.php' ?>
<?= include '../pages/headeradmin.php' ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DataTables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inputjadwal.php"><button type="button" class="btn btn-block btn-primary">Tambah Jadwal</button></a></li>
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
                            <h3 class="card-title">DataTable with default features</h3>
                            <li class="breadcrumb-item"><a href="printjadwal.php"><button type="button" class="btn btn-block btn-secondary">Print Jadwal</button></a></li>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Spesialis</th>
                                        <th>Hari</th>
                                        <th>Waktu Mulai</th>
                                        <th>Waktu Selesai</th>
                                        <th>Status BPJS</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query_tampil = mysqli_query($conn, "SELECT dokter.nama, dokter.spesialis, dokter.status, j_dokter.day, j_dokter.start_time, j_dokter.end_time
                                    FROM dokter
                                    JOIN j_dokter ON dokter.nama = j_dokter.nama;
                                    ") or die(mysqli_error($conn));
                                    while ($data_rs = mysqli_fetch_assoc($query_tampil)) {
                                    ?>
                                        <tr>
                                            <td><?= $data_rs['nama']; ?></td>
                                            <td><?= $data_rs['spesialis']; ?></td>
                                            <td><?= $data_rs['day']; ?></td>
                                            <td><?= $data_rs['start_time']; ?></td>
                                            <td><?= $data_rs['end_time']; ?></td>
                                            <td><?= $data_rs['status']; ?></td>
                                            <td>
                                                <a href="editjadwal.php?id-jadwal=<?= $data_rs['nik']; ?>" class="btn btn-success">
                                                    edit</a> |
                                                <a href="../proses/deletejadwal.php?id-jadwal=<?= $data_rs['nama'];  ?>" class="btn btn-danger" onclick="return confirm('are you sure to delete this data? ?')">hapus</a>
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