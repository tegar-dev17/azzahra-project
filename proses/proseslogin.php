<?php
include '../koneksi.php';

error_reporting();
session_start();

$username = $_POST['username'];
$pass = $_POST['password'];

$sql = "select * from admin where username='$username' AND password='$pass'";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['username'];
    header("Location: ../admin/admin.php");
    exit();
} else {
    header("Location: ../login.php ");
    echo "<script>alert('Username atau Password salah!');</script>";
}
