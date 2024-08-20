<div class="navmenu">
  <div class="navmenu-content">
    <div class="links">
      <div class="link">
        <span class="material-symbols-rounded menu-btn">menu</span>
      </div>
      <a href="/pages/guest-dashboard.php">
        <div class="link <?php echo basename($_SERVER['PHP_SELF']) == 'guest-dashboard.php' ? 'active' : ''; ?>">
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
        <div class="drop-menu guest">
          <a href="/pages/catat/catat-pengunjung.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'catat-pengunjung.php' ? 'active' : ''; ?>">Catat Pengunjung</a>
          <a href="/pages/catat/catat-barang-int.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'catat-barang-int.php' ? 'active' : ''; ?>">Catat Barang Internal</a>
        </div>
      </div>
    </div>
  </div>
</div>
