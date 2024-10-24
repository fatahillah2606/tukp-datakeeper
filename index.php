<?php
// Cek apakah sudah login
if (isset($_COOKIE['login'])) {
  header("Location: /pages/dashboard.php");
  exit();
}
?>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | TUKP Data Keeper</title>
    <link rel="stylesheet" href="assets/css/login.css" />
  </head>
  <body>
    <div class="konten">
      <img src="assets/images/logo.svg" alt="Logo" class="logo" />
      <div class="main-cont">
        <div class="left-cont">
          <h1>Selamat Datang</h1>
          <p>Login sebagai:</p>
          <div class="user-options">
            <span class="material-symbols-rounded">account_circle</span>
            <span class="jenis-pengguna">Pengguna Biasa</span>
            <span class="material-symbols-rounded">arrow_drop_down</span>
            <div class="opsi">
              <a href="/pages/users/login-admin.php">Admin</a>
              <a href="/">Pengguna Biasa</a>
              <a href="/pages/users/login-guest.php">Tamu</a>
            </div>
          </div>
        </div>
        <div class="right-cont">
          <form
            action="/functions/login-process.php"
            method="post"
            id="loginUser"
          >
            <div class="input-field">
              <label for="no-id">Nomor ID</label>
              <input type="number" id="no-id" name="no-id" />
              <span class="material-symbols-rounded">error</span>
              <span class="supporting-text">Supporting text</span>
            </div>
            <div class="input-field">
              <label for="passwd">Masukan Sandi</label>
              <input type="password" id="passwd" name="passwd" />
              <span class="material-symbols-rounded">error</span>
              <span class="supporting-text">Supporting text</span>
            </div>
          </form>
          <div class="show-passwd">
            <input type="checkbox" name="tampil-sandi" id="tampil-sandi" />
            <label for="tampil-sandi">Tampilkan sandi</label>
          </div>
          <!-- <p>
            Halaman login untuk pengguna biasa. Jika anda Admin silahkan login
            sebagai Admin.
          </p> -->
        </div>
      </div>
      <div class="buttons">
        <a href="pages/users/forget.php">Lupa Sandi</a>
        <button
          type="submit"
          form="loginUser"
          name="login-user"
          onclick="masuk(this.parentElement.parentElement, 'PenggunaBiasa', event)"
        >
          Login
        </button>
      </div>
    </div>
    <script src="assets/js/login.js"></script>
  </body>
</html>
