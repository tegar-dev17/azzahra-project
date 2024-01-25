<?php include '../koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | General Form Elements</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Your custom styles go here -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            margin-top: 20px;
        }

        .card-header {
            background-color: #007bff;
            color: #ffffff;
        }

        .card-footer {
            background-color: #007bff;
            color: #ffffff;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Navbar -->
    <nav class=" navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item d-none d-sm-inline-block">
                <a href="../index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>General Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">General Form</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">MASUKKAN DATA DIRI ANDA</h3>
                        </div>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nama_loker">Pilih LOWONGAN</label>
                                        <select name="nama_loker" id="nama_loker" class="form-control">
                                            <?php
                                            $query_karir = mysqli_query($conn, "SELECT * FROM karir") or die(mysqli_error($conn));
                                            while ($data_rs = mysqli_fetch_assoc($query_karir)) {
                                                echo "<option value='" . $data_rs['nama_loker'] . "'>" . $data_rs['nama_loker'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nama">NAMA</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap">
                                    </div>
                                    <div class="form-group">
                                        <label for="no_ktp">NO IDENTITAS</label>
                                        <input type="text" class="form-control" name="no_ktp" placeholder="Masukkan No KTP">
                                    </div>
                                    <div class="form-group">
                                        <label for="tempatlahir">TEMPAT LAHIR</label>
                                        <input type="text" class="form-control" name="tempatlahir" placeholder="Masukkan Tempat Lahir">
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_lahir">TANGGAL LAHIR</label>
                                        <input type="date" class="form-control" name="tanggal_lahir">
                                    </div>
                                    <div class="form-group">
                                        <label for="s_pernikahan">JENIS KELAMIN</label>
                                        <select class="form-control" id="s_pernikahan" name="s_pernikahan" required>
                                            <option value="Laki-Laki">Laki -Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tb">TINGGI BADAN (cm)</label>
                                        <input type="text" class="form-control" name="tb" placeholder="Masukkan Tinggi Badan">
                                    </div>
                                    <div class="form-group">
                                        <label for="bb">BERAT BADAN (kg)</label>
                                        <input type="text" class="form-control" name="bb" placeholder="Masukkan Berat Badan">
                                    </div>
                                    <div class="form-group">
                                        <label for="s_pernikahan">STATUS PERNIKAHAN</label>
                                        <select class="form-control" id="s_pernikahan" name="s_pernikahan" required>
                                            <option value="Belum Menikah">Belum Menikah</option>
                                            <option value="Sudah Menikah">Sudah Menikah</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_hp">NO WHATSAPP</label>
                                        <input type="text" class="form-control" name="no_hp" placeholder="Masukkan No WhatsApp">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">EMAIL</label>
                                        <input type="email" class="form-control" name="email" placeholder="Masukkan Email Aktif">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="alamat">STREET</label>
                                        <textarea class="form-control" id="alamat" name="street" rows="3" placeholder="Masukkan Alamat"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="kelurahan">KELURAHAN</label>
                                        <input type="text" class="form-control" name="kelurahan" placeholder="Masukkan Kelurahan">
                                    </div>
                                    <div class="form-group">
                                        <label for="kecamatan">KECAMATAN</label>
                                        <input type="text" class="form-control" name="kecamatan" placeholder="Masukkan Kecamatan">
                                    </div>
                                    <div class="form-group">
                                        <label for="kabupaten">KABUPATEN</label>
                                        <input type="text" class="form-control" name="kabupaten" placeholder="Masukkan Kabupaten">
                                    </div>
                                    <div class="form-group">
                                        <label for="provinsi">PROVINSI</label>
                                        <input type="text" class="form-control" name="provinsi" placeholder="Masukkan Provinsi">
                                    </div>
                                    <div class="form-group">
                                        <label for="kode_pos">KODE POS</label>
                                        <input type="text" class="form-control" name="kode_pos" placeholder="Masukkan Kode Pos">
                                    </div>
                                    <!-- Upload Gambar -->
                                    <div class="form-group">
                                        <label for="filegbr">Pilih File Gambar:</label>
                                        <input type="file" name="filegbr" id="filegbr" class="form-control-file">
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" value="simpan-data">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Control Sidebar -->
    <!-- /.control-sidebar -->
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
<?php
if (
    isset($_POST['nama_loker']) && isset($_POST['nama']) && isset($_POST['no_ktp']) && isset($_POST['tempatlahir']) && isset($_POST['tanggal_lahir'])
    && isset($_POST['jk']) && isset($_POST['tb']) && isset($_POST['bb']) && isset($_POST['s_pernikahan']) && isset($_POST['no_hp']) && isset($_POST['email']) && isset($_POST['street'])
    && isset($_POST['kelurahan']) && isset($_POST['kecamatan']) && isset($_POST['kabupaten']) && isset($_POST['provinsi']) && isset($_POST['kode_pos'])
) {
    $nama_loker = $_POST['nama_loker'];
    $nama = $_POST['nama'];
    $no_ktp = $_POST['no_ktp'];
    $tempatlahir = $_POST['tempatlahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jk = $_POST['jk'];
    $tb = $_POST['tb'];
    $bb = $_POST['bb'];
    $s_pernikahan = $_POST['s_pernikahan'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $street = $_POST['street'];
    $kelurahan = $_POST['kelurahan'];
    $kecamatan = $_POST['kecamatan'];
    $kabupaten = $_POST['kabupaten'];
    $provinsi = $_POST['provinsi'];
    $kode_pos = $_POST['kode_pos'];
    $namafolder = "admin/gambar/"; //tempat menyimpan file
    if (!empty($_FILES["filegbr"]["tmp_name"])) {
        $jenis_gambar = $_FILES['filegbr']['type']; //memeriksa format gambar
        if ($jenis_gambar == "image/jpeg" || $jenis_gambar == "image/jpg" || $jenis_gambar == "image/gif" || $jenis_gambar == "image/png") {
            $lampiran = $namafolder . basename($_FILES['filegbr']['name']);

            //mengupload gambar dan update row table database dengan path folder dan nama image
            if (move_uploaded_file($_FILES['filegbr']['tmp_name'], $lampiran))
                mysqli_query($conn, "INSERT INTO cakar
            (nama_loker,no_ktp,nama,tempat_lahir,tanggal_lahir,jk, s_pernikahan, tb, bb, no_hp, email, street,
            kabupaten, kecamatan, kelurahan, provinsi, kode_pos, pas_photo)
            VALUES ('$nama_loker','$no_ktp','$nama','$tempatlahir', '$tanggal_lahir', '$jk', '$s_pernikahan',
            '$tb', '$bb', '$no_hp', '$email', '$street', '$kabupaten', '$kecamatan', '$kelurahan', '$provinsi', '$kode_pos', '$pas_photo')") or die(mysqli_error($conn));
            if (mysqli_affected_rows($conn) > 0) {
                echo '<script>alert("Data berhasil ditambahkan");window.location="../index.php";</script>';
            } else {
                echo '<script>alert("Data gagal ditambahkan");</script>';
            }
        }
    }
}
