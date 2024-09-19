<?php
require $_SERVER['DOCUMENT_ROOT'] . '/includes/login-info.php';
if ($_COOKIE['user-type'] == 'Tamu') {
  header("Location: /errors/403.php");
  exit();
}

// Fungsi
function konversiTanggal($tgl) {
  $bln = array(
    1 =>
"Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",
"September", "Oktober", "November", "Desember" ); $pecahkan = explode("-",
$tgl); return $pecahkan[2] . " " . $bln[(int)$pecahkan[1]] . " " . $pecahkan[0];
} ?>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lihat Data Pengunjung | TUKP Data Keeper</title>
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
          if ($_COOKIE['user-type'] === 'Admin') {
            require $_SERVER['DOCUMENT_ROOT'] . '/templates/admin-navbar.php';
          } else if ($_COOKIE['user-type'] === 'User') {
            require $_SERVER['DOCUMENT_ROOT'] . '/templates/user-navbar.php';
          }
        ?>
        <!-- End Navbar -->
        <!-- Main Content -->
        <div class="main-content">
          <!-- tabel -->
          <div class="tabel">
            <div class="head">
              <div class="teks">
                <h2>Data Pengunjung</h2>
                <p>Berikut adalah catatan hari ini</p>
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
          </div>
          <!-- End Tabel -->
          <!-- fab button -->
          <a href="../catat/catat-pengunjung.php">
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
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/templates/modals/edit-pengunjung.php'; ?>
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
    <script src="/assets/js/formulir.js"></script>
    <script src="/assets/js/dialogs.js"></script>
    <script type="text/javascript">
      let tableContainer = document.querySelector(".table-container");

      function muatData() {
        let xhr = new XMLHttpRequest();
        xhr.open(
          "GET",
          "/functions/data-manager.php?dataPengunjung=true",
          true
        );
        xhr.onload = function () {
          if (xhr.status === 200) {
            tableContainer.innerHTML = xhr.responseText;
          } else {
            tableContainer.innerHTML = "Kesalahan: " + xhr.status;
          }
        };
        xhr.send();
      }

      muatData();
    </script>
  </body>
</html>
