<?php
require $_SERVER['DOCUMENT_ROOT'] . '/includes/login-info.php';
if (!isset($_SESSION['peran_pengguna'])) {
  header("HTTP/1.1 403");
  exit;
} 
?>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forbidden | TUKP Data Keeper</title>
    <link rel="stylesheet" href="/assets/css/style.css" />
    <link rel="stylesheet" href="/assets/css/style-dark.css" />
    <link rel="stylesheet" href="/assets/css/navmenu.css" />
    <link rel="stylesheet" href="/assets/css/error.css" />
  </head>
  <body>
    <div class="container">
      <!-- Sidebar -->
      <?php
      if (isset($_SESSION['peran_pengguna'])) {
        if ($_SESSION['peran_pengguna'] !== 'Tamu') {
          require $_SERVER['DOCUMENT_ROOT'] . '/templates/sidebar.php';
        } else {
          require $_SERVER['DOCUMENT_ROOT'] . '/templates/guest-sidebar.php';
        }
      }
      ?>
      <!-- End Sidebar -->
      <!-- Konten -->
      <div class="konten">
        <!-- Navbar -->
        <?php
          if (isset($_SESSION['peran_pengguna'])) {
            if ($_SESSION['peran_pengguna'] == 'Admin') {
              require $_SERVER['DOCUMENT_ROOT'] . '/templates/admin-navbar.php';
            } else if ($_SESSION['peran_pengguna'] == 'User'){
              require $_SERVER['DOCUMENT_ROOT'] . '/templates/user-navbar.php';
            } else {
              require $_SERVER['DOCUMENT_ROOT'] . '/templates/guest-navbar.html';
            }
          }
        ?>
        <!-- End Navbar -->
        <!-- Main Content -->
        <div class="main-content">
          <h1>403</h1>
          <h3>Anda tidak diizinkan untuk mengakses halaman ini</h3>
          <?php
            if (isset($_SESSION['peran_pengguna'])) {
              echo '<p>Cobalah ke halaman lain atau kembali ke <a href="/pages/dashboard.php">Beranda</a>.</p>';
            } else {
              echo '<p>Cobalah ke halaman lain atau kembali ke <a href="/pages/guest-dashboard.php">Beranda</a>.</p>';
            }
          ?>
        </div>
      </div>
      <!-- End Konten -->
    </div>
    <script src="/assets/js/navmenu.js"></script>
  </body>
</html>
