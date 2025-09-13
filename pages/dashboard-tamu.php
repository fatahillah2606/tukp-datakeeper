<?php
// reuire $_SERVER['DOCUMENT_ROOT'] . ''

// cek sesi 
session_start();
if (!isset($_SESSION["role"])) {

    // Pindah user ke halaman login
    header("Location: /");
    exit();
} else {
    if ($_SESSION["role"]  !== "Tamu") {
        header("Location: /pages/dashboard.php");
        exit();
    }
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
        <style>
            .layout {
                grid-template-columns: 0px 1fr !important;
            }
        </style>
    </head>
    <body>
        <div class="layout default">
            <!-- Bagian Sidebar -->
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php"; ?>
            <!--  -->
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
                                <a href="catat-data/pengunjung.php">
                                    <div
                                        class="p-3 bg-success text-white rounded"
                                    >
                                        <span
                                            class="menu-title bg-success text-white rounded"
                                            >Catat Pengunjung</span
                                        >
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="catat-data/barang-internal.php">
                                    <div
                                        class="p-3 bg-success text-white rounded"
                                    >
                                        <span
                                            class="menu-title bg-success text-white rounded"
                                            >Catat Barang Internal</span
                                        >
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="catat-data/barang-eksternal.php">
                                    <div
                                        class="p-3 bg-success text-white rounded"
                                    >
                                        <span
                                            class="menu-title bg-success text-white rounded"
                                            >Catat Barang Eksternal</span
                                        >
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="catat-data/mobil.php">
                                    <div
                                        class="p-3 bg-success text-white rounded"
                                    >
                                        <span
                                            class="menu-title bg-success text-white rounded"
                                            >Catat Mobil</span
                                        >
                                    </div>
                                </a>
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
