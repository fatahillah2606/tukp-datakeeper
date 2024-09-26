<?php
// Proses login
if (isset($_POST["PenggunaBiasa"]) || isset($_POST["PenggunaAdmin"])) {
  session_start();

  require $_SERVER['DOCUMENT_ROOT'] . "/includes/db-connect.php";
  $akun = htmlspecialchars($_POST["akun"]);
  $userPasswd = htmlspecialchars($_POST["SandiUser"]);

  $sql = "";
  // Cek siapa yang login
  if (isset($_POST["PenggunaAdmin"])) {
    $sql = "SELECT id, id_user, email_user, nama_user, role, password FROM pengguna WHERE email_user = ? AND role = 'Admin'";
  } else if (isset($_POST["PenggunaBiasa"])) {
    $sql = "SELECT id, id_user, email_user, nama_user, role, password FROM pengguna WHERE id_user = ? AND role = 'User'";
  }

  // Verifikasi
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $akun);
  $stmt->execute();
  $stmt->bind_result($id, $nomorId, $emailPengguna, $namaPengguna, $peranPengguna, $passwd);
  $stmt->fetch();

  if ($passwd) {
    if (password_verify($userPasswd, $passwd)) {
      
      // jika berhasil, buat sesi dan cookie
      $_SESSION["user_id"] = $id;
      $_SESSION["nomor_id"] = $nomorId;
      $_SESSION["email_pengguna"] = $emailPengguna;
      $_SESSION["nama_pengguna"] = $namaPengguna;
      $_SESSION["peran_pengguna"] = $peranPengguna;
      $stmt->close();

      // Buat token untuk menyimpan cookie
      $token = bin2hex(random_bytes(16));
      $hashedToken = password_hash($token, PASSWORD_BCRYPT);

      // simpan ke database
      $sql = "UPDATE pengguna SET token_login = ? WHERE id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("si", $hashedToken, $id);
      $stmt->execute();

      setcookie("login", $id . ":" . $token, time() + (86400 * 30), "/"); //86400 sama dengan 1 hari, 86400 * 30 sama dengan 30 hari
      echo json_encode(["status" => "berhasil", "halaman" => "/pages/dashboard.php"]);

    } else {
      echo json_encode(["status" => "gagal", "pesan" => "Sandi salah, coba lagi", "elemen" => "#passwd"]);
    }
  } else {
    if (isset($_POST["PenggunaAdmin"])) {
      echo json_encode(["status" => "gagal", "pesan" => "Akun tidak tersedia", "elemen" => "#email"]);
    } else if (isset($_POST["PenggunaBiasa"])) {
      echo json_encode(["status" => "gagal", "pesan" => "Akun tidak tersedia", "elemen" => "#no-id"]);
    }
  }

  $stmt->close();
  $conn->close();
}

// Proses login untuk Tamu
if (isset($_GET["sandi"])) {
  require $_SERVER['DOCUMENT_ROOT'] . "/includes/db-connect.php";

  $sandi = htmlspecialchars($_GET["sandi"]);
  
  // Verifikasi
  $role = "Tamu";
  $sql = "SELECT id, id_user, email_user, nama_user, role, password FROM pengguna WHERE role = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $role);
  $stmt->execute();
  $stmt->bind_result($id, $nomorId, $emailPengguna, $namaPengguna, $peranPengguna, $passwd);
  $stmt->fetch();

  if ($passwd && password_verify($sandi, $passwd)) {
    
    // jika berhasil, buat sesi dan cookie
    $_SESSION["user_id"] = $id;
    $_SESSION["nomor_id"] = $nomorId;
    $_SESSION["email_pengguna"] = $emailPengguna;
    $_SESSION["nama_pengguna"] = $namaPengguna;
    $_SESSION["peran_pengguna"] = $peranPengguna;
    $stmt->close();

    // Buat token untuk menyimpan cookie
    $token = bin2hex(random_bytes(16));
    $hashedToken = password_hash($token, PASSWORD_BCRYPT);

    // simpan ke database
    $sql = "UPDATE pengguna SET token_login = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $hashedToken, $id);
    $stmt->execute();

    setcookie("login", $id . ":" . $token, time() + (86400 * 30), "/"); //86400 sama dengan 1 hari, 86400 * 30 sama dengan 30 hari

    header("Location: /pages/guest-dashboard.php");
    exit();
  } else {
    header("Location: /pages/users/login-guest.php?sandi=false");
    exit();
  }

  $stmt->close();
  $conn->close();
}
?>