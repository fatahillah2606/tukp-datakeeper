<div class="navbar admin">
  <div class="left-cont">
    <span class="material-symbols-rounded menu-btn">menu</span>
    <div class="logo">
      <img src="/assets/images/logo.svg" alt="Logo" />
      <p>TUKP Data Keeper</p>
    </div>
  </div>
  <div class="right-cont">
    <div class="notif">
      <span class="notif-count"></span>
      <span class="material-symbols-rounded">notifications</span>
    </div>
    <div class="profile">
      <span class="material-symbols-rounded">person</span>
    </div>
  </div>
  <!-- Notifikasi -->
  <div class="notifikasi">
    <div class="head">
      <h2>Notifikasi</h2>
      <span class="material-symbols-rounded">close</span>
    </div>
    <div class="content">
      <!-- Ajax -->
    </div>
  </div>
  <!-- Profile menu -->
  <div class="profile-menu">
    <span class="material-symbols-rounded close-pf-menu">close</span>
    <p class="user-id">
      <?php echo $_SESSION['email_pengguna']; ?>
    </p>
    <div class="user-image">
      <span class="material-symbols-rounded">person</span>
    </div>
    <p class="nama">
      Halo,
      <span
        ><?php echo $_SESSION['nama_pengguna']; ?></span
      >
    </p>
    <a href="#" class="akun" onclick="editUser('<?php echo $_SESSION['email_pengguna']; ?>', '<?php echo $_SESSION['peran_pengguna']; ?>')">Kelola akun anda</a>
    <div class="multi-tombol">
      <a href="/pages/users/kelola-pengguna.php" class="kelola-pengguna">
        <div class="tombol">
          <span class="material-symbols-rounded">manage_accounts</span>
          <p>Kelola Pengguna</p>
        </div>
      </a>
      <a href="/logout.php">
        <div class="tombol">
          <span class="material-symbols-rounded">logout</span>
          <p>Keluar</p>
        </div>
      </a>
    </div>
    <div class="tombol">
      <span class="material-symbols-rounded">dark_mode</span>
      <p>Mode Gelap</p>
      <div class="saklar">
        <span class="material-symbols-rounded">check</span>
      </div>
    </div>
  </div>
</div>
<!-- user modal -->
<?php require $_SERVER['DOCUMENT_ROOT'] . "/templates/modals/user-manager.html" ?>
<!-- End user modal -->