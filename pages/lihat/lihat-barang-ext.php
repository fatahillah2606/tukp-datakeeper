<?php require '../../includes/login-info.php'; ?>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lihat Barang Eksternal | TUKP Data Keeper</title>
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
                <h2>Data Barang Eksternal</h2>
                <p>Berikut sekilas catatan hari ini</p>
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
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nama Driver</th>
                    <th scope="col">Nama Suplier</th>
                    <th scope="col">Keperluan</th>
                    <th scope="col">Nama & Jumlah Barang</th>
                    <th scope="col">Nomor Kendaraan</th>
                    <th scope="col">Jam Kedatangan</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Ubah Data</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td data-label="No" class="no"><p class="text-wrap">1</p></td>
                    <td data-label="Tanggal" class="tanggal">
                      <p class="text-wrap">2027-07-27</p>
                    </td>
                    <td data-label="Nama Pembawa" class="nama-pembawa">
                      <p class="text-wrap">Sofian</p>
                    </td>
                    <td data-label="Nama Suplier" class="nama-suplier">
                      <p class="text-wrap">PT. Orang Tua</p>
                    </td>
                    <td data-label="Keperluan" class="keperluan">
                      <p class="text-wrap">Mengantar Minuman Keras</p>
                    </td>
                    <td data-label="Barang" class="list">
                      <ul>
                        <li class="barang">Miras 1, 24lt</li>
                        <li class="barang">Miras 2, 24lt</li>
                        <li class="barang">Miras 3, 24lt</li>
                      </ul>
                    </td>
                    <td data-label="Nomor Kendaraan" class="no-kendaraan">
                      <p class="text-wrap">K 1234 BR</p>
                    </td>
                    <td data-label="Jam Kedatangan" class="time-pp">22:00</td>
                    <td data-label="Keterangan" class="keterangan">
                      <p class="text-wrap">Mengantar Minuman Keras</p>
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
          <a href="../catat/catat-barang-ext.html">
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
          <div class="form-field fokus">
            <label for="tanggal">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal" />
          </div>
          <div class="form-field">
            <label for="nama-driver">Nama Driver</label>
            <input type="text" id="nama-driver" name="nama-driver" />
          </div>
          <div class="form-field">
            <label for="nama-suplier">Nama Suplier</label>
            <input type="text" id="nama-suplier" name="nama-suplier" />
          </div>
          <div class="form-field">
            <label for="nama-driver">Keperluan</label>
            <input type="text" id="Keperluan" name="Keperluan" />
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
                <input type="text" id="jumlah-barang" name="jumlah-barang" />
              </div>
            </div>
          </div>
          <div
            class="tambah"
            onclick="tambahMultiField('Nama Barang', 'Jumlah Barang', 'text', 'text', 'field-barang')"
          >
            <span class="material-symbols-rounded">add</span>
            <span class="btn-label">Tambah</span>
          </div>
          <div class="multi-field">
            <div class="form-field fokus">
              <label for="time-pp">Jam Kedatangan</label>
              <input type="time" id="time-pp" name="time-pp" />
            </div>
            <div class="form-field">
              <label for="no-kendaraan">Nomor Kendaraan</label>
              <input type="text" id="no-kendaraan" name="no-kendaraan" />
            </div>
          </div>
          <div class="form-field">
            <label for="keterangan">Keterangan</label>
            <input type="text" id="keterangan" name="keterangan" />
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
