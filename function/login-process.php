<?php
// Proses login untuk pengguna biasa
if (isset($_POST['login-user'])) {
  $userId = htmlspecialchars($_POST['no-id']);
  $userPasswd = htmlspecialchars($_POST['passwd']);
  // Verifikasi
  $userType = 'User';
  // Untuk pengetesan, hapus bagian ini jika verifikasi sudah dibuat
  $userName = $userId;
  // buat cookie
  setcookie("user-type", $userType, time() + (86400 * 30), "/"); //86400 sama dengan 1 hari, 86400 * 30 sama dengan 30 hari
  setcookie("user-name", $userName, time() + (86400 * 30), "/");
  // header("Location: /pages/dashboard.php");
  if (isset($_COOKIE["user-type"])) {
    // echo $_COOKIE["user-info"];
  }
  header("Location: /pages/dashboard.php");
  exit();
}

// Proses login untuk Admin
if (isset($_POST['login-admin'])) {
  $userId = htmlspecialchars($_POST['email']);
  $userPasswd = htmlspecialchars($_POST['passwd']);
  // Verifikasi
  $userType = 'Admin';
  // Untuk pengetesan, hapus bagian ini jika verifikasi sudah dibuat
  $userName = $userId;
  // buat cookie
  setcookie("user-type", $userType, time() + (86400 * 30), "/"); //86400 sama dengan 1 hari, 86400 * 30 sama dengan 30 hari
  setcookie("user-name", $userName, time() + (86400 * 30), "/");
  // header("Location: /pages/dashboard.php");
  if (isset($_COOKIE["user-type"])) {
    // echo $_COOKIE["user-info"];
  }
  header("Location: /pages/dashboard.php");
  exit();
}

?>