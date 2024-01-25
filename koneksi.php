<?php
$server = "localhost";
$username = "root";
$pass = "";
$database = "azzahra";

$conn = mysqli_connect($server, $username, $pass, $database);
if (!$conn) {
    die("koneksi ke database gagal: " . mysqli_connect_error());
}
