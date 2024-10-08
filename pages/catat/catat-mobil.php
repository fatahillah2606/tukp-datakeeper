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
    <title>Catat Mobil | TUKP Data Keeper</title>
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
            <h1>Catat Mobil</h1>
            <form
              action="/functions/data-manager.php"
              method="post"
              name="catat-mobil"
            >
              <div class="form-field">
                <label for="nama-driver">Nama Driver</label>
                <input
                  type="text"
                  id="nama-driver"
                  name="nama-driver"
                  required
                />
                <span class="material-symbols-rounded field-error">error</span>
                <span class="supporting-text">Supporting text</span>
                <span class="material-symbols-rounded field-icon">person</span>
              </div>
              <div class="form-field">
                <label for="merek-kendaraan">Merek Kendaraan</label>
                <select name="merek-kendaraan" id="merek-kendaraan" required>
                  <option value=""></option>
                  <option value="Luxio">Luxio</option>
                  <option value="Grandmax">Grandmax</option>
                  <option value="Panther">Panther</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
                <span class="material-symbols-rounded field-error">error</span>
                <span class="supporting-text">Supporting text</span>
                <span class="material-symbols-rounded field-icon"
                  >local_shipping</span
                >
              </div>
              <div class="form-field none">
                <label for="merek-lain">Merek Lain</label>
                <input
                  type="text"
                  id="merek-lain"
                  name="merek-lain"
                  disabled
                  required
                />
                <span class="material-symbols-rounded field-error">error</span>
                <span class="supporting-text">Supporting text</span>
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
              <h2>Kilometer</h2>
              <div class="multi-field">
                <div class="form-field">
                  <label for="awal-km">Awal</label>
                  <input type="number" id="awal-km" name="awal-km" required />
                  <span class="material-symbols-rounded field-error"
                    >error</span
                  >
                  <span class="supporting-text">Supporting text</span>
                </div>
                <div class="form-field">
                  <label for="akhir-km">Akhir</label>
                  <input type="number" id="akhir-km" name="akhir-km" required />
                  <span class="material-symbols-rounded field-error"
                    >error</span
                  >
                  <span class="supporting-text">Supporting text</span>
                </div>
                <span class="material-symbols-rounded field-icon">speed</span>
              </div>
              <div class="form-field">
                <label for="tujuan">Tujuan</label>
                <input type="text" id="tujuan" name="tujuan" required />
                <span class="material-symbols-rounded field-error">error</span>
                <span class="supporting-text">Supporting text</span>
                <span class="material-symbols-rounded field-icon"
                  >location_on</span
                >
              </div>
              <div class="form-field">
                <label for="keperluan">Keperluan</label>
                <input type="text" id="keperluan" name="keperluan" required />
                <span class="material-symbols-rounded field-error">error</span>
                <span class="supporting-text">Supporting text</span>
                <span class="material-symbols-rounded field-icon"
                  >task_alt</span
                >
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
          let namaDriver = formulir.querySelector("#nama-driver").value;
          let merekKendaraan = formulir.querySelector("#merek-kendaraan").value;
          let merekLain = formulir.querySelector("#merek-lain").value;
          let noKendaraan = formulir.querySelector("#no-kendaraan").value;
          let awalKm = formulir.querySelector("#awal-km").value;
          let akhirKm = formulir.querySelector("#akhir-km").value;
          let tujuan = formulir.querySelector("#tujuan").value;
          let keperluan = formulir.querySelector("#keperluan").value;

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
            "DataMobil=true&simpan=true&NamaDriver=" +
              encodeURIComponent(namaDriver) +
              "&MerekKendaraan=" +
              encodeURIComponent(merekKendaraan) +
              "&MerekLain=" +
              encodeURIComponent(merekLain) +
              "&NoKendaraan=" +
              encodeURIComponent(noKendaraan) +
              "&AwalKm=" +
              encodeURIComponent(awalKm) +
              "&AkhirKm=" +
              encodeURIComponent(akhirKm) +
              "&tujuan=" +
              encodeURIComponent(tujuan) +
              "&keperluan=" +
              encodeURIComponent(keperluan)
          );
        }
      }
    </script>
  </body>
</html>
