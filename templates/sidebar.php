<div class="navmenu">
  <div class="navmenu-content">
    <div class="links">
      <div class="link">
        <span class="material-symbols-rounded menu-btn">menu</span>
      </div>
      <a href="/pages/dashboard.php">
        <div class="link <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>">
          <span class="material-symbols-rounded">dashboard</span>
          <p>Dashboard</p>
        </div>
      </a>
      <div class="dropdown">
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
      </div>
    </div>
  </div>
</div>
