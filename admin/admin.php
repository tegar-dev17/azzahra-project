<?php
// Koneksi ke database
include '../koneksi.php';

// Fungsi untuk mendapatkan alamat IP pengunjung
function get_client_ip()
{
  $ipaddress = '';
  if (getenv('HTTP_CLIENT_IP'))
    $ipaddress = getenv('HTTP_CLIENT_IP');
  else if (getenv('HTTP_X_FORWARDED_FOR'))
    $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
  else if (getenv('HTTP_X_FORWARDED'))
    $ipaddress = getenv('HTTP_X_FORWARDED');
  else if (getenv('HTTP_FORWARDED_FOR'))
    $ipaddress = getenv('HTTP_FORWARDED_FOR');
  else if (getenv('HTTP_FORWARDED'))
    $ipaddress = getenv('HTTP_FORWARDED');
  else if (getenv('REMOTE_ADDR'))
    $ipaddress = getenv('REMOTE_ADDR');
  else
    $ipaddress = 'UNKNOWN';
  return $ipaddress;
}

// Mendapatkan alamat IP pengunjung
$ip_address = get_client_ip();

// Mendapatkan tanggal hari ini
$date_visited = date('Y-m-d');

// Memeriksa apakah pengunjung dengan alamat IP yang sama sudah mengunjungi hari ini
$query_check = "SELECT * FROM visitor_count WHERE ip_address = '$ip_address' AND date_visited = '$date_visited'";
$result_check = mysqli_query($conn, $query_check);

if (mysqli_num_rows($result_check) == 0) {
  // Jika belum ada entri untuk pengunjung ini hari ini, tambahkan satu entri baru
  $query_insert = "INSERT INTO visitor_count (ip_address, date_visited) VALUES ('$ip_address', '$date_visited')";
  $result_insert = mysqli_query($conn, $query_insert);

  if (!$result_insert) {
    die("Query error: " . mysqli_error($conn));
  }
}

// Menampilkan jumlah pengunjung hari ini
$query_count = "SELECT COUNT(DISTINCT ip_address) as visitor_count FROM visitor_count WHERE date_visited = '$date_visited'";
$result_count = mysqli_query($conn, $query_count);

if ($result_count) {
  $row_count = mysqli_fetch_assoc($result_count);
  $total_visitors = $row_count['visitor_count'];
} else {
  die("Query error: " . mysqli_error($conn));
}

$query_total = "SELECT MONTH(date_visited) AS bulan, COUNT(*) AS total_rows FROM visitor_count WHERE YEAR(date_visited) = YEAR(CURDATE()) GROUP BY bulan ORDER BY bulan";
$result_total = mysqli_query($conn, $query_total);

if ($result_total) {
  $row_total = mysqli_fetch_assoc($result_total);
  $total = $row_total['total_rows'];
} else {
  die("Query error: " . mysqli_error($conn));
}



include '../pages/headeradmin.php'; ?>
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <div id="time"></div>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?= $total_visitors; ?></h3>

                <p>Total Pengunjung Hari Ini</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $total; ?></h3>

                <p>Total Pengunjung Bulan Ini</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <?php
        // Mengambil data pengunjung untuk grafik
        $query_chart = "SELECT MONTH(date_visited) AS bulan, COUNT(DISTINCT ip_address) AS jumlah_pengunjung FROM visitor_count WHERE YEAR(date_visited) = YEAR(CURDATE()) GROUP BY bulan ORDER BY bulan";
        $result_chart = mysqli_query($conn, $query_chart);

        if ($result_chart) {
          $data_chart = array();
          while ($row_chart = mysqli_fetch_assoc($result_chart)) {
            $data_chart[] = array('bulan' => $row_chart['bulan'], 'jumlah_pengunjung' => $row_chart['jumlah_pengunjung']);
          }
        } else {
          die("Query error: " . mysqli_error($conn));
        }
        ?>

        <div style="width: 80%; margin: auto;">
          <canvas id="visitorChart"></canvas>
        </div>

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4/dist/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE -->
        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3/dist/js/adminlte.min.js"></script>
        <!-- Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3/dist/chart.min.js"></script>

        <script>
          // Mengambil data dari PHP dan mengonversi ke format yang dapat digunakan oleh Chart.js
          var chartData = <?php echo json_encode($data_chart); ?>;
          var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

          // Menyiapkan data untuk grafik
          var labels = chartData.map(entry => monthNames[entry.bulan - 1]); // Menggunakan bulan - 1 karena indeks dimulai dari 0 di JavaScript
          var data = chartData.map(entry => entry.jumlah_pengunjung);

          // Menggambar grafik dengan Chart.js
          var ctx = document.getElementById('visitorChart').getContext('2d');
          var visitorChart = new Chart(ctx, {
            type: 'bar',
            data: {
              labels: labels,
              datasets: [{
                label: 'Jumlah Pengunjung',
                data: data,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
              }]
            },
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          });
        </script>