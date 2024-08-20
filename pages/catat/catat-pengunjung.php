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
            <h1>Catat Pengunjung</h1>
            <form action="">
              <div id="field-nama">
                <div class="form-field">
                  <label for="nama-pengunjung">Nama Pengunjung</label>
                  <input
                    type="text"
                    id="nama-pengunjung"
                    name="nama-pengunjung"
                  />
                  <span class="material-symbols-rounded field-icon"
                    >person</span
                  >
                </div>
              </div>
              <div
                class="tambah"
                onclick="tambahSingleField('Nama Pengunjung', 'text', 'field-nama', 'person')"
              >
                <span class="material-symbols-rounded">add</span>
                <span class="btn-label">Tambah</span>
              </div>
              <div id="nama-perusahaan">
                <div class="form-field">
                  <label for="nama-perusahaan">Nama Perusahaan</label>
                  <input
                    type="text"
                    id="nama-perusahaan"
                    name="nama-perusahaan"
                  />
                </div>
              </div>
              <div class="multi-field">
                <div class="form-field fokus">
                  <label for="tanggal">Tanggal</label>
                  <input type="date" id="tanggal" name="tanggal" />
                </div>
                <div class="form-field">
                  <label for="no-tlp">Nomor Telepon</label>
                  <input type="text" id="no-tlp" name="no-tlp" />
                </div>
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
