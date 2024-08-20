<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Catat Barang Internal | TUKP Data Keeper</title>
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <link rel="stylesheet" href="../../assets/css/style-dark.css" />
    <!-- Pisahkan bagian ini -->
    <link rel="stylesheet" href="../../assets/css/navmenu.css" />
  </head>
  <body>
    <div class="container">
      <!-- Sidebar -->
      <?php
        if (isset($_COOKIE['user-type'])) {
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
          if (isset($_COOKIE['user-type'])) {
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
            <h1>Catat Barang Internal</h1>
            <form action="">
              <div class="form-field">
                <label for="nama-pembawa">Nama Pembawa</label>
                <input type="text" id="nama-pembawa" name="nama-pembawa" />
                <span class="material-symbols-rounded field-icon">person</span>
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
                      type="number"
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
                onclick="tambahMultiField('Nama Barang', 'Jumlah Barang', 'text', 'number', 'field-barang', 'category')"
              >
                <span class="material-symbols-rounded">add</span>
                <span class="btn-label">Tambah</span>
              </div>
              <!-- <div id="field-nama"></div> -->
              <div class="form-field fokus">
                <label for="tanggal">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" />
                <span class="material-symbols-rounded field-icon">event</span>
              </div>
              <div class="form-field">
                <label for="keterangan">Keterangan</label>
                <input type="text" id="keterangan" name="keterangan" />
                <span class="material-symbols-rounded field-icon"
                  >description</span
                >
              </div>
              <div class="tombol-aksi">
                <button name="submit" id="submit">Simpan</button>
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
