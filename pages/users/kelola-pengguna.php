<?php
require '../../includes/login-info.php';
if ($_COOKIE['user-type'] !== 'Admin') {
  header("Location: /errors/403.php");
  exit();
}

$cari = '';
if (isset($_GET['search'])) {
  $cari = $_GET['search'];
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
                    value="<?php echo $cari; ?>"
                  />
                </div>
                <div class="tambah" onclick="newUser()">
                  <span class="material-symbols-rounded">add</span>
                  <span>Tambah</span>
                </div>
              </div>
            </div>
            <div class="users">
              <!-- Ajax -->
            </div>
          </div>
        </div>
        <!-- End Main Content -->
      </div>
      <!-- End Konten -->
    </div>
    <!-- End Container -->
    <!-- user modal -->
    <?php require "../../templates/modals/user-manager.php" ?>
    <!-- End user modal -->

    <!-- Reset user passwd modal -->
    <div class="modal-container reset-passwd-modal-container">
      <div class="reset-passwd-modal formulir">
        <h2>Reset sandi pengguna <span class="nama-pengguna"></span></h2>
        <form action="" method="post" name="reset-passwd">
          <div class="form-field">
            <label for="new-passwd">Sandi Baru</label>
            <input type="password" id="new-passwd" name="new-passwd" />
            <span class="material-symbols-rounded field-error">error</span>
            <span class="supporting-text">Supporting text</span>
          </div>
          <div class="form-field">
            <label for="retype-passwd">Ketik ulang sandi</label>
            <input type="password" id="retype-passwd" name="retype-passwd" />
            <span class="material-symbols-rounded field-error">error</span>
            <span class="supporting-text">Supporting text</span>
          </div>
          <div class="show-passwd">
            <input type="checkbox" name="tampil-sandi" id="tampilkan-sandi" />
            <label for="tampilkan-sandi">Tampilkan sandi</label>
          </div>
          <p>
            <strong>Peringatan!</strong> Anda akan melakukan reset sandi untuk
            pengguna <span class="nama-pengguna"></span> tanpa sepengetahuannya.
            Mohon beri tahu <span class="nama-pengguna"></span> jika anda telah
            melakukan reset sandi untuk akunnya.
          </p>
          <div class="controls">
            <button
              class="close-btn"
              type="reset"
              onclick="closeModal(resetPasswdModal)"
            >
              Batal
            </button>
            <button
              type="submit"
              name="reset-sandi"
              class="submit-btn"
            >
              Simpan
            </button>
        </form>
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
          <a href="#" class="submit-btn">Hapus</a>
        </div>
      </div>
    </div>
    <!-- End modal alert box -->
    <script src="/assets/js/navmenu.js"></script>
    <script src="/assets/js/users.js"></script>
    <script src="/assets/js/script.js"></script>
    <script type="text/javascript">
      let usersContainer = document.querySelector(".users");

      function muatData() {
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "/functions/users-manager.php?dataPengguna=true", true);
        xhr.onload = function () {
          if (xhr.status === 200) {
            usersContainer.innerHTML = xhr.responseText;
            whoAiAm();
            searchData();
          } else {
            usersContainer.innerHTML = "Kesalahan: " + xhr.status;
          }
        };
        xhr.send();
      }

      muatData();
    </script>
  </body>
</html>
