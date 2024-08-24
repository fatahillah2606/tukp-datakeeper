<?php
// Cek apakah sudah login
if (isset($_COOKIE['user-type'])) {
  header("Location: /pages/dashboard.php");
  exit();
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
          <!-- <p>Login sebagai:</p> -->
        </div>
        <div class="right-cont">
          <p>
            Apakah anda mengingat Nomor ID atau Email yang diberikan oleh Admin?
          </p>
          <div class="radio-option">
            <div class="radio">
              <input type="radio" id="ya" name="ingat-id-email" value="Ya" />
              <label for="ya">Ya</label>
            </div>
            <div class="radio">
              <input
                type="radio"
                id="tidak"
                name="ingat-id-email"
                value="Tidak"
              />
              <label for="tidak">Tidak</label>
            </div>
          </div>
          <form action="reset-req.php" method="post" id="resetPasswd">
            <div class="input-field hide" id="user-account">
              <label for="akun">Email atau Nomor ID anda</label>
              <input type="text" id="akun" name="akun" disabled/>
              <span class="material-symbols-rounded">error</span>
              <span class="supporting-text">Supporting text</span>
            </div>
            <div class="input-field hide" id="user-name">
              <label for="nama-user">Masukan nama anda</label>
              <input type="text" id="nama-user" name="nama-user" disabled/>
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
        <button type="submit" form="resetPasswd" disabled>Ajukan reset sandi</button>
      </div>
    </div>
    <script src="/assets/js/login.js"></script>
  </body>
</html>
