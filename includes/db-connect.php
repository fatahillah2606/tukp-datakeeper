<?php
// profile pengguna untuk akses database
$servername = "localhost";
$username = "andika";
$password = "CODOTERSNA29";
$dbname = "tukp_datakeeper";

// buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// cek koneksi
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}
?>