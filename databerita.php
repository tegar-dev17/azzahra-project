<?php include 'pages/headeradmin2.php';
?>
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Berita</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Judul Berita</th>
                                        <th>Headline</th>
                                        <th>Tanggal Upload</th>
                                        <th>Photo</th>
                                        <th>Visitor</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query_tampil = mysqli_query($conn, "SELECT * FROM berita") or die(mysqli_error($conn));
                                    while ($data_rs = mysqli_fetch_assoc($query_tampil)) {
                                    ?>
                                        <tr>
                                            <td><?= $data_rs['judul']; ?></td>
                                            <td><?= $data_rs['headline']; ?></td>
                                            <td><?= date('Y-m-d H:i', strtotime($data_rs['tanggal'])); ?></td>
                                            <td><img src="<?= $data_rs['photo']; ?>" alt="Berita Photo" style="max-width: 100px; max-height: 100px;"></td>
                                            <td><?= $data_rs['jumlah_klik']; ?></td>
                                            <td>
                                                <a href="editberita.php?id-berita=<?= $data_rs['id_berita']; ?>" class="btn btn-success">Edit</a> |
                                                <a href="proses/deleteberita.php?id-berita=<?= $data_rs['id_berita']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data?')">Hapus</a>
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