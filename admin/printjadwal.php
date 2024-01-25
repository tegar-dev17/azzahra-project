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
                            <h3 class="card-title">Data Jadwal Dokter</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="py-2 px-4">Nama</th>
                                        <th class="py-2">Jenis Kelamin</th>
                                        <th>Spesialis</th>
                                        <th>Hari</th>
                                        <th>Waktu Mulai</th>
                                        <th>Waktu Selesai</th>
                                        <th>Status BPJS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query_tampil = mysqli_query($conn, "SELECT dokter.nama, dokter.jk, dokter.spesialis, dokter.status, j_dokter.day, j_dokter.start_time, j_dokter.end_time
                                    FROM dokter
                                    JOIN j_dokter ON dokter.nama = j_dokter.nama;
                                    ") or die(mysqli_error($conn));
                                    while ($data_rs = mysqli_fetch_assoc($query_tampil)) {
                                    ?>
                                        <tr>
                                            <td><?= $data_rs['nama']; ?></td>
                                            <td><?= $data_rs['jk']; ?></td>
                                            <td><?= $data_rs['spesialis']; ?></td>
                                            <td><?= $data_rs['day']; ?></td>
                                            <td><?= $data_rs['start_time']; ?></td>
                                            <td><?= $data_rs['end_time']; ?></td>
                                            <td><?= $data_rs['status']; ?></td>
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
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>