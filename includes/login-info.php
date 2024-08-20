<?php
// Cek apakah pengguna sudah login
if (!isset($_COOKIE['user-type'])) {
  header("Location: /");
  exit();
}
?>