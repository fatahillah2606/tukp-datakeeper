<?php
// reuire $_SERVER['DOCUMENT_ROOT'] . ''

// cek sesi 
session_start();
if (!isset($_SESSION["role"])) {

    // Pindah user ke halaman login
    header("Location: /");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Dashboard - TUKP Data Keeper</title>
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
        />
        <link
            rel="stylesheet"
            href="/assets/bootstrap-5.3.5-dist/css/bootstrap.min.css"
        />
        <!-- local css -->
        <link rel="stylesheet" href="/assets/style/style.css" />
        <style>.layout {grid-template-columns: 0px 1fr !important;}</style>
    </head>
    <body>
        <div class="layout default">
            <!-- Sidebar -->
            <aside class="sidebar p-2">
            </aside>
            <div class="main">
                <!-- Navbar -->
                <nav class="navbar px-4 overflow-hidden">
                    <div class="logo d-flex gap-2 align-items-center">
                        <img src="/assets/images/logo.svg" alt="Logo TUKP" />
                        <span>TUKP Data Keeper</span>
                    </div>
                </nav>
                <main class="content p-4">
                    <h1 class="display-4 fw-normal mb-1 ms-3">
                        Selamat Datang,
                        <?php echo $_SESSION["nama_user"]; ?>
                    </h1>
                    <h2 class="h2 fw-normal text-muted mb-4 ms-3">
                        Mau Catat Apa Hari Ini?
                    </h2>
                    <div class="container px-4 text-center">
                        <div class="row gx-5">
                            <div class="col">
                                <div class="p-3 bg-success text-white rounded">
                                    <a href="catat-data/pengunjung-tamu.php">
                                        <span
                                            class="menu-title bg-success text-white rounded"
                                            >Catat Pengunjung</span
                                        >
                                    </a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="p-3 bg-success text-white rounded">
                                    <a
                                        href="catat-data/barang-internal-tamu.php"
                                    >
                                        <span
                                            class="menu-title bg-success text-white rounded"
                                            >Catat Barang Internal</span
                                        >
                                    </a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="p-3 bg-success text-white rounded">
                                    <a
                                        href="catat-data/barang-eksternal-tamu.php"
                                    >
                                        <span
                                            class="menu-title bg-success text-white rounded"
                                            >Catat Barang Eksternal</span
                                        >
                                    </a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="p-3 bg-success text-white rounded">
                                    <a href="catat-data/mobil-tamu.php">
                                        <span
                                            class="menu-title bg-success text-white rounded"
                                            >Catat Mobil</span
                                        >
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="/assets/scripts/kelola_data.js"></script>
        <script src="/assets/scripts/navigation.js"></script>
    </body>
</html>
