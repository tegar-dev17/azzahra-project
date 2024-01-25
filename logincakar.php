<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <b class="text-danger text-bold">E-RECRUITMENT</b><br>
            <a href="index2.html"><b>Rumah Sakit</b> AZ-ZAHRA</a>

        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Masukkan Email Dan Password Yang Digunakan Untuk Mendaftar</p>

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" autocomplete="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="current-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-danger btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center mb-3">
                </div>
                <!-- /.social-auth-links -->
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>
<?php
include 'koneksi.php';
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM cakar WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if ($result) {
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);

        if ($password === $row['password']) {
            // Password benar, lakukan proses login
            $_SESSION['email'] = $row['email'];

            echo "<script>
                      Swal.fire({
                          icon: 'success',
                          title: 'Login berhasil!',
                          showConfirmButton: false,
                          timer: 1500
                      }).then(function(){
                          window.location.href = 'profilkaryawan.php'; // Ganti dengan halaman tujuan setelah login berhasil
                      });
                    </script>";
            exit();
        } else {
            // Password salah
            echo "<script>
                      Swal.fire({
                          icon: 'error',
                          title: 'Login gagal',
                          text: 'Password salah',
                          confirmButtonText: 'OK'
                      }).then(function(){
                          // Tidak perlu mengarahkan ke halaman login karena email sudah diidentifikasi
                      });
                    </script>";
        }
    } else {

        // Unset variabel session
        unset($_SESSION['alert_shown']);
    }
} else {
    // Query error
    echo "Error: " . mysqli_error($conn);
}
?>