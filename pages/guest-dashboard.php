<?php
if (isset($_COOKIE['user-type']) && $_COOKIE['user-type'] !== "Tamu") {
  header ("Location: dashboard.php");
  exit();
}
if (isset($_GET["token"])) {
  require $_SERVER['DOCUMENT_ROOT'] . '/functions/login-process.php';
  verifToken(htmlspecialchars($_GET["token"]), $conn);
}
require $_SERVER['DOCUMENT_ROOT'] . '/includes/login-info.php';
?>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard | TUKP Data Keeper</title>
    <link rel="stylesheet" href="/assets/css/style.css" />
    <link rel="stylesheet" href="/assets/css/style-dark.css" />
    <!-- Pisahkan bagian ini -->
    <link rel="stylesheet" href="/assets/css/navmenu.css" />
  </head>
  <body>
    <div class="container">
      <!-- Sidebar -->
      <?php
        if ($_COOKIE['user-type'] !== "Tamu") {
          require $_SERVER['DOCUMENT_ROOT'] . '/templates/sidebar.php';
        } else {
          require $_SERVER['DOCUMENT_ROOT'] . '/templates/guest-sidebar.php';
        }
      ?>
      <!-- End Sidebar -->
      <!-- Konten -->
      <div class="konten">
        <!-- Navbar -->
        <?php
          if ($_COOKIE['user-type'] !== "Tamu") {
            if ($_COOKIE['user-type'] === 'Admin') {
              require $_SERVER['DOCUMENT_ROOT'] . '/templates/admin-navbar.php';
            } else {
              require $_SERVER['DOCUMENT_ROOT'] . '/templates/user-navbar.php';
            }
          } else {
            require $_SERVER['DOCUMENT_ROOT'] . '/templates/guest-navbar.php';
          }
        ?>
        <!-- End Navbar -->
        <!-- Main Content -->
        <div class="main-content">
          <!-- header -->
          <div class="header">
            <h1 class="nama">Selamat datang, Tamu</h1>
            <div class="kata-sambutan">
              <h1>Mau catat apa?</h1>
              <h1 id="sambutan">Some text</h1>
            </div>
            <div class="tombol">
              <!-- Pilihan awal -->
              <div class="pilihan awal show">
                <a href="catat/catat-pengunjung.php">
                  <div class="tmbl">
                    <p>Catat Pengunjung</p>
                    <span class="material-symbols-rounded">group</span>
                  </div>
                </a>
                <a href="catat/catat-barang-int.php">
                  <div class="tmbl">
                    <p>Catat Barang Internal</p>
                    <span class="material-symbols-rounded">place_item</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <!-- End Header -->
        </div>
        <!-- End Main Content -->
      </div>
      <!-- End Konten -->
    </div>
    <!-- End Container -->
    <script src="/assets/js/navmenu.js"></script>
    <script src="/assets/js/script.js"></script>
    <script src="/assets/js/formulir.js"></script>
  </body>
</html>
