<?php include 'pages/headeradmin2.php'; ?>
<?php
if (!isset($_GET['id-cakar'])) {
    echo '<script>window.location="admin/datacakar.php";</script>';
}
$id = $_GET['id-cakar'];
// Fungsi untuk mendapatkan data status lamaran
function getStatusLamaran($id)
{
    global $conn;
    $query = "SELECT
        sl.id AS status_lamaran_id,
        sl.status AS status_lamaran_status,
        c.id AS cakar_id,
        c.nama_loker AS cakar_nama_loker,
        c.no_ktp AS cakar_no_ktp,
        c.nama AS cakar_nama,
        c.tempat_lahir AS cakar_tempat_lahir,
        c.tanggal_lahir AS cakar_tanggal_lahir,
        c.jk AS cakar_jk,
        c.s_pernikahan AS cakar_s_pernikahan,
        c.tb AS cakar_tb,
        c.bb AS cakar_bb,
        c.no_hp AS cakar_no_hp,
        c.email AS cakar_email,
        c.street AS cakar_street,
        c.kabupaten AS cakar_kabupaten,
        c.kecamatan AS cakar_kecamatan,
        c.kelurahan AS cakar_kelurahan,
        c.provinsi AS cakar_provinsi,
        c.kode_pos AS cakar_kode_pos,
        c.pas_photo AS cakar_pas_photo,
        c.berkas AS cakar_berkas,
        c.pendidikan AS cakar_pendidikan
    FROM
        azzahra.status_lamaran sl
    JOIN
        azzahra.cakar c ON sl.id_cakar = c.id
    WHERE 
        c.id = '$id'";
    $result = mysqli_query($conn, $query);
    return $result;
}

// Pemanggilan fungsi getStatusLamaran
$query_tampil = getStatusLamaran($id);
$data_rs = mysqli_fetch_assoc($query_tampil);
?>
<div class="wrapper">
    <!-- Navbar -->
    <!-- /.navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DATA PELAMAR</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <a href="<?= $data_rs['cakar_pas_photo']; ?>" data-lightbox="profile-image">
                                        <img class="profile-user-img img-fluid img-circle" src="<?= $data_rs['cakar_pas_photo']; ?>" alt="User profile picture">
                                    </a>
                                </div>


                                <h3 class="profile-username text-center"><b><?= $data_rs['cakar_nama']; ?></b></h3>

                                <p class="text-muted text-center"><?= $data_rs['cakar_nama_loker']; ?></p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>NO KTP</b> <a class="float-right"><?= $data_rs['cakar_no_ktp']; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Email</b> <a class="float-right"><?= $data_rs['cakar_email']; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>NO HANDPHONE </b>
                                        <a class="float-right" href="https://wa.me/+62<?= $data_rs['cakar_no_hp']; ?>?text=Assalamualaikum%2FSelamat+sore%2C+kami+dari+pihak+Rumah+Sakit+Az-Zahra+mengundang+bapak%2Fibu+untuk+melakukan+pertemuan+pada%3A%0AHari+%3A+Selasa%2C+08+November+2023%0AJam+%3A+09.00+sd%2Fselesai%0ATempat+%3A+Rs.Az-Zahra+%28+tanya+bagian+pendaftaran%29%0A%0ANb%3A+menggunakan+pakaian+bebas+sopan%2C+membawa+pensil+dan+pena%0ATerimakasih" target="_blank">
                                            <i class="fab fa-whatsapp"></i> <?= $data_rs['cakar_no_hp']; ?>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Me</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i>PENDIDIKAN</strong>

                                <p class="text-muted">
                                    <?= $data_rs['cakar_pendidikan']; ?>
                                </p>

                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                                <p class="text-muted"><?= $data_rs['cakar_street']; ?>, <?= $data_rs['cakar_kelurahan']; ?>, <?= $data_rs['cakar_kecamatan']; ?>, <?= $data_rs['cakar_kabupaten']; ?>, <?= $data_rs['cakar_provinsi']; ?>, <?= $data_rs['cakar_kode_pos']; ?> </p>

                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                                <p class="text-muted">
                                    <span class="tag tag-danger">UI Design</span>
                                    <span class="tag tag-success">Coding</span>
                                    <span class="tag tag-info">Javascript</span>
                                    <span class="tag tag-warning">PHP</span>
                                    <span class="tag tag-primary">Node.js</span>
                                </p>

                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">DATA LENGKAP</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">BERKAS</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">STATUS LAMARAN</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <table id="example2" class="table table-bordered table-hover custom-table">
                                            <thead>
                                                <tr>
                                                    <th>Tempat Lahir</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Status Pernikahan</th>
                                                    <th>Tinggi Badan</th>
                                                    <th>Berat Badan</th>
                                                </tr>
                                            <tbody>
                                                <tr>
                                                    <td><?= $data_rs['cakar_tempat_lahir']; ?></td>
                                                    <td><?= $data_rs['cakar_tanggal_lahir']; ?></td>
                                                    <td><?= $data_rs['cakar_jk']; ?></td>
                                                    <td><?= $data_rs['cakar_s_pernikahan']; ?></td>
                                                    <td><?= $data_rs['cakar_tb']; ?> Cm</td>
                                                    <td><?= $data_rs['cakar_bb']; ?> Kg</td>
                                                </tr>
                                            </tbody>
                                            </thead>
                                        </table>
                                        <!-- /.post -->
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="timeline">
                                        <!-- The timeline -->
                                        <iframe src="<?= $data_rs['cakar_berkas']; ?>" width="100%" height="900px" style="border: none;"></iframe>
                                    </div>
                                    <!-- /.tab-pane -->

                                    <div class="tab-pane" id="settings">
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div class="active tab-pane" id="activity">
                                                    <table id="example2" class="table table-bordered table-hover custom-table">
                                                        <thead>
                                                            <tr>
                                                                <th>Loker</th>
                                                                <th>No Identitas</th>
                                                                <th>Nama</th>
                                                                <th>Status Lamaran</th>
                                                            </tr>
                                                        <tbody>
                                                            <tr>
                                                                <td><?= $data_rs['cakar_nama_loker']; ?></td>
                                                                <td><?= $data_rs['cakar_no_ktp']; ?></td>
                                                                <td><?= $data_rs['cakar_nama']; ?></td>
                                                                <td><?= $data_rs['status_lamaran_status']; ?></td>
                                                            </tr>
                                                        </tbody>
                                                        </thead>
                                                    </table>
                                                    <!-- /.post -->
                                                </div>
                                            </div>
                                            <!-- /.tab-pane -->
                                        </div>
                                        <!-- /.tab-content -->
                                    </div><!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</div>