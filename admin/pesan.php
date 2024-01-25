<?php include '../pages/headeradmin.php'; ?>

<!-- Tambahkan modal di luar loop -->
<div class="modal fade" id="pesanDetailModal" tabindex="-1" role="dialog" aria-labelledby="pesanDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pesanDetailModalLabel">Detail Pesan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="pesanDetailContent">
                <!-- Isi detail pesan akan ditampilkan di sini -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Pesan Hari Ini</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Pengirim</th>
                                        <th>Nomor Hape</th>
                                        <th>Pesan</th>
                                        <th>Action</th>
                                        <th>WhatsApp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    function limitWords($text, $limit)
                                    {
                                        $words = explode(" ", $text);
                                        if (count($words) > $limit) {
                                            $limitedWords = array_slice($words, 0, $limit);
                                            return implode(" ", $limitedWords) . '...';
                                        } else {
                                            return $text;
                                        }
                                    }
                                    $query_tampil = mysqli_query($conn, "SELECT * FROM pesan WHERE DATE(waktu_input) = CURDATE() ORDER BY waktu_input DESC") or die(mysqli_error($conn));
                                    while ($data_rs = mysqli_fetch_assoc($query_tampil)) {
                                    ?>
                                        <tr>
                                            <td><?= $data_rs['nama']; ?></td>
                                            <td><?= $data_rs['no_hp']; ?></td>
                                            <td><?= limitWords($data_rs['pesan'], 20); ?></td>
                                            <td>
                                                <!-- Tambahkan tombol untuk membuka modal -->
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#pesanDetailModal" data-pesan="<?= $data_rs['pesan']; ?>">
                                                    Lihat Detail
                                                </button>
                                            <td>
                                                <a href="https://wa.me/<?= '+62' . ltrim($data_rs['no_hp'], '0'); ?>" class="btn btn-success" target="_blank">
                                                    Balas via WhatsApp
                                                </a>
                                            </td>

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

<!-- Tambahkan script JavaScript untuk menangani modal -->
<script>
    $(document).ready(function() {
        // Tangkap event klik pada tombol detail
        $('#example2').on('click', 'button[data-target="#pesanDetailModal"]', function() {
            var pesanDetail = $(this).data('pesan'); // Ambil pesan dari atribut data-pesan
            $('#pesanDetailContent').text(pesanDetail); // Isi modal dengan pesan
        });
    });
</script>