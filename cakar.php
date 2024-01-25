<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | General Form Elements</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Navbar -->
    <nav class=" navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Home</a>
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
                            <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
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
                            <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
                            <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">MASUKKAN DATA DIRI ANDA</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Pilih LOWONGAN</label>
                                                <select name="nama_loker" id="nama_loker" class="form-control">
                                                    <?php
                                                    $query_karir = mysqli_query($conn, "SELECT * FROM karir") or die(mysqli_error($conn));
                                                    while ($data_rs = mysqli_fetch_assoc($query_karir)) {
                                                        echo "<option value='" . $data_rs['nama_loker'] . "'>" . $data_rs['nama_loker'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">NAMA</label>
                                                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">NO IDENTITAS</label>
                                                <input type="text" class="form-control" name="no_ktp" placeholder="Masukkan No KTP">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">TEMPAT LAHIR</label>
                                                <input type="text" class="form-control" name="tempatlahir" placeholder="Masukkan Tempat Lahir">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">TANGGAL LAHIR</label>
                                                <input type="date" class="form-control" name="tanggal_lahir">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">JENIS KELAMIN</label>
                                                <select class="form-control" id="jk" name="jk" required>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">TINGGI BADAN (cm)</label>
                                                <input type="text" class="form-control" name="tb" placeholder="Masukkan Tinggi Badan">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">BERAT BADAN (kg)</label>
                                                <input type="text" class="form-control" name="bb" placeholder="Masukkan Berat Badan">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">STATUS PERNIKAHAN</label>
                                                <select class="form-control" id="s_pernikahan" name="s_pernikahan" required>
                                                    <option value="Belum Menikah">Belum Menikah</option>
                                                    <option value="Sudah Menikah">Sudah Menikah</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">NO WHATSAPP</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">+628</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="no_hp" placeholder="Masukkan No WhatsApp">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">EMAIL</label>
                                                <input type="email" class="form-control" name="email" placeholder="Masukkan Email Aktif" value="@gmail.com">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword2">PENDIDIKAN</label>
                                                <input type="text" class="form-control" name="pendidikan" placeholder="Masukkan Pendidikan Terakhir">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail2">STREET</label>
                                                <textarea class="form-control" id="alamat" name="street" rows="3" placeholder="Masukkan Alamat"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword2">KELURAHAN</label>
                                                <input type="text" class="form-control" name="kelurahan" placeholder="Masukkan Kelurahan">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword2">KECAMATAN</label>
                                                <input type="text" class="form-control" name="kecamatan" placeholder="Masukkan Kecamatan">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword2">KABUPATEN</label>
                                                <input type="text" class="form-control" name="kabupaten" placeholder="Masukkan Kabupaten">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword2">PROVINSI</label>
                                                <?php include 'get_provinsi.php'; ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword2">KODE POS</label>
                                                <input type="text" class="form-control" name="kode_pos" placeholder="Masukkan Kode Pos">
                                            </div>
                                            <!-- <div class="form-group">
                                                <p>Pilih File Gambar : <br /><input type='file' name='filegbr' id='Filegambar'></p>
                                            </div> -->
                                            <div class="form-group">
                                                <label for="exampleInputFile2">PAS PHOTO</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="Filegambar" name="filegbr" onchange="previewImage(this)">
                                                        <label class="custom-file-label" for="exampleInputFile2">Pilih file</label>
                                                    </div>
                                                </div>
                                                <div id="imagePreview" style="margin-top: 10px;"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile2">BERKAS PENDUKUNG</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="exampleInputFile2" name="berkas">
                                                        <label class="custom-file-label" for="exampleInputFile2">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" value="simpan-data">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Control Sidebar -->
    <!-- /.control-sidebar -->
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
    <script>
        function previewImage(input) {
            var fileInput = input;
            var fileLabel = $(input).next('.custom-file-label');
            var preview = $('#imagePreview');

            // Reset the preview and label
            preview.empty();
            fileLabel.text('Pilih file');

            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    // Create an image element and set the source to the uploaded file
                    var image = $('<img>').attr('src', e.target.result).addClass('img-fluid').css({
                        'max-width': '150px', // Set the maximum width
                        'max-height': '150px' // Set the maximum height
                    });

                    // Append the image to the preview div
                    preview.append(image);
                    fileLabel.text(fileInput.files[0].name);
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    </script>
</body>

</html>
<?php
if (
    isset($_POST['nama_loker']) && isset($_POST['nama']) && isset($_POST['no_ktp']) && isset($_POST['tempatlahir']) && isset($_POST['tanggal_lahir']) && isset($_POST['jk'])
    && isset($_POST['tb']) && isset($_POST['bb']) && isset($_POST['s_pernikahan']) && isset($_POST['no_hp']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['street'])
    && isset($_POST['kelurahan']) && isset($_POST['kecamatan']) && isset($_POST['kabupaten']) && isset($_POST['provinsi']) && isset($_POST['kode_pos']) && isset($_POST['pendidikan'])
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
    $password = $_POST['password'];
    $street = $_POST['street'];
    $kelurahan = $_POST['kelurahan'];
    $kecamatan = $_POST['kecamatan'];
    $kabupaten = $_POST['kabupaten'];
    $provinsi = $_POST['provinsi'];
    $kode_pos = $_POST['kode_pos'];
    $pendidikan = $_POST['pendidikan'];
    $namafolder = "admin/gambar/"; // tempat menyimpan file

    // Pengecekan apakah no_ktp sudah ada dalam database
    $result = mysqli_query($conn, "SELECT * FROM cakar WHERE no_ktp = '$no_ktp'");
    if (mysqli_num_rows($result) > 0) {
        // Jika no_ktp sudah ada, tampilkan pesan pemberitahuan
        echo '<script>
            Swal.fire({
                title: "Oops!",
                text: "Nomor KTP sudah terdaftar.",
                icon: "warning",
                confirmButtonText: "OK"
            });
        </script>';
    } else {
        // Jika no_ktp belum ada, lanjutkan dengan upload dan insert data
        if (!empty($_FILES["filegbr"]["tmp_name"]) && !empty($_FILES["berkas"]["tmp_name"])) {
            $jenis_gambar = $_FILES['filegbr']['type']; // memeriksa format gambar
            $jenis_berkas = $_FILES['berkas']['type']; // memeriksa format berkas

            if (
                ($jenis_gambar == "image/jpeg" || $jenis_gambar == "image/jpg" || $jenis_gambar == "image/gif" || $jenis_gambar == "image/png") &&
                $jenis_berkas == "application/pdf"
            ) {
                $lampiran_gambar = $namafolder . basename($_FILES['filegbr']['name']);
                $lampiran_berkas = $namafolder . basename($_FILES['berkas']['name']);

                // mengupload gambar dan update row table database dengan path folder dan nama image
                if (
                    move_uploaded_file($_FILES['filegbr']['tmp_name'], $lampiran_gambar) &&
                    move_uploaded_file($_FILES['berkas']['tmp_name'], $lampiran_berkas)
                ) {
                    mysqli_query($conn, "INSERT INTO cakar
                        (nama_loker, no_ktp, nama, tempat_lahir, tanggal_lahir, tb, bb, jk, s_pernikahan, no_hp, email, password, street,
                        kabupaten, kecamatan, kelurahan, provinsi, kode_pos, pas_photo, berkas, pendidikan)
                        VALUES ('$nama_loker','$no_ktp','$nama','$tempatlahir', '$tanggal_lahir', '$tb', '$bb', '$jk', '$s_pernikahan',
                        '$no_hp', '$email', '$password', '$street', '$kabupaten', '$kecamatan', '$kelurahan', '$provinsi', '$kode_pos', '$lampiran_gambar', '$lampiran_berkas', '$pendidikan')") or die(mysqli_error($conn));

                    if (mysqli_affected_rows($conn) > 0) {
                        echo '<script>
                            Swal.fire({
                                title: "TERIMAKASIH TELAH MENDAFTAR!",
                                text: "ANDA AKAN DIHUBUNGI OLEH ADMIN",
                                icon: "success",
                                confirmButtonText: "OK"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location="logincakar.php";
                                }
                            });
                        </script>';
                    } else {
                        echo '<script>
                            Swal.fire({
                                title: "Oops!",
                                text: "Data gagal ditambahkan. Silakan coba lagi.",
                                icon: "error",
                                confirmButtonText: "OK"
                            });
                        </script>';
                    }
                }
            }
        }
    }
}
?>