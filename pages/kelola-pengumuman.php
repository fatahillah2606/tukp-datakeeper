<?php
require $_SERVER['DOCUMENT_ROOT'] . '/includes/login-info.php';
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
    <title>Kelola Pengumuman | TUKP Data Keeper</title>
    <link rel="stylesheet" href="/assets/css/style.css" />
    <link rel="stylesheet" href="/assets/css/pengumuman.css" />
    <link rel="stylesheet" href="/assets/css/style-dark.css" />
    <link rel="stylesheet" href="/assets/css/navmenu.css" />
  </head>
  <body>
    <div class="container">
      <!-- Sidebar -->
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/templates/sidebar.php'; ?>
      <!-- End Sidebar -->
      <!-- Konten -->
      <div class="konten">
        <!-- Navbar -->
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/templates/admin-navbar.php'; ?>
        <!-- End Navbar -->
        <!-- Main Content -->
        <div class="main-content">
          <!-- header -->
          <div class="header user-manager">
            <h1>Daftar Pengumuman</h1>
          </div>
          <!-- End Header -->
          <div class="konten-pengumuman">
            <div class="head">
              <h2>Kelola Pengumuman</h2>
              <div class="head-action">
                <div class="tambah" onclick="buatPengumuman()">
                  <span class="material-symbols-rounded">add</span>
                  <span>Buat</span>
                </div>
              </div>
            </div>
            <div class="pengumuman">
              <!-- Ajax -->
            </div>
          </div>
        </div>
        <!-- End Main Content -->
      </div>
      <!-- End Konten -->
    </div>
    <!-- End Container -->

    <script src="/assets/js/navmenu.js"></script>
    <script src="/assets/js/script.js"></script>
    <script src="/assets/js/formulir.js"></script>
    <script src="/assets/js/pengumuman.js"></script>
  </body>
</html>
