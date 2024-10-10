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
      <a href="/pages/catat/catat-barang-int.php">
        <div
          class="link <?php echo basename($_SERVER['PHP_SELF']) == 'catat-barang-int.php' ? 'active' : ''; ?>"
        >
          <span class="material-symbols-rounded">edit_document</span>
          <p>Catat Barang Internal</p>
        </div>
      </a>
    </div>
  </div>
</div>
<!-- Snackbar -->
<div class="snackbar">
  <p id="snack-msg">Message here</p>
  <!-- <a href="#" id="snack-action">Action</a> -->
</div>