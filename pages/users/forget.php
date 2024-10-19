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
            Mohon masukan nama anda. Nama anda akan di tampilkan di laporan
            reset sandi.
          </p>
          <form action="reset-req.php" method="post" id="resetPasswd">
            <div class="input-field" id="user-name">
              <label for="nama-user">Masukan nama anda</label>
              <input type="text" id="nama-user" name="nama-user" />
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
        <button type="submit" form="resetPasswd" name="ResetSandi" disabled>
          Ajukan reset sandi
        </button>
      </div>
    </div>
    <script src="/assets/js/login.js"></script>
    <script>
      let userName = document.getElementById("nama-user");
      let submitButton = document.querySelector(
        ".buttons button[type='submit']"
      );

      userName.addEventListener("keyup", () => {
        if (userName.value.trim() !== "") {
          submitButton.removeAttribute("disabled");
        } else {
          submitButton.setAttribute("disabled", "");
        }
      });
    </script>
  </body>
</html>
