<?php include '../pages/headeradmin.php'; ?>
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Loker Yang Tersedia</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Loker</th>
                                        <th>Pendidikan</th>
                                        <th>Deskripsi</th>
                                        <th>End Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query_tampil = mysqli_query($conn, "SELECT * FROM karir") or die(mysqli_error($conn));
                                    while ($data_rs = mysqli_fetch_assoc($query_tampil)) {
                                    ?>
                                        <tr>
                                            <td><?= $data_rs['nama_loker']; ?></td>
                                            <td><?= $data_rs['pendidikan']; ?></td>
                                            <td><?= $data_rs['deskripsi']; ?></td>
                                            <td><?= $data_rs['deadline']; ?></td>
                                            <td>
                                                <a href="editkarir.php?id-karir=<?= $data_rs['id']; ?>" class="btn btn-success">
                                                    edit</a> |
                                                <a href="../proses/deletekarir.php?id-karir=<?= $data_rs['id'];  ?>" class="btn btn-danger" onclick="return confirm('are you sure to delete this data? ?')">hapus</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>