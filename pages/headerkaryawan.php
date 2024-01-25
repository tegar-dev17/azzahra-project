<?php
include 'koneksi.php';
// Periksa apakah hasil query tidak kosong
if (mysqli_num_rows($query_tampil) > 0) {
    $data_rs = mysqli_fetch_assoc($query_tampil);
} else {
    echo "Data tidak ditemukan";
}

// Periksa apakah pesan sudah ditampilkan sebelumnya
if (isset($_SESSION['alert_shown']) && $_SESSION['alert_shown']) {
    // Jangan tampilkan pesan lagi
    unset($_SESSION['alert_shown']);
} else {
    // Tampilkan formulir login atau pesan lainnya
}
$email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Editors</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <!-- CodeMirror -->
    <link rel="stylesheet" href="plugins/codemirror/codemirror.css">
    <link rel="stylesheet" href="plugins/codemirror/theme/monokai.css">
    <!-- SimpleMDE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simplemde/1.11.2/simplemde.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplemde/1.11.2/simplemde.min.js"></script>
    <!-- script untuk print -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-3B6NwesSXE7YJlcLI9RpRqGf2p/EgVH8BgoKTaUrmKNDkHPStTQ3EyoYjCGXaOTS" crossorigin="anonymous">
    <!-- SweetAlert2 CSS -->
    <!-- jQuery (pastikan versi terbaru) --
    <style>
        /* Gaya CSS opsional */
        body {
            font-family: Arial, sans-serif;
        }

        marquee {
            color: #007d00;
            font-size: 20px;
            white-space: nowrap;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <audio id="notificationSound">
            <source src="dogru-128492.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>


        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
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
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell fa-lg"></i>
                    <?php
                    // Query to get the count of notifications received today
                    $query_count = mysqli_query($conn, "SELECT COUNT(*) as count FROM notifikasi WHERE DATE(waktu_notifikasi) = CURDATE()") or die(mysqli_error($conn));
                    $data_count = mysqli_fetch_assoc($query_count);
                    $notification_count = $data_count['count'];
                    ?>
                    <span id="notification-badge" class="badge badge-warning navbar-badge font-size-xl"><?= $notification_count; ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="notification-dropdown">
                    <span class="dropdown-item dropdown-header">Pemberitahuan</span>

                    <!-- Tempat untuk memuat notifikasi -->
                    <div id="notification-content">
                        <!-- Notifikasi akan diperbarui menggunakan AJAX -->
                    </div>

                    <!-- Tambahkan link "See All Notifications" setelah semua notifikasi -->
                    <a href="admin/pesan.php" class="dropdown-item dropdown-footer">Lihat Seluruh Pesan</a>
                    <a href="#" class="dropdown-item dropdown-footer">Tandai Sudah Dibaca</a>
                </div>
            </li>
            <!-- ... -->
        </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    </div>
    <!-- jQuery -->
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <script src="dist/js/notifikasisweet.js"></script>

    <!-- CodeMirror -->
    <script src="plugins/codemirror/codemirror.js"></script>
    <script src="plugins/codemirror/mode/css/css.js"></script>
    <script src="plugins/codemirror/mode/xml/xml.js"></script>
    <script src="plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>

    <!-- Page specific script -->
    <script>
        $(document).ready(function() {
            // Summernote
            $('#summernote').summernote();

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });

            // bsCustomFileInput
            bsCustomFileInput.init();
        });
    </script>

    <!-- Additional scripts for image preview -->
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
                        'max-width': '600px', // Set the maximum width
                        'max-height': '400px' // Set the maximum height
                    });

                    // Append the image to the preview div
                    preview.append(image);
                    fileLabel.text(fileInput.files[0].name);
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    </script>

    <!-- DataTables and DataTables Buttons scripts -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Sertakan pustaka SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Notifikasi Script -->
    </body>

</html>