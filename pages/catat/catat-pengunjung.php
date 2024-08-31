<?php
if (isset($_GET["token"])) {
  require '../../functions/login-process.php';
  verifToken(htmlspecialchars($_GET["token"]), $conn);
}
require '../../includes/login-info.php';
?>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Catat Pengunjung | TUKP Data Keeper</title>
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <link rel="stylesheet" href="../../assets/css/style-dark.css" />
    <!-- Pisahkan bagian ini -->
    <link rel="stylesheet" href="../../assets/css/navmenu.css" />
  </head>
  <body>
    <div class="container">
      <!-- Sidebar -->
      <?php
        if ($_COOKIE['user-type'] !== "Tamu") {
          require '../../templates/sidebar.php';
        } else {
          require '../../templates/guest-sidebar.php';
        }
      ?>
      <!-- End Sidebar -->
      <!-- Konten -->
      <div class="konten">
        <!-- Navbar -->
        <?php
          if ($_COOKIE['user-type'] !== "Tamu") {
            if ($_COOKIE['user-type'] === 'Admin') {
              require '../../templates/admin-navbar.php';
            } else {
              require '../../templates/user-navbar.php';
            }
          } else {
            require '../../templates/guest-navbar.php';
          }
        ?>
        <!-- End Navbar -->
        <!-- Main Content -->
        <div class="main-content">
          <div class="formulir">
            <h1>Catat Pengunjung</h1>
            <form
              action="/functions/data-manager.php"
              method="post"
              name="catat-pengunjung"
            >
              <div id="field-nama">
                <div class="form-field">
                  <label for="nama-pengunjung">Nama Pengunjung</label>
                  <input
                    type="text"
                    id="nama-pengunjung"
                    name="nama-pengunjung"
                  />
                  <span class="material-symbols-rounded field-error"
                    >error</span
                  >
                  <span class="supporting-text">Supporting text</span>
                  <span class="material-symbols-rounded field-icon"
                    >person</span
                  >
                </div>
              </div>
              <div
                class="tambah"
                onclick="tambahSingleField('Tambahan pengunjung', 'Nama Pengunjung', 'text', 'field-nama', 'person')"
              >
                <span class="material-symbols-rounded">add</span>
                <span class="btn-label">Tambah</span>
              </div>
              <div class="form-field">
                <label for="nama-perusahaan">Nama Perusahaan</label>
                <input
                  type="text"
                  id="nama-perusahaan"
                  name="nama-perusahaan"
                />
                <span class="material-symbols-rounded field-error">error</span>
                <span class="supporting-text">Supporting text</span>
                <span class="material-symbols-rounded field-icon">factory</span>
              </div>
              <div class="form-field fokus">
                <label for="tanggal">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" />
                <span class="supporting-text">Supporting text</span>
                <span class="material-symbols-rounded field-icon">event</span>
              </div>
              <div class="form-field">
                <label for="no-tlp">Nomor Telepon</label>
                <input type="text" id="no-tlp" name="no-tlp" />
                <span class="material-symbols-rounded field-error">error</span>
                <span class="supporting-text">Supporting text</span>
                <span class="material-symbols-rounded field-icon">call</span>
              </div>
              <div class="tombol-aksi">
                <button type="reset" id="reset">Bersihkan</button>
                <button
                  type="submit"
                  name="simpan-pengunjung"
                  onclick="simpanPengunjung(this.parentElement.parentElement, event)"
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
    <script src="../../assets/js/navmenu.js"></script>
    <script src="../../assets/js/formulir.js"></script>
    <script type="text/javascript">
      function simpanPengunjung(formulir, event) {
        event.preventDefault();

        let adaYangKosong = false;
        let adaError = false;

        let kolomIsian = formulir.querySelectorAll(
          "input:not([disabled]), select"
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
          let namaPengunjung;
          let namaPerusahaan =
            formulir.querySelector("#nama-perusahaan").value;
          let tanggal = formulir.querySelector("#tanggal").value;
          let nomorTlp = formulir.querySelector("#no-tlp").value;

          // Jika pengunjung lebih dari satu
          let pengunjung = formulir.querySelectorAll(
            "#field-nama .form-field input"
          );

          namaPengunjung = `NamaPengunjung0=${encodeURIComponent(
            pengunjung[0].value
          )}&`;
          
          for (let i = 1; i < pengunjung.length; i++) {
            namaPengunjung += `NamaPengunjung${i}=${encodeURIComponent(
              pengunjung[i].value
            )}&`;
          }

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
            "DataPengunjung=true&simpan=true&" +
              namaPengunjung +
              "NamaPerusahaan=" +
              encodeURIComponent(namaPerusahaan) +
              "&tanggal=" +
              encodeURIComponent(tanggal) +
              "&NomorTlp=" +
              encodeURIComponent(nomorTlp)
          );
        }
      }
    </script>
  </body>
</html>