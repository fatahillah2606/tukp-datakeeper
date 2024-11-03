<?php
require $_SERVER['DOCUMENT_ROOT'] . '/includes/login-info.php';
if ($_SESSION['peran_pengguna'] == 'Tamu') {
  header("Location: /errors/403.php");
  exit();
}
?>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Service Record | TUKP Data Keeper</title>
    <link rel="stylesheet" href="/assets/css/style.css" />
    <link rel="stylesheet" href="/assets/css/style-dark.css" />
    <link rel="stylesheet" href="/assets/css/navmenu.css" />
  </head>
  <body>
    <div class="container">
      <!-- Sidebar -->
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/templates/sidebar.php'; ?>
      <!-- End Sidebar -->
      <!-- Konten -->
      <div class="konten">
        <!-- Navbar -->
        <?php
          if ($_SESSION['peran_pengguna'] === 'Admin') {
            require $_SERVER['DOCUMENT_ROOT'] . '/templates/admin-navbar.php';
          } else if ($_SESSION['peran_pengguna'] === 'User') {
            require $_SERVER['DOCUMENT_ROOT'] . '/templates/user-navbar.php';
          }
        ?>
        <!-- End Navbar -->
        <!-- Main Content -->
        <div class="main-content">
          <div class="formulir">
            <h1>Service Record</h1>
            <form
              action="/functions/data-manager.php"
              method="post"
              name="catat-mobil"
            >
              <div class="form-field fokus">
                <label for="tanggal">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" required />
                <span class="supporting-text">Supporting text</span>
                <span class="material-symbols-rounded field-icon">event</span>
              </div>
              <div class="form-field">
                <label for="nama-pelaksana">Nama Pelaksana</label>
                <input
                  type="text"
                  id="nama-pelaksana"
                  name="nama-pelaksana"
                  required
                />
                <span class="material-symbols-rounded field-error">error</span>
                <span class="supporting-text">Supporting text</span>
                <span class="material-symbols-rounded field-icon">person</span>
              </div>
              <div class="form-field">
                <label for="merek-kendaraan">Merek Kendaraan</label>
                <input
                  type="text"
                  id="merek-kendaraan"
                  name="merek-kendaraan"
                  required
                />
                <span class="material-symbols-rounded field-error">error</span>
                <span class="supporting-text">Supporting text</span>
                <span class="material-symbols-rounded field-icon"
                  >local_shipping</span
                >
              </div>
              <div class="form-field">
                <label for="no-kendaraan">Nomor Kendaraan</label>
                <input
                  type="text"
                  id="no-kendaraan"
                  name="no-kendaraan"
                  required
                />
                <span class="material-symbols-rounded field-error">error</span>
                <span class="supporting-text">Supporting text</span>
                <span class="material-symbols-rounded field-icon">pin</span>
              </div>
              <div class="form-field">
                <label for="km-service">Kilometer saat service</label>
                <input
                  type="number"
                  id="km-service"
                  name="km-service"
                  required
                />
                <span class="material-symbols-rounded field-error">error</span>
                <span class="supporting-text">Supporting text</span>
                <span class="material-symbols-rounded field-icon">speed</span>
              </div>
              <div class="form-field">
                <label for="nama-bengkel">Nama Bengkel</label>
                <input
                  type="text"
                  id="nama-bengkel"
                  name="nama-bengkel"
                  required
                />
                <span class="material-symbols-rounded field-error">error</span>
                <span class="supporting-text">Supporting text</span>
                <span class="material-symbols-rounded field-icon"
                  >precision_manufacturing</span
                >
              </div>
              <div class="form-field">
                <label for="rincian">Rincian Service</label>
                <input type="text" id="rincian" name="rincian" required />
                <span class="material-symbols-rounded field-error">error</span>
                <span class="supporting-text">Supporting text</span>
                <span class="material-symbols-rounded field-icon">info</span>
              </div>
              <div class="tombol-aksi">
                <button type="reset" id="reset">Bersihkan</button>
                <button
                  type="submit"
                  name="simpan-mobil"
                  onclick="simpanMobil(this.parentElement.parentElement, event)"
                >
                  Simpan
                </button>
              </div>
            </form>
          </div>
        </div>
        <!-- End Main Content -->
      </div>
      <!-- End Konten -->
    </div>
    <!-- End Container -->
    <script src="/assets/js/navmenu.js"></script>
    <script src="/assets/js/formulir.js"></script>
    <script type="text/javascript">
      function simpanMobil(formulir, event) {
        event.preventDefault();

        let adaYangKosong = false;
        let adaError = false;

        let kolomIsian = formulir.querySelectorAll(
          "input[required]:not([disabled]), select[required]"
        );
        let textField = formulir.querySelectorAll(".form-field");

        // Cek jika ada kolom yg kosong
        kolomIsian.forEach((element) => {
          if (element.value.trim() === "") {
            adaYangKosong = true;
            let elemenKosong = element.parentElement;
            tampilkanError(elemenKosong, "Wajib diisi");
          }
        });

        // cek jika ketentuan belum terpenuhi
        textField.forEach((element) => {
          if (element.classList.contains("error")) {
            adaError = true;
          }
        });

        // Proses
        if (!adaYangKosong && !adaError) {
          // ambil data dari form
          let tanggal = formulir.querySelector("#tanggal").value;
          let namaPelaksana = formulir.querySelector("#nama-pelaksana").value;
          let merekKendaraan = formulir.querySelector("#merek-kendaraan").value;
          let noKendaraan = formulir.querySelector("#no-kendaraan").value;
          let kmService = formulir.querySelector("#km-service").value;
          let namaBengkel = formulir.querySelector("#nama-bengkel").value;
          let rincian = formulir.querySelector("#rincian").value;

          // Buat objek XMLHttpRequest
          let xhr = new XMLHttpRequest();

          // menentukan method dan url
          xhr.open("POST", "/functions/data-manager.php", true);

          // Set header
          xhr.setRequestHeader(
            "Content-Type",
            "application/x-www-form-urlencoded"
          );

          // tanggapan ketika request selesai
          xhr.onload = function () {
            if (xhr.status === 200) {
              // JSON parsing response
              let respon = JSON.parse(xhr.responseText);
              showUpdate(respon.pesan, respon.atxt, respon.alnk);

              if (respon.status === "success") {
                tombolReset.click();
              } else {
                console.log(respon.errorMsg);
              }
            } else {
              console.log(xhr.status);
            }
          };

          // Kirim data ke server
          xhr.send(
            "DataService=true&simpan=true&tanggal=" +
              encodeURIComponent(tanggal) +
              "&NamaPelaksana=" +
              encodeURIComponent(namaPelaksana) +
              "&MerekKendaraan=" +
              encodeURIComponent(merekKendaraan) +
              "&NoKendaraan=" +
              encodeURIComponent(noKendaraan) +
              "&KmService=" +
              encodeURIComponent(kmService) +
              "&NamaBengkel=" +
              encodeURIComponent(namaBengkel) +
              "&rincian=" +
              encodeURIComponent(rincian)
          );
        }
      }
    </script>
  </body>
</html>
