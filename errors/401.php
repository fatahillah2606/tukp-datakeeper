<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Unauthorized | TUKP Data Keeper</title>
    <link rel="stylesheet" href="/assets/css/style.css" />
    <link rel="stylesheet" href="/assets/css/style-dark.css" />
    <link rel="stylesheet" href="/assets/css/navmenu.css" />
    <link rel="stylesheet" href="/assets/css/error.css" />
  </head>
  <body>
    <div class="container">
      <!-- Sidebar -->
      <?php require '../templates/guest-sidebar.php'; ?>
      <!-- End Sidebar -->
      <!-- Konten -->
      <div class="konten">
        <!-- Navbar -->
      <?php require '../templates/guest-navbar.php'; ?>
        <!-- End Navbar -->
        <!-- Main Content -->
        <div class="main-content">
          <h1>401</h1>
          <h3>Unauthorized</h3>
          <?php
            if (isset($_COOKIE['user-type'])) {
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
