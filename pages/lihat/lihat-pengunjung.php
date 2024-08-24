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
    <title>Lihat Data Pengunjung | TUKP Data Keeper</title>
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
              <table>
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pengunjung</th>
                    <th scope="col">Nama Perusahaan</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nomor Telepon</th>
                    <th scope="col">Ubah Data</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td data-label="No" class="no">
                      <p class="text-wrap">1</p>
                    </td>
                    <td
                      data-label="Nama Pengunjung"
                      class="nama-pengunjung list"
                    >
                      <ul>
                        <li class="pengunjung">Sofian</li>
                        <li class="pengunjung">Sofian</li>
                        <li class="pengunjung">Sofian</li>
                      </ul>
                    </td>
                    <td data-label="Nama Perusahaan" class="nama-perusahaan">
                      <p class="text-wrap">PT. Talan Utama Karisma Perkasa</p>
                    </td>
                    <td data-label="Tanggal" class="tanggal">
                      <p class="text-wrap">2027-01-27</p>
                    </td>
                    <td data-label="Nomor Telepon" class="no-tlp">
                      <p class="text-wrap">08123456789</p>
                    </td>
                    <td data-label="Ubah Data" class="buttons">
                      <div class="btn-cont">
                        <button class="hapus material-symbols-rounded">
                          delete
                        </button>
                        <button class="edit material-symbols-rounded">
                          edit
                        </button>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
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
    <div class="modal-container">
      <div class="formulir">
        <h1>Edit Laporan</h1>
        <form action="">
          <div id="field-nama">
            <div class="form-field">
              <label for="nama-pengunjung">Nama Pengunjung</label>
              <input type="text" id="nama-pengunjung" name="nama-pengunjung" />
              <span class="material-symbols-rounded field-icon">person</span>
            </div>
          </div>
          <div
            class="tambah"
            onclick="tambahSingleField('Tambahan pengunjung', 'Nama Pengunjung', 'text', 'field-nama', 'person')"
          >
            <span class="material-symbols-rounded">add</span>
            <span class="btn-label">Tambah</span>
          </div>
          <div id="nama-perusahaan">
            <div class="form-field">
              <label for="nama-perusahaan">Nama Perusahaan</label>
              <input type="text" id="nama-perusahaan" name="nama-perusahaan" />
              <span class="material-symbols-rounded field-icon">factory</span>
            </div>
          </div>
          <div class="form-field fokus">
            <label for="tanggal">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal" />
            <span class="material-symbols-rounded field-icon">event</span>
          </div>
          <div class="form-field">
            <label for="no-tlp">Nomor Telepon</label>
            <input type="text" id="no-tlp" name="no-tlp" />
            <span class="material-symbols-rounded field-icon">call</span>
          </div>
          <div class="tombol-aksi">
            <span id="cancel" onclick="editModal()">Batal</span>
            <button name="submit" id="submit">Simpan</button>
          </div>
        </form>
      </div>
    </div>
    <!-- End Modal Box -->
    <!-- modal alert box-->
    <div class="popup">
      <div class="popup-content">
        <h2>Perhatian</h2>
        <p>Anda yakin ingin menghapus rekaman tersebut?</p>
        <div class="controls">
          <button class="close-btn" onclick="peringatan()">Batal</button>
          <a href="" class="submit-btn">Hapus</a>
        </div>
      </div>
    </div>
    <!-- End modal alert box -->
    <script src="../../assets/js/navmenu.js"></script>
    <script src="../../assets/js/tabel.js"></script>
    <script src="../../assets/js/formulir.js"></script>
  </body>
</html>
