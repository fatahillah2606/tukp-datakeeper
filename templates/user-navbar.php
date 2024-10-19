<div class="navbar">
  <div class="left-cont">
    <span class="material-symbols-rounded menu-btn">menu</span>
    <div class="logo">
      <img src="/assets/images/logo.svg" alt="Logo" />
      <p>TUKP Data Keeper</p>
    </div>
  </div>
  <div class="right-cont">
    <div class="profile">
      <span class="material-symbols-rounded">person</span>
    </div>
  </div>
  <!-- Profile menu -->
  <div class="profile-menu">
    <span class="material-symbols-rounded close-pf-menu">close</span>
    <p class="user-id"><?php echo $_SESSION['nomor_id']; ?></p>
    <div class="user-image">
      <span class="material-symbols-rounded">person</span>
    </div>
    <p class="nama">Halo, <span><?php echo $_SESSION['nama_pengguna']; ?></span></p>
    <a href="/pages/users/edit.html" class="akun">Kelola akun anda</a>
    <div class="multi-tombol">
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