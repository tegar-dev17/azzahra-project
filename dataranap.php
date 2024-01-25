<?php include 'pages/headeradmin2.php'; ?>
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
                                        <th>Tipe Kelas</th>
                                        <th>Jumlah Kamar</th>
                                        <th>Kamar Tersedia</th>
                                        <th>Update</th>
                                        <th>Harga</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query_ranap = mysqli_query($conn, "SELECT * FROM ranap") or die(mysqli_error($conn));
                                    while ($data_ranap = mysqli_fetch_assoc($query_ranap)) {
                                    ?>
                                        <tr>
                                            <td><?= $data_ranap['type_kamar']; ?></td>
                                            <td><?= $data_ranap['quantity']; ?></td>
                                            <td><?= $data_ranap['tersedia']; ?></td>
                                            <td><?= $data_ranap['last_update']; ?></td>
                                            <td><?= $data_ranap['price']; ?></td>
                                            <td>
                                                <a href="editranap.php?id-ranap=<?= $data_ranap['id_ranap']; ?>" class="btn btn-success">
                                                    Update Kamar
                                                </a>
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