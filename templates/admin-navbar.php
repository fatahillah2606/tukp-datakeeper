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
      <div class="notif-container">
        <?php
          // Ambil data notifikasi
          $permintaanReset = "SELECT * FROM reset_sandi";
          $cekPermintaan = $conn->query($permintaanReset);
          if ($cekPermintaan->num_rows > 0) {
            while ($barisNotif = $cekPermintaan->fetch_assoc()) {
              $identitas;
              if ($barisNotif['userId']) {
                $identitas = $barisNotif['id_email_user'];
              } else {
                $identitas = $barisNotif['nama_user'];
              }
        ?>
        <a href="/pages/users/kelola-pengguna.php?search=<?php echo $identitas ?>" class="notif-menu">
          <span class="material-symbols-rounded">passkey</span>
          <div class="notif-text">
            <h2>Permintaan reset sandi</h2>
            <p><?php echo $barisNotif['nama_user']; ?> meminta untuk mengatur ulang sandinya</p>
          </div>
        </a>
        <?php
            }
          }
        ?>
      </div>
      <!-- Tampilkan jika tidak ada notifikasi -->
       <?php
        if ($cekPermintaan->num_rows <= 0) {
       ?>
      <p class="no-notif">Tidak ada Notifikasi</p>
      <?php
        }
      ?>
    </div>
  </div>
  <!-- Profile menu -->
  <div class="profile-menu">
    <span class="material-symbols-rounded close-pf-menu">close</span>
    <p class="user-id">
      <?php echo (isset($_COOKIE['user-type'])) ? $_COOKIE['user-id'] : ''; ?>
    </p>
    <div class="user-image">
      <span class="material-symbols-rounded">person</span>
    </div>
    <p class="nama">
      Halo,
      <span
        ><?php echo (isset($_COOKIE['user-type'])) ? $_COOKIE['user-name'] : ''; ?></span
      >
    </p>
    <a href="#" class="akun" onclick="newUser()">Kelola akun anda</a>
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
<!-- Snackbar -->
<div class="snackbar">
  <p id="snack-msg">Message here</p>
  <a href="#" id="snack-action">Action</a>
</div>
