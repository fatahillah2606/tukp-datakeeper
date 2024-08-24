<?php
if (!isset($_COOKIE['user-type'])) {
  header("HTTP/1.1 500");
  exit;
}
?>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Internal Server Error | TUKP Data Keeper</title>
    <link rel="stylesheet" href="/assets/css/style.css" />
    <link rel="stylesheet" href="/assets/css/style-dark.css" />
    <link rel="stylesheet" href="/assets/css/navmenu.css" />
    <link rel="stylesheet" href="/assets/css/error.css" />
  </head>
  <body>
    <div class="container">
      <!-- Sidebar -->
      <?php
      if (isset($_COOKIE['user-type'])) {
        if ($_COOKIE['user-type'] !== 'Tamu') {
          require '../templates/sidebar.php';
        } else {
          require '../templates/guest-sidebar.php';
        }
      }
      ?>
      <!-- End Sidebar -->
      <!-- Konten -->
      <div class="konten">
        <!-- Navbar -->
        <?php
          if (isset($_COOKIE['user-type'])) {
            if ($_COOKIE['user-type'] == 'Admin') {
              require '../templates/admin-navbar.php';
            } else if ($_COOKIE['user-type'] == 'User'){
              require '../templates/user-navbar.php';
            } else {
              require '../templates/guest-navbar.php';
            }
          }
        ?>
        <!-- End Navbar -->
        <!-- Main Content -->
        <div class="main-content">
          <h1>500</h1>
          <h3>Internal Server Error</h3>
          <?php
            if (isset($_COOKIE['user-type'])) {
              echo '<p>Situs tidak dapat menangani permintaan saat untuk saat ini. Silahkan hubungi <a href="wa.me/6285217488289" target="_blank">Andhika Kurniawan</a></p>';
            } else {
              echo '<p>Situs tidak dapat menangani permintaan saat untuk saat ini. Silahkan hubungi <a href="wa.me/6285217488289" target="_blank">Andhika Kurniawan</a></p>';
            }
          ?>
        </div>
      </div>
      <!-- End Konten -->
    </div>
    <script src="/assets/js/navmenu.js"></script>
  </body>
</html>
