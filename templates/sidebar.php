<div class="navmenu">
  <div class="navmenu-content">
    <div class="links">
      <div class="link">
        <span class="material-symbols-rounded menu-btn">menu</span>
      </div>
      <a href="/pages/dashboard.php">
        <div
          class="link <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>"
        >
          <span class="material-symbols-rounded">dashboard</span>
          <p>Dashboard</p>
        </div>
      </a>
      <div class="batas">
        <div class="garis-batas"></div>
        <h2>Pencatatan</h2>
      </div>
      <a href="/pages/catat/catat-pengunjung.php">
        <div
          class="link <?php echo basename($_SERVER['PHP_SELF']) == 'catat-pengunjung.php' ? 'active' : ''; ?>"
        >
          <span class="material-symbols-rounded">person_edit</span>
          <p>Catat Pengunjung</p>
        </div>
      </a>
      <a href="/pages/catat/catat-barang-ext.php">
        <div
          class="link <?php echo basename($_SERVER['PHP_SELF']) == 'catat-barang-ext.php' ? 'active' : ''; ?>"
        >
          <span class="material-symbols-rounded">note_alt</span>
          <p>Catat Barang Eksternal</p>
        </div>
      </a>
      <a href="/pages/catat/catat-barang-int.php">
        <div
          class="link <?php echo basename($_SERVER['PHP_SELF']) == 'catat-barang-int.php' ? 'active' : ''; ?>"
        >
          <span class="material-symbols-rounded">edit_document</span>
          <p>Catat Barang Internal</p>
        </div>
      </a>
      <a href="/pages/catat/catat-mobil.php">
        <div
          class="link <?php echo basename($_SERVER['PHP_SELF']) == 'catat-mobil.php' ? 'active' : ''; ?>"
        >
          <span class="material-symbols-rounded">edit_road</span>
          <p>Catat Kilometer Mobil</p>
        </div>
      </a>
      <a href="/pages/catat/catat-perbaikan.php">
        <div
          class="link <?php echo basename($_SERVER['PHP_SELF']) == 'catat-perbaikan.php' ? 'active' : ''; ?>"
        >
          <span class="material-symbols-rounded">construction</span>
          <p>Service Record</p>
        </div>
      </a>
      <div class="batas">
        <div class="garis-batas"></div>
        <h2>Rekaman data</h2>
      </div>
      <a href="/pages/lihat/lihat-pengunjung.php">
        <div
          class="link <?php echo basename($_SERVER['PHP_SELF']) == 'lihat-pengunjung.php' ? 'active' : ''; ?>"
        >
          <span class="material-symbols-rounded">group</span>
          <p>Lihat Pengunjung</p>
        </div>
      </a>
      <a href="/pages/lihat/lihat-barang-ext.php">
        <div
          class="link <?php echo basename($_SERVER['PHP_SELF']) == 'lihat-barang-ext.php' ? 'active' : ''; ?>"
        >
          <span class="material-symbols-rounded">content_paste_search</span>
          <p>Lihat Barang Eksternal</p>
        </div>
      </a>
      <a href="/pages/lihat/lihat-barang-int.php">
        <div
          class="link <?php echo basename($_SERVER['PHP_SELF']) == 'lihat-barang-int.php' ? 'active' : ''; ?>"
        >
          <span class="material-symbols-rounded">description</span>
          <p>Lihat Barang Internal</p>
        </div>
      </a>
      <a href="/pages/lihat/lihat-mobil.php">
        <div
          class="link <?php echo basename($_SERVER['PHP_SELF']) == 'lihat-mobil.php' ? 'active' : ''; ?>"
        >
          <span class="material-symbols-rounded">speed</span>
          <p>Lihat Kilometer Mobil</p>
        </div>
      </a>
      <a href="/pages/lihat/lihat-perbaikan.php">
        <div
          class="link <?php echo basename($_SERVER['PHP_SELF']) == 'lihat-perbaikan.php' ? 'active' : ''; ?>"
        >
          <span class="material-symbols-rounded">home_repair_service</span>
          <p>Service Record</p>
        </div>
      </a>
      <?php
      if ($_SESSION['peran_pengguna'] === "Admin") {
        ?>
          <div class="batas">
            <div class="garis-batas"></div>
          </div>
          <a href="/pages/kelola-pengumuman.php">
            <div
              class="link <?php echo basename($_SERVER['PHP_SELF']) == 'kelola-pengumuman.php' ? 'active' : ''; ?>"
            >
              <span class="material-symbols-rounded">campaign</span>
              <p>Kelola Pengumuman</p>
            </div>
          </a>
        <?php
      }
      ?>
      <!-- <div class="dropdown">
        <div class="link">
          <span class="material-symbols-rounded">edit_document</span>
          <p>Pencatatan</p>
          <span class="material-symbols-rounded down-icon"
            >keyboard_arrow_down</span
          >
        </div>
        <div class="drop-menu">
          <a href="/pages/catat/catat-pengunjung.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'catat-pengunjung.php' ? 'active' : ''; ?>">Catat Pengunjung</a>
          <a href="/pages/catat/catat-barang-ext.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'catat-barang-ext.php' ? 'active' : ''; ?>">Catat Barang External</a>
          <a href="/pages/catat/catat-barang-int.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'catat-barang-int.php' ? 'active' : ''; ?>">Catat Barang Internal</a>
          <a href="/pages/catat/catat-mobil.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'catat-mobil.php' ? 'active' : ''; ?>">Catat Mobil</a>
        </div>
      </div>
      <div class="dropdown">
        <div class="link">
          <span class="material-symbols-rounded">description</span>
          <p>Lihat Data</p>
          <span class="material-symbols-rounded down-icon"
            >keyboard_arrow_down</span
          >
        </div>
        <div class="drop-menu">
          <a href="/pages/lihat/lihat-pengunjung.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'lihat-pengunjung.php' ? 'active' : ''; ?>">Lihat Pengunjung</a>
          <a href="/pages/lihat/lihat-barang-ext.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'lihat-barang-ext.php' ? 'active' : ''; ?>">Lihat Barang external</a>
          <a href="/pages/lihat/lihat-barang-int.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'lihat-barang-int.php' ? 'active' : ''; ?>">Lihat Barang internal</a>
          <a href="/pages/lihat/lihat-mobil.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'lihat-mobil.php' ? 'active' : ''; ?>">Lihat Mobil</a>
        </div>
      </div> -->
    </div>
  </div>
</div>
<!-- Snackbar -->
<div class="snackbar">
  <p id="snack-msg">Message here</p>
  <a href="#" id="snack-action">Action</a>
</div>