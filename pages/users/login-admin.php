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
            <span class="jenis-pengguna">Admin</span>
            <span class="material-symbols-rounded">arrow_drop_down</span>
            <div class="opsi">
              <a href="#">Admin</a>
              <a href="/">Pengguna Biasa</a>
              <a href="/pages/guest-dashboard.php">Tamu</a>
            </div>
          </div>
        </div>
        <div class="right-cont">
          <form action="/function/login-process.php" method="post" id="loginAdmin">
            <div class="input-field">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" />
              <span class="material-symbols-rounded">error</span>
              <span class="supporting-text">Supporting text</span>
            </div>
            <div class="input-field error">
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
        <a href="forget.php">Lupa Sandi</a>
        <button type="submit" form="loginAdmin" name="login-admin">Login</button>
      </div>
    </div>
    <script src="/assets/js/login.js"></script>
  </body>
</html>
