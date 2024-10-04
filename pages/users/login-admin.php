<?php
  if (isset($_COOKIE["ingat_saya"])) {
    header("Location: /pages/dashboard.php");
    exit();
  }
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>login andika</title>
    <link rel="stylesheet" href="/assets/css/login.css" />
    <link
      rel="stylesheet"
      href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    />
  </head>
  <body>
    <div class="konten-login">
      <!-- login kiri -->
      <div class="konten-kiri">
        <div class="logo">
          <img
            src="/assets/images/logo.svg"
            alt=""
            class="bg-light rounded-circle p-1"
          />
          <h5>PT. Taland Utama Karisma Perkasa</h5>
        </div>
        <div class="center">
          <h2>Selamat Datang</h2>
          <p>
            Untuk tetap terhubung dengan kami, silahkan masuk dengan akun anda
          </p>
        </div>
      </div>
      <!-- login kanan -->
      <div class="konten-kanan bg-light">
        <h2 class="text-center fw-bold">Mari login</h2>
        <form action="" method="post" name="loginUser">
          <p class="fs-6 mb-1">Login sebagai:</p>
          <div class="dropdown mb-3">
            <a
              class="btn btn-secondary dropdown-toggle"
              href="#"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Admin
            </a>

            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="/">Pengguna biasa</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Admin</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Tamu</a>
              </li>
            </ul>
          </div>
          <div class="form-floating mb-3">
            <input
              type="email"
              class="form-control"
              id="email"
              placeholder="email"
              required
            />
            <label for="email" class="form-label">Email</label>
          </div>
          <div class="form-floating">
            <input
              type="password"
              id="userpassword"
              class="form-control"
              placeholder="password"
              required
            />
            <label for="userpassword" class="form-label">Password</label>
          </div>
          <div class="form-check mt-3 mb-3">
            <input
              class="form-check-input"
              type="checkbox"
              value=""
              id="tampilkan-sandi"
            />
            <label class="form-check-label" for="tampilkan-sandi">
              Tampilkan Sandi
            </label>
          </div>
          <div
            class="buttons mt-3 d-flex flex-row-reverse gap-3 align-items-center"
          >
            <button
              type="submit"
              name="masukUser"
              class="btn btn-success"
              id="masukuser"
            >
              Login
            </button>
            <a
              href="#"
              class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
              >Lupa sandi</a
            >
          </div>
        </form>
      </div>
    </div>
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      let masukUser = document.getElementById("masukuser");
      masukUser.addEventListener("click", function (event) {
        event.preventDefault();
        let email = document.getElementById("email").value;
        let userpswd = document.getElementById("userpassword").value;
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "/functions/proses-login.php", true);
        xhr.setRequestHeader(
          "Content-Type",
          "application/x-www-form-urlencoded"
        );

        xhr.onload = function () {
          if (xhr.status === 200) {
            console.log(xhr.responseText);
            let respon = JSON.parse(xhr.responseText);
            if (respon.status === "berhasil") {
              alihkan(respon.alihkan);
            }
          }
        };
        xhr.send(
          "LoginAdmin=true&email=" +
            encodeURIComponent(email) +
            "&password=" +
            encodeURIComponent(userpswd)
        );
      });

      function alihkan(link) {
        location.href = link;
      }

      // untuk menampilkan sandi
      let userpassword = document.getElementById("userpassword");
      let TampilkanSandi = document.getElementById("tampilkan-sandi");

      TampilkanSandi.addEventListener("change", function () {
        if (TampilkanSandi.checked) {
          userpassword.setAttribute("type", "text");
        } else {
          userpassword.setAttribute("type", "password");
        }
      });
    </script>
  </body>
</html>
