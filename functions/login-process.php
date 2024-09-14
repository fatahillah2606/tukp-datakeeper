<?php

// Proses login untuk pengguna biasa
if (isset($_POST["PenggunaBiasa"])) {
  require "../includes/db-connect.php";
  $akun = htmlspecialchars($_POST["akun"]);
  $userPasswd = htmlspecialchars($_POST["SandiUser"]);

  // Verifikasi
  $sql = "SELECT 'id_user', 'nama_user', 'role', 'password' FROM pengguna WHERE 'id_user' = ? AND 'role' = 'user';";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $akun);
  $stmt->execute();
  $stmt->bind_result($userId, $userName, $userType, $passwd);
  $stmt->fetch();

  if ($passwd) {
    if (password_verify($userPasswd, $passwd)) {
      echo json_encode(["status" => "berhasil", "halaman" => "/pages/dashboard.php"]);
      // jika berhasil, buat coockie
      setcookie("user-type", $userType, time() + (86400 * 30), "/"); //86400 sama dengan 1 hari, 86400 * 30 sama dengan 30 hari
      setcookie("user-name", $userName, time() + (86400 * 30), "/");
      setcookie("user-id", $userId, time() + (86400 * 30), "/");
    } else {
      echo json_encode(["status" => "gagal", "pesan" => "Sandi salah, coba lagi", "elemen" => "#passwd"]);
    }
  } else {
    echo json_encode(["status" => "gagal", "pesan" => "Akun tidak tersedia", "elemen" => "#no-id"]);
  }

  $stmt->close();
  $conn->close();
}

// Proses login untuk Admin
if (isset($_POST["PenggunaAdmin"])) {
  require "../includes/db-connect.php";
  $akun = htmlspecialchars($_POST["akun"]);
  $userPasswd = htmlspecialchars($_POST["SandiUser"]);

  // Verifikasi
  $sql = "SELECT email_user, nama_user, role, password FROM pengguna WHERE email_user = ? AND role = 'admin';";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $akun);
  $stmt->execute();
  $stmt->bind_result($userId, $userName, $userType, $passwd);
  $stmt->fetch();

  if ($passwd) {
    if (password_verify($userPasswd, $passwd)) {
      echo json_encode(["status" => "berhasil", "halaman" => "/pages/dashboard.php"]);
      // jika berhasil, buat coockie
      setcookie("user-type", $userType, time() + (86400 * 30), "/"); //86400 sama dengan 1 hari, 86400 * 30 sama dengan 30 hari
      setcookie("user-name", $userName, time() + (86400 * 30), "/");
      setcookie("user-id", $userId, time() + (86400 * 30), "/");
    } else {
      echo json_encode(["status" => "gagal", "pesan" => "Sandi salah, coba lagi", "elemen" => "#passwd"]);
    }
  } else {
    echo json_encode(["status" => "gagal", "pesan" => "Akun tidak tersedia", "elemen" => "#email"]);
  }

  $stmt->close();
  $conn->close();
}

// Proses login untuk Tamu
if (isset($_POST["login-tamu"])) {
  // Verifikasi token
  verifToken(htmlspecialchars($_POST["token"]), $conn);
  
}

// Proses login tamu di luar halaman login
function verifToken($tokenValue, $connect){
  require "../includes/db-connect.php";
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
  $conn->close();
}
?>