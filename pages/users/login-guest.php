<?php
// Cek apakah sudah login
if (isset($_COOKIE['user-type'])) {
  header("Location: /pages/dashboard.php");
  exit();
}
?>
<!DOCTYPE html>
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
          <h1>Selamat Datang</h1>
          <p>Login sebagai:</p>
          <div class="user-options">
            <span class="material-symbols-rounded">account_circle</span>
            <span class="jenis-pengguna">Tamu</span>
            <span class="material-symbols-rounded">arrow_drop_down</span>
            <div class="opsi">
              <a href="login-admin.php">Admin</a>
              <a href="/">Pengguna Biasa</a>
              <a href="#">Tamu</a>
            </div>
          </div>
        </div>
        <div class="right-cont">
          <form action="/functions/login-process.php" method="post" id="loginTamu">
            <div class="input-field">
              <label for="token">Masukan token</label>
              <input type="text" id="token" name="token" />
              <span class="material-symbols-rounded">error</span>
              <span class="supporting-text">Supporting text</span>
            </div>
          </form>
          <!-- <p>
            Halaman login untuk pengguna biasa. Jika anda Admin silahkan login
            sebagai Admin.
          </p> -->
        </div>
      </div>
      <div class="buttons">
        <button type="submit" form="loginTamu" name="login-tamu">Login</button>
      </div>
    </div>
    <script src="/assets/js/login.js"></script>
  </body>
</html>
