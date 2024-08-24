<?php
require '../../includes/login-info.php';
if ($_COOKIE['user-type'] == 'Tamu') {
  header("Location: /errors/403.php");
  exit();
}
?>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Catat Mobil | TUKP Data Keeper</title>
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <link rel="stylesheet" href="../../assets/css/style-dark.css" />
    <link rel="stylesheet" href="../../assets/css/navmenu.css" />
  </head>
  <body>
    <div class="container">
      <!-- Sidebar -->
      <?php require '../../templates/sidebar.php'; ?>
      <!-- End Sidebar -->
      <!-- Konten -->
      <div class="konten">
        <!-- Navbar -->
        <?php
          if ($_COOKIE['user-type'] === 'Admin') {
            require '../../templates/admin-navbar.php';
          } else if ($_COOKIE['user-type'] === 'User') {
            require '../../templates/user-navbar.php';
          }
        ?>
        <!-- End Navbar -->
        <!-- Main Content -->
        <div class="main-content">
          <div class="formulir">
            <h1>Catat Mobil</h1>
            <form
              action="/function/data-manager.php"
              method="post"
              name="catat-mobil"
            >
              <div class="form-field">
                <label for="nama-driver">Nama Driver</label>
                <input type="text" id="nama-driver" name="nama-driver" />
                <span class="material-symbols-rounded field-icon">person</span>
              </div>
              <div class="form-field">
                <label for="merek-kendaraan">Merek Kendaraan</label>
                <select name="merek-kendaraan" id="merek-kendaraan">
                  <option value=""></option>
                  <option value="Luxio">Luxio</option>
                  <option value="Grandmax">Grandmax</option>
                  <option value="Panther">Panther</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
                <span class="material-symbols-rounded field-icon"
                  >local_shipping</span
                >
              </div>
              <div class="form-field none">
                <label for="merek-lain">Merek Lain</label>
                <input type="text" id="merek-lain" name="merek-lain" />
              </div>
              <h2>Kilometer</h2>
              <div class="multi-field">
                <div class="form-field">
                  <label for="awal-km">Awal</label>
                  <input type="number" id="awal-km" name="awal-km" />
                </div>
                <div class="form-field">
                  <label for="akhir-km">Akhir</label>
                  <input type="number" id="akhir-km" name="akhir-km" />
                </div>
                <span class="material-symbols-rounded field-icon">speed</span>
              </div>
              <div class="form-field">
                <label for="tujuan">Tujuan</label>
                <input type="text" id="tujuan" name="tujuan" />
                <span class="material-symbols-rounded field-icon"
                  >location_on</span
                >
              </div>
              <div class="form-field">
                <label for="keperluan">Keperluan</label>
                <input type="text" id="keperluan" name="keperluan" />
                <span class="material-symbols-rounded field-icon"
                  >task_alt</span
                >
              </div>
              <div class="tombol-aksi">
                <button type="submit" name="simpan-mobil">Simpan</button>
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
  </body>
</html>
