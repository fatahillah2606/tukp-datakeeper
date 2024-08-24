<?php
// connect database
require 'db-connect.php';
// Cek apakah pengguna belum login
if (!isset($_COOKIE['user-type'])) {
  header("Location: /");
  exit();
}
?>