<?php
require '../../includes/login-info.php';
if ($_COOKIE['user-type'] !== 'Admin') {
  header("Location: /errors/403.php");
  exit();
}
?>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kelola Pengguna | TUKP Data Keeper</title>
    <link rel="stylesheet" href="/assets/css/style.css" />
    <link rel="stylesheet" href="/assets/css/users.css" />
    <link rel="stylesheet" href="/assets/css/style-dark.css" />
    <!-- Pisahkan bagian ini -->
    <link rel="stylesheet" href="/assets/css/navmenu.css" />
  </head>
  <body>
    <div class="container">
      <!-- Sidebar -->
      <?php require '../../templates/sidebar.php'; ?>
      <!-- End Sidebar -->
      <!-- Konten -->
      <div class="konten">
        <!-- Navbar -->
        <?php require '../../templates/admin-navbar.php'; ?>
        <!-- End Navbar -->
        <!-- Main Content -->
        <div class="main-content">
          <!-- header -->
          <div class="header user-manager">
            <h1>Kelola Pengguna</h1>
          </div>
          <!-- End Header -->
          <div class="konten-pengguna">
            <div class="head">
              <h2>Semua Pengguna</h2>
              <div class="head-action">
                <div class="bar-cari">
                  <label for="cari" class="material-symbols-rounded"
                    >search</label
                  >
                  <input
                    type="text"
                    id="cari"
                    name="cari"
                    placeholder="Cari..."
                  />
                </div>
                <div class="tambah">
                  <span class="material-symbols-rounded">add</span>
                  <span>Tambah</span>
                </div>
              </div>
            </div>
            <div class="users">
              <div class="user">
                <div class="left">
                  <div class="user-icon">
                    <span class="material-symbols-rounded">person</span>
                  </div>
                  <div class="user-name">
                    <h2 class="nama">Al Aziz</h2>
                    <p class="id-email">email@email.com</p>
                  </div>
                </div>
                <div class="right">
                  <p class="role">Admin</p>
                  <div class="action-btn">
                    <div class="btn reset">
                      <span class="material-symbols-rounded">history</span>
                      <p onclick="resetPasswd(123, 'Zaki')">Reset</p>
                    </div>
                    <div class="btn edit">
                      <span class="material-symbols-rounded">edit</span>
                      <p>Edit</p>
                    </div>
                    <a
                      href="#"
                      class="hapus material-symbols-rounded"
                      onclick="hapusUser(123, 'Zaki')"
                      >delete</a
                    >
                  </div>
                </div>
              </div>
              <div class="user">
                <div class="left">
                  <div class="user-icon">
                    <span class="material-symbols-rounded">person</span>
                  </div>
                  <div class="user-name">
                    <h2 class="nama">Andika</h2>
                    <p class="id-email">email@email.com</p>
                  </div>
                </div>
                <div class="right">
                  <p class="role">Admin</p>
                  <div class="action-btn">
                    <div class="btn reset">
                      <span class="material-symbols-rounded">history</span>
                      <p onclick="resetPasswd(123, 'Zaki')">Reset</p>
                    </div>
                    <div class="btn edit">
                      <span class="material-symbols-rounded">edit</span>
                      <p>Edit</p>
                    </div>
                    <a
                      href="#"
                      class="hapus material-symbols-rounded"
                      onclick="hapusUser(123, 'Zaki')"
                      >delete</a
                    >
                  </div>
                </div>
              </div>
              <div class="user">
                <div class="left">
                  <div class="user-icon">
                    <span class="material-symbols-rounded">person</span>
                  </div>
                  <div class="user-name">
                    <h2 class="nama">Galang</h2>
                    <p class="id-email">128921</p>
                  </div>
                </div>
                <div class="right">
                  <p class="role">User</p>
                  <div class="action-btn">
                    <div class="btn reset">
                      <span class="material-symbols-rounded">history</span>
                      <p onclick="resetPasswd(123, 'Zaki')">Reset</p>
                    </div>
                    <div class="btn edit">
                      <span class="material-symbols-rounded">edit</span>
                      <p>Edit</p>
                    </div>
                    <a
                      href="#"
                      class="hapus material-symbols-rounded"
                      onclick="hapusUser(123, 'Zaki')"
                      >delete</a
                    >
                  </div>
                </div>
              </div>
              <div class="user">
                <div class="left">
                  <div class="user-icon">
                    <span class="material-symbols-rounded">person</span>
                  </div>
                  <div class="user-name">
                    <h2 class="nama">Fadel</h2>
                    <p class="id-email">1928731</p>
                  </div>
                </div>
                <div class="right">
                  <p class="role">User</p>
                  <div class="action-btn">
                    <div class="btn reset">
                      <span class="material-symbols-rounded">history</span>
                      <p onclick="resetPasswd(123, 'Zaki')">Reset</p>
                    </div>
                    <div class="btn edit">
                      <span class="material-symbols-rounded">edit</span>
                      <p>Edit</p>
                    </div>
                    <a
                      href="#"
                      class="hapus material-symbols-rounded"
                      onclick="hapusUser(123, 'Zaki')"
                      >delete</a
                    >
                  </div>
                </div>
              </div>
              <div class="user">
                <div class="left">
                  <div class="user-icon">
                    <span class="material-symbols-rounded">person</span>
                  </div>
                  <div class="user-name">
                    <h2 class="nama">Dzaki Alfandi</h2>
                    <p class="id-email">185719</p>
                  </div>
                </div>
                <div class="right">
                  <p class="role">User</p>
                  <div class="action-btn">
                    <div class="btn reset">
                      <span class="material-symbols-rounded">history</span>
                      <p onclick="resetPasswd(123, 'Zaki')">Reset</p>
                    </div>
                    <div class="btn edit">
                      <span class="material-symbols-rounded">edit</span>
                      <p>Edit</p>
                    </div>
                    <a
                      href="#"
                      class="hapus material-symbols-rounded"
                      onclick="hapusUser(123, 'Zaki')"
                      >delete</a
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Main Content -->
      </div>
      <!-- End Konten -->
    </div>
    <!-- End Container -->
    <!-- Edit user modal -->
    <div class="modal-container edit-user">
      <div class="formulir">
        <h1>Edit Laporan</h1>
        <form action="">
          <div class="form-field">
            <label for="nama-pembawa">Nama Pembawa</label>
            <input type="text" id="nama-pembawa" name="nama-pembawa" />
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
          <div id="field-nama"></div>
          <div class="multi-field">
            <div class="form-field fokus">
              <label for="tanggal">Tanggal</label>
              <input type="date" id="tanggal" name="tanggal" />
            </div>
          </div>
          <div class="form-field">
            <label for="keterangan">Keterangan</label>
            <input type="text" id="keterangan" name="keterangan" />
          </div>
          <div class="tombol-aksi">
            <span id="cancel" onclick="closeModal(editModalContainer)"
              >Batal</span
            >
            <button name="submit" id="submit">Simpan</button>
          </div>
        </form>
      </div>
    </div>
    <!-- End edit user modal -->
    <!-- Reset user passwd modal -->
    <div class="modal-container reset-passwd-modal-container">
      <div class="reset-passwd-modal formulir">
        <h2>Reset sandi pengguna <span class="nama-pengguna"></span></h2>
        <form action="" method="post" name="reset-passwd">
          <div class="form-field">
            <label for="new-passwd">Sandi Baru</label>
            <input type="password" id="new-passwd" name="new-passwd" />
          </div>
          <div class="form-field">
            <label for="retype-passwd">Ketik ulang sandi</label>
            <input type="password" id="retype-passwd" name="retype-passwd" />
          </div>
        </form>
        <p>
          <strong>Peringatan!</strong> Anda akan melakukan reset sandi untuk
          pengguna <span class="nama-pengguna"></span> tanpa sepengetahuannya.
          Mohon beri tahu <span class="nama-pengguna"></span> jika anda telah
          melakukan reset sandi untuk akunnya.
        </p>
        <div class="controls">
          <button class="close-btn" onclick="closeModal(resetPasswdModal)">
            Batal
          </button>
          <button
            type="submit"
            name="reset-sandi"
            class="submit-btn"
            form="reset-passwd"
          >
            Simpan
          </button>
        </div>
      </div>
    </div>
    <!-- modal alert box-->
    <div class="popup">
      <div class="popup-content">
        <h2>Peringatan</h2>
        <p>Anda yakin ingin menghapus pengguna ...</p>
        <div class="controls">
          <button class="close-btn" onclick="closeModal(popup)">Batal</button>
          <a href="" class="submit-btn">Hapus</a>
        </div>
      </div>
    </div>
    <!-- End modal alert box -->
    <script src="/assets/js/navmenu.js"></script>
    <script src="/assets/js/users.js"></script>
    <script src="/assets/js/script.js"></script>
  </body>
</html>
