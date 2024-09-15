<?php
// Cek apakah sudah login
if (isset($_COOKIE['user-type'])) {
  header("Location: /pages/dashboard.php");
  exit();
}

// Reset Sandi
if (isset($_POST['ResetSandi'])) {
  require '../../includes/db-connect.php';
  $namaPengguna = htmlspecialchars($_POST['nama-user']);

  $sql = "INSERT INTO reset_sandi (`id`, `cari_pengguna`, `dibaca`) VALUES (null, ?, 0)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $namaPengguna);
  $stmt->execute();

  $stmt->close();
  $conn->close();
}
?>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | TUKP Data Keeper</title>
    <link rel="stylesheet" href="/assets/css/login.css" />
  </head>
  <body>
    <div class="konten">
      <img src="/assets/images/logo.svg" alt="Logo" class="logo" />
      <div class="main-cont">
        <div class="left-cont">
          <h1>Reset sandi</h1>
          <p>Pengajuan reset sandi berhasil terkirim. Silahkan tunggu kabar dari Admin</p>
        </div>
      </div>
      <div class="buttons">
        <a href="/">Kembali ke halaman utama</a>
      </div>
    </div>
    <script src="/assets/js/login.js"></script>
  </body>
</html>
