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
    <title>Catat Barang Eksternal | TUKP Data Keeper</title>
    <link rel="stylesheet" href="/assets/css/style.css" />
    <link rel="stylesheet" href="/assets/css/style-dark.css" />
    <!-- Pisahkan bagian ini -->
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
            <h1>Catat Barang Eksternal</h1>
            <form
              action="/functions/data-manager.php"
              method="post"
              name="catat-barang-ext"
            >
              <div class="form-field fokus">
                <label for="tanggal">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" required />
                <span class="supporting-text">Supporting text</span>
                <span class="material-symbols-rounded field-icon">event</span>
              </div>
              <div class="multi-field">
                <div class="form-field">
                  <label for="nama-driver">Nama Driver</label>
                  <input type="text" id="nama-driver" name="nama-driver" required />
                  <span class="material-symbols-rounded field-error"
                    >error</span
                  >
                  <span class="supporting-text">Supporting text</span>
                </div>
                <div class="form-field">
                  <label for="nama-suplier">Nama Suplier</label>
                  <input type="text" id="nama-suplier" name="nama-suplier" required />
                  <span class="material-symbols-rounded field-error"
                    >error</span
                  >
                  <span class="supporting-text">Supporting text</span>
                </div>
                <span class="material-symbols-rounded field-icon">person</span>
              </div>
              <div class="form-field">
                <label for="nama-driver">Keperluan</label>
                <input type="text" id="keperluan" name="keperluan" required />
                <span class="material-symbols-rounded field-error">error</span>
                <span class="supporting-text">Supporting text</span>
                <span class="material-symbols-rounded field-icon"
                  >task_alt</span
                >
              </div>
              <h2>Barang</h2>
              <div id="field-barang">
                <div class="multi-field">
                  <div class="form-field">
                    <label for="nama-barang">Nama Barang</label>
                    <input type="text" id="nama-barang" name="nama-barang" required />
                    <span class="material-symbols-rounded field-error"
                      >error</span
                    >
                    <span class="supporting-text">Supporting text</span>
                  </div>
                  <div class="form-field">
                    <label for="jumlah-barang">Jumlah Barang</label>
                    <input
                      type="number"
                      id="jumlah-barang"
                      name="jumlah-barang"
                      required
                    />
                    <span class="material-symbols-rounded field-error"
                      >error</span
                    >
                    <span class="supporting-text">Supporting text</span>
                  </div>
                  <span class="material-symbols-rounded field-icon"
                    >category</span
                  >
                </div>
              </div>
              <div
                class="tambah"
                onclick="tambahMultiField('Barang tambahan', 'Nama Barang', 'Jumlah Barang', 'text', 'number', 'field-barang', 'category')"
              >
                <span class="material-symbols-rounded">add</span>
                <span class="btn-label">Tambah</span>
              </div>
              <div class="form-field keep-fokus">
                <label for="time-pp">Jam Kedatangan</label>
                <input type="time" id="time-pp" name="time-pp" required />
                <span class="supporting-text">Supporting text</span>
                <span class="material-symbols-rounded field-icon"
                  >schedule</span
                >
              </div>
              <div class="form-field">
                <label for="no-kendaraan">Nomor Kendaraan</label>
                <input type="text" id="no-kendaraan" name="no-kendaraan" required />
                <span class="material-symbols-rounded field-error">error</span>
                <span class="supporting-text">Supporting text</span>
                <span class="material-symbols-rounded field-icon"
                  >pin</span
                >
              </div>

              <div class="form-field">
                <label for="keterangan">Keterangan</label>
                <input type="text" id="keterangan" name="keterangan" />
                <span class="material-symbols-rounded field-error">error</span>
                <span class="supporting-text">Supporting text</span>
                <span class="material-symbols-rounded field-icon"
                  >description</span
                >
              </div>
              <div class="tombol-aksi">
                <button type="reset" id="reset">Bersihkan</button>
                <button
                  type="submit"
                  name="simpan-barang-ext"
                  onclick="simpanBarangExt(this.parentElement.parentElement, event)"
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
      function simpanBarangExt(formulir, event) {
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
          let namaDriver = formulir.querySelector("#nama-driver").value;
          let namaSuplier = formulir.querySelector("#nama-suplier").value;
          let keperluan = formulir.querySelector("#keperluan").value;
          let namaJumlahBarang;
          let jamKedatangan = formulir.querySelector("#time-pp").value;
          let noKendaraan = formulir.querySelector("#no-kendaraan").value;
          let keterangan = formulir.querySelector("#keterangan").value;

          // Jika field barang dan jumlah lebih dari satu
          let namaBarang = formulir.querySelectorAll(
            "#field-barang .multi-field .form-field:nth-child(1) input"
          );
          let jumlahBarang = formulir.querySelectorAll(
            "#field-barang .multi-field .form-field:nth-child(2) input"
          );

          namaJumlahBarang = `NamaBarang0=${encodeURIComponent(
            namaBarang[0].value
          )}&JumlahBarang0=${encodeURIComponent(jumlahBarang[0].value)}&`;

          for (let i = 1; i < namaBarang.length; i++) {
            namaJumlahBarang += `NamaBarang${i}=${encodeURIComponent(
              namaBarang[i].value
            )}&JumlahBarang${i}=${encodeURIComponent(jumlahBarang[i].value)}&`;
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
            "DataBarangExt=true&simpan=true&tanggal=" +
              encodeURIComponent(tanggal) +
              "&NamaDriver=" +
              encodeURIComponent(namaDriver) +
              "&NamaSuplier=" +
              encodeURIComponent(namaSuplier) +
              "&keperluan=" +
              encodeURIComponent(keperluan) +
              "&" +
              namaJumlahBarang +
              "JamKedatangan=" +
              encodeURIComponent(jamKedatangan) +
              "&NoKendaraan=" +
              encodeURIComponent(noKendaraan) +
              "&keterangan=" +
              encodeURIComponent(keterangan)
          );
        }
      }
    </script>
  </body>
</html>
