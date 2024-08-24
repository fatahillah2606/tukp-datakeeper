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
    <title>Catat Barang Eksternal | TUKP Data Keeper</title>
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <link rel="stylesheet" href="../../assets/css/style-dark.css" />
    <!-- Pisahkan bagian ini -->
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
            <h1>Catat Barang Eksternal</h1>
            <form
              action="/function/data-manager.php"
              method="post"
              name="catat-barang-ext"
            >
              <div class="form-field fokus">
                <label for="tanggal">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" />
                <span class="material-symbols-rounded field-icon">event</span>
              </div>
              <div class="multi-field">
                <div class="form-field">
                  <label for="nama-driver">Nama Driver</label>
                  <input type="text" id="nama-driver" name="nama-driver" />
                </div>
                <div class="form-field">
                  <label for="nama-suplier">Nama Suplier</label>
                  <input type="text" id="nama-suplier" name="nama-suplier" />
                </div>
                <span class="material-symbols-rounded field-icon">person</span>
              </div>
              <div class="form-field">
                <label for="nama-driver">Keperluan</label>
                <input type="text" id="keperluan" name="keperluan" />
                <span class="material-symbols-rounded field-icon"
                  >task_alt</span
                >
              </div>
              <h2>Barang</h2>
              <div id="field-barang">
                <div class="multi-field">
                  <div class="form-field">
                    <label for="nama-barang">Nama Barang</label>
                    <input type="text" id="nama-barang" name="nama-barang" />
                  </div>
                  <div class="form-field">
                    <label for="jumlah-barang">Jumlah Barang</label>
                    <input
                      type="text"
                      id="jumlah-barang"
                      name="jumlah-barang"
                    />
                  </div>
                  <span class="material-symbols-rounded field-icon"
                    >category</span
                  >
                </div>
              </div>
              <div
                class="tambah"
                onclick="tambahMultiField('Barang tambahan', 'Nama Barang', 'Jumlah Barang', 'text', 'text', 'field-barang', 'category')"
              >
                <span class="material-symbols-rounded">add</span>
                <span class="btn-label">Tambah</span>
              </div>
              <div class="form-field keep-fokus">
                <label for="time-pp">Jam Kedatangan</label>
                <input type="time" id="time-pp" name="time-pp" />
                <span class="material-symbols-rounded field-icon"
                  >schedule</span
                >
              </div>
              <div class="form-field">
                <label for="no-kendaraan">Nomor Kendaraan</label>
                <input type="text" id="no-kendaraan" name="no-kendaraan" />
                <span class="material-symbols-rounded field-icon"
                  >local_shipping</span
                >
              </div>

              <div class="form-field">
                <label for="keterangan">Keterangan</label>
                <input type="text" id="keterangan" name="keterangan" />
                <span class="material-symbols-rounded field-icon"
                  >description</span
                >
              </div>
              <div class="tombol-aksi">
                <button type="submit" name="simpan-barang-ext">Simpan</button>
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
