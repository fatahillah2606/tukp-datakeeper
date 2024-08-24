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
    <title>Lihat Data Mobil | TUKP Data Keeper</title>
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
                <h2>Data Kilometer Mobil</h2>
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
                    <th scope="col">Nama Driver</th>
                    <th scope="col">Merek Kendaraan</th>
                    <th scope="col">KM Awal</th>
                    <th scope="col">KM Akhir</th>
                    <th scope="col">Tujuan</th>
                    <th scope="col">Keperluan</th>
                    <th scope="col">Ubah Data</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td data-label="No" class="no">
                      <p class="text-wrap">1</p>
                    </td>
                    <td data-label="Nama Driver" class="nama-driver">
                      <p class="text-wrap">Sofian</p>
                    </td>
                    <td data-label="Merek Kendaraan" class="merek-kendaraan">
                      <p class="text-wrap">Buggati Chiron</p>
                    </td>
                    <td data-label="KM Awal" class="awal-km">
                      <p class="text-wrap">100000</p>
                    </td>
                    <td data-label="KM Akhir" class="akhir-km">
                      <p class="text-wrap">200000</p>
                    </td>
                    <td data-label="Tujuan" class="nama-perusahaan">
                      <p class="text-wrap">Pt.sofian berkah</p>
                    </td>
                    <td data-label="Keperluan" class="keperluan">
                      <p class="text-wrap">Jalan-jalan</p>
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
          <a href="../catat/catat-mobil.php">
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
            <label for="nama-driver">Nama Driver</label>
            <input type="text" id="nama-driver" name="nama-driver" />
            <span class="material-symbols-rounded field-icon">person</span>
          </div>
          <div class="form-field">
            <label for="merek-kendaraan">Merek Kendaraan</label>
            <select name="merek-kendaraan" id="merek-kendaraan">
              <option value=""></option>
              <option value="Merek 1">Merek 1</option>
              <option value="Merek 2">Merek 2</option>
              <option value="Merek 3">Merek 3</option>
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
            <span class="material-symbols-rounded field-icon">location_on</span>
          </div>
          <div class="form-field">
            <label for="Keperluan">Keperluan</label>
            <input type="text" id="Keperluan" name="Keperluan" />
            <span class="material-symbols-rounded field-icon">task_alt</span>
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
