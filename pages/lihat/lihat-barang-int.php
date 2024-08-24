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
    <title>Lihat Barang Internal | TUKP Data Keeper</title>
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
                <h2>Data Barang Internal</h2>
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
                    <th scope="col">Nama Pembawa</th>
                    <th scope="col">Nama & Jumlah Barang</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">keterangan</th>
                    <th scope="col">Ubah Data</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td data-label="No" class="no">
                      <p class="text-wrap">1</p>
                    </td>
                    <td data-label="Nama Pembawa" class="nama-pembawa">
                      <p class="text-wrap">Sofian</p>
                    </td>
                    <td data-label="Barang" class="list">
                      <ul>
                        <li class="barang">cuka merah, 24</li>
                        <li class="barang">cuka merah, 24</li>
                        <li class="barang">cuka merah, 24</li>
                      </ul>
                    </td>
                    <td data-label="Tanggal" class="tanggal">
                      <p class="text-wrap">1221-12-12</p>
                    </td>
                    <td data-label="Keterangan" class="keterangan">
                      <p class="text-wrap">pemakai</p>
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
          <a href="../catat/catat-barang-int.php">
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
          <div class="form-field">
            <label for="nama-pembawa">Nama Pembawa</label>
            <input type="text" id="nama-pembawa" name="nama-pembawa" />
            <span class="material-symbols-rounded field-icon">person</span>
          </div>
          <div id="field-barang">
            <h2>Barang</h2>
            <div class="multi-field">
              <div class="form-field">
                <label for="nama-barang">Nama Barang</label>
                <input type="text" id="nama-barang" name="nama-barang" />
              </div>
              <div class="form-field">
                <label for="jumlah-barang">Jumlah Barang</label>
                <input type="number" id="jumlah-barang" name="jumlah-barang" />
              </div>
              <span class="material-symbols-rounded field-icon">category</span>
            </div>
          </div>
          <div
            class="tambah"
            onclick="tambahMultiField('Barang tambahan', 'Nama Barang', 'Jumlah Barang', 'text', 'number', 'field-barang', 'category')"
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
            <span class="material-symbols-rounded field-icon">description</span>
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
