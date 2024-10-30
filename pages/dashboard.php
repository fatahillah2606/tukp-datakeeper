<?php
require $_SERVER['DOCUMENT_ROOT'] . '/includes/login-info.php';
if ($_SESSION['peran_pengguna'] == "Tamu") {
  header ("Location: guest-dashboard.php");
  exit();
}
?>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard | TUKP Data Keeper</title>
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
          <!-- header -->
          <div class="header">
            <h1 class="nama">
              Selamat datang,
              <?php echo (isset($_SESSION['peran_pengguna'])) ? $_SESSION['nama_pengguna'] : ''; ?>
            </h1>
            <div class="kata-sambutan">
              <h1>Mau apa kamu hari ini?</h1>
              <h1 id="sambutan">Some text</h1>
            </div>
            <div class="tombol">
              <!-- Pilihan awal -->
              <div class="pilihan awal show">
                <div class="tmbl" onclick="bukaMenu('catat')">
                  <p>Pencatatan</p>
                  <span class="material-symbols-rounded">edit_document</span>
                </div>
                <div class="tmbl" onclick="bukaMenu('lihat')">
                  <p>Lihat Data</p>
                  <span class="material-symbols-rounded">description</span>
                </div>
              </div>
              <!-- Pilihan pencatatan -->
              <div class="pilihan catat">
                <div class="tmbl kembali">
                  <p>Kembali</p>
                  <span class="material-symbols-rounded">arrow_back_ios</span>
                </div>
                <a href="catat/catat-pengunjung.php">
                  <div class="tmbl">
                    <p>Catat Pengunjung</p>
                    <span class="material-symbols-rounded">person_edit</span>
                  </div>
                </a>
                <a href="catat/catat-barang-ext.php">
                  <div class="tmbl">
                    <p>Catat Barang Eksternal</p>
                    <span class="material-symbols-rounded">note_alt</span>
                  </div>
                </a>
                <a href="catat/catat-barang-int.php">
                  <div class="tmbl">
                    <p>Catat Barang Internal</p>
                    <span class="material-symbols-rounded">edit_document</span>
                  </div>
                </a>
                <a href="catat/catat-mobil.php">
                  <div class="tmbl">
                    <p>Catat Kilometer Mobil</p>
                    <span class="material-symbols-rounded">edit_road</span>
                  </div>
                </a>
              </div>
              <!-- Pilihan Lihat data -->
              <div class="pilihan lihat">
                <div class="tmbl kembali">
                  <p>Kembali</p>
                  <span class="material-symbols-rounded">arrow_back_ios</span>
                </div>
                <a href="lihat/lihat-pengunjung.php">
                  <div class="tmbl">
                    <p>Lihat Pengunjung</p>
                    <span class="material-symbols-rounded">group</span>
                  </div>
                </a>
                <a href="lihat/lihat-barang-ext.php">
                  <div class="tmbl">
                    <p>Lihat Barang Eksternal</p>
                    <span class="material-symbols-rounded"
                      >content_paste_search</span
                    >
                  </div>
                </a>
                <a href="lihat/lihat-barang-int.php">
                  <div class="tmbl">
                    <p>Lihat Barang Internal</p>
                    <span class="material-symbols-rounded">description</span>
                  </div>
                </a>
                <a href="lihat/lihat-mobil.php">
                  <div class="tmbl">
                    <p>Lihat Kilometer Mobil</p>
                    <span class="material-symbols-rounded">speed</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <!-- End Header -->
          <!-- Pengumuman -->
          <div class="konten-pengumuman">
            <!-- ajax -->
          </div>
          <!-- Akhir Pengumuman -->
          <!-- tabel -->
          <div class="tabel">
            <div class="head">
              <div class="teks">
                <div class="judul-tabel">
                  <h2>Data Barang Internal</h2>
                  <span class="material-symbols-rounded"
                    >keyboard_arrow_down</span
                  >
                  <div class="menu">
                    <span data-rekaman="dataPengunjung">Data Pengunjung</span>
                    <span data-rekaman="dataBarangEksternal"
                      >Data Barang Eksternal</span
                    >
                    <span data-rekaman="dataBarangInternal"
                      >Data Barang Internal</span
                    >
                    <span data-rekaman="dataMobil">Data Kilometer Mobil</span>
                  </div>
                </div>
                <p>Berikut adalah 10 catatan terbaru</p>
              </div>
              <div class="bar-cari">
                <label for="cari" class="material-symbols-rounded"
                  >search</label
                >
                <input
                  type="text"
                  id="cari"
                  name="cari"
                  placeholder="Cari ..."
                />
              </div>
            </div>
            <div class="table-container">
              <!-- Ajax -->
            </div>
            <div class="view-all">
              <a href="#">Lihat semua</a>
            </div>
          </div>
          <!-- End Tabel -->
          <!-- fab button -->
          <a href="catat/catat-barang-int.php">
            <div class="fab-button">
              <span class="material-symbols-rounded">edit</span>
              <span>Catat</span>
            </div>
          </a>
        </div>
        <!-- End Main Content -->
      </div>
      <!-- End Konten -->
    </div>
    <!-- End Container -->
    <!-- Modal Box -->
    <div class="modals">
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/templates/modals/edit-pengunjung.html'; ?>
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/templates/modals/edit-barang-ext.html'; ?>
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/templates/modals/edit-barang-int.html'; ?>
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/templates/modals/edit-mobil.html'; ?>
    </div>
    <!-- End Modal Box -->
    <!-- modal alert box-->
    <div class="popup">
      <div class="popup-content">
        <h2>Perhatian</h2>
        <p>Anda yakin ingin menghapus rekaman tersebut?</p>
        <div class="controls">
          <button class="close-btn" onclick="tutupDialog()">Batal</button>
          <button class="submit-btn">Hapus</button>
        </div>
      </div>
    </div>
    <!-- End modal alert box -->
    <script src="/assets/js/navmenu.js"></script>
    <script src="/assets/js/tabel.js"></script>
    <script src="/assets/js/script.js"></script>
    <script src="/assets/js/formulir.js"></script>
    <script src="/assets/js/dialogs.js"></script>
    <script type="text/javascript">
      // Cek pengaturan default tabel
      if (ambilCookie("defaultTabel") == "") {
        aturCookie("defaultTabel", "dataBarangInternal", 30);
      }

      // Opsi untuk pilih data yang ingin di tampilkan
      let judulTabel = document.querySelector(".judul-tabel");
      let menuTabel = judulTabel.querySelector(".menu");
      let isiMenuTabel = menuTabel.querySelectorAll("span");

      function bukaMenuTabel() {
        menuTabel.classList.toggle("show");
      }

      judulTabel.addEventListener("click", (e) => {
        e.stopPropagation();
        bukaMenuTabel();
      });

      document.addEventListener("click", (e) => {
        if (
          menuTabel.classList.contains("show") &&
          !menuTabel.contains(e.target) &&
          e.target.id !== "bukaMenuTabel"
        ) {
          menuTabel.classList.remove("show");
        }
      });

      isiMenuTabel.forEach((element) => {
        element.addEventListener("click", () => {
          ambilData(element.getAttribute("data-rekaman"));

          // Set cookie
          aturCookie("defaultTabel", element.getAttribute("data-rekaman"), 30);

          judulTabel.querySelector("h2").innerHTML = element.innerHTML;
        });
      });

      // Proses ambil data
      let = barisData = document.querySelector(".table-container");

      function ambilData(namaData) {
        // Switch untuk fab button dan View all
        let linkHalaman;
        switch (namaData) {
          case "dataPengunjung":
            linkHalaman = "pengunjung.php";
            break;
          case "dataBarangEksternal":
            linkHalaman = "barang-ext.php";
            break;
          case "dataBarangInternal":
            linkHalaman = "barang-int.php";
            break;
          case "dataMobil":
            linkHalaman = "mobil.php";
            break;
        }

        let viewAll = document.querySelector(".view-all a");
        let fabButton = document.querySelector(".fab-button");

        // Mulai request
        let xhr = new XMLHttpRequest();

        // Metode dan url
        xhr.open(
          "GET",
          "/functions/data-manager.php?" + namaData + "=true&limit=true",
          true
        );

        // cek respon server
        xhr.onload = function () {
          if (xhr.status === 200) {
            barisData.innerHTML = xhr.responseText;

            // atur view all sesuai table yang ditampilkan
            viewAll.setAttribute("href", "/pages/lihat/lihat-" + linkHalaman);

            // atur fab button sesuai table yang ditampilkan
            fabButton.parentElement.setAttribute(
              "href",
              "/pages/catat/catat-" + linkHalaman
            );
          } else {
            barisData.innerHTML = "Kesalahan: " + xhr.status;
          }
        };
        // Kirim permintaan
        xhr.send();
      }

      // Muat data
      function muatData() {
        ambilData(ambilCookie("defaultTabel"));
        isiMenuTabel.forEach((element) => {
          if (
            element.getAttribute("data-rekaman") == ambilCookie("defaultTabel")
          ) {
            judulTabel.querySelector("h2").innerHTML = element.innerHTML;
          }
        });
      }

      // tampilkan pengumuman
      function tampilkanPengumuman() {
        let pengumuman = new XMLHttpRequest();
        pengumuman.open(
          "GET",
          "/functions/data-manager.php?lihatPengumuman=true",
          true
        );

        pengumuman.onload = function () {
          if (pengumuman.status === 200) {
            let kontenPengumuman = document.querySelector(".konten-pengumuman");
            kontenPengumuman.innerHTML = pengumuman.responseText;
          }
        };

        pengumuman.send();
      }

      window.onload = function () {
        muatData();
        tampilkanPengumuman();

        // Update data realtime
        setInterval(() => {
          muatData();
          tampilkanPengumuman();
        }, 60000 * 5 /* Update setiam 5 menit sekali */);
      };
    </script>
  </body>
</html>
