<?php
require "../includes/db-connect.php";

// Proses login untuk pengguna biasa
if (isset($_POST["login-user"])) {
  $userId = htmlspecialchars($_POST["no-id"]);
  $userPasswd = htmlspecialchars($_POST["passwd"]);
  $userPasswd = md5($userPasswd);
  // Verifikasi
  $sql = "SELECT * FROM users WHERE id_user=$userId AND user_passwd='$userPasswd'";
  $hasil = $conn->query($sql);
  if ($hasil->num_rows > 0) {
    $data = $hasil->fetch_assoc();
    $userType = $data["role_user"];
    $userName = $data["nama_user"];
    // buat coockie
    setcookie("user-type", $userType, time() + (86400 * 30), "/"); //86400 sama dengan 1 hari, 86400 * 30 sama dengan 30 hari
    setcookie("user-name", $userName, time() + (86400 * 30), "/");
    setcookie("user-id", $userId, time() + (86400 * 30), "/");
    // Pindahkan pengguna ke halaman Dashboard
    header("Location: /pages/dashboard.php");
    exit();
  } else {
    // Kembalikan pengguna ke halaman login jika verifikasi gagal
    header("Location: /pages/dashboard.php");
    exit();
  }
  
}

// Proses login untuk Admin
if (isset($_POST["login-admin"])) {
  $userId = htmlspecialchars($_POST["email"]);
  $userPasswd = htmlspecialchars($_POST["passwd"]);
  $userPasswd = md5($userPasswd);
  // Verifikasi
  $sql = "SELECT * FROM users WHERE email_user='$userId' AND user_passwd='$userPasswd'";
  $hasil = $conn->query($sql);
  if ($hasil->num_rows > 0) {
    $data = $hasil->fetch_assoc();
    $userType =  $data["role_user"];
    $userName = $data["nama_user"];
    // buat cookie
    setcookie("user-type", $userType, time() + (86400 * 30), "/"); //86400 sama dengan 1 hari, 86400 * 30 sama dengan 30 hari
    setcookie("user-name", $userName, time() + (86400 * 30), "/");
    setcookie("user-id", $userId, time() + (86400 * 30), "/");
    // Pindahkan pengguna ke halaman Dashboard
    header("Location: /pages/dashboard.php");
    exit();
  } else {
    // Kembalikan pengguna ke halaman login jika verifikasi gagal
    header("Location: /pages/users/login-admin.php");
    exit();
  }
}

// Proses login untuk Tamu
if (isset($_POST["login-tamu"])) {
  // Verifikasi token
  verifToken(htmlspecialchars($_POST["token"]), $conn);
  
}

// Proses login tamu di luar halaman login
function verifToken($tokenValue, $connect){
  $token = $tokenValue;
  $token = md5($token);
  // Verifikasi
  $sql = "SELECT * FROM users WHERE user_passwd='$token'";
  $hasil = $connect->query($sql);
  if ($hasil->num_rows > 0) {
    $data = $hasil->fetch_assoc();
    $userType = $data["role_user"];
    // buat cookie
    setcookie("user-type", $userType, time() + (86400 * 30), "/"); //86400 sama dengan 1 hari, 86400 * 30 sama dengan 30 hari
    header("Location: /pages/guest-dashboard.php");
    exit();
  } else {
    header("Location: /users/login-guest.php");
    exit();
  }
}
?>