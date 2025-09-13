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
        <title>Lihat Data Pengunjung - TUKP Data Keeper</title>
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
    </head>
    <body>
        <div class="layout">
            <!-- Sidebar -->
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php"; ?>
            <!--  -->
            <div class="main">
                <!-- Bagian Navbar -->
                <?php include $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php"; ?>
                <main class="content p-4">
                    <!-- Tabel -->
                    <div class="tabel p-4 rounded-4">
                        <div class="tabel-head">
                            <h3>Data Pengunjung</h3>

                            <!-- search bar -->
                            <form class="row g-3">
                                <div class="col-auto">
                                    <label
                                        for="search-bar"
                                        class="visually-hidden"
                                        >Cari</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="search-bar"
                                        placeholder="Cari..."
                                    />
                                </div>
                                <div class="col-auto">
                                    <button
                                        type="submit"
                                        class="btn mb-3"
                                        id="search"
                                    >
                                        <span class="material-symbols-rounded">
                                            search
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Tabel data -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pengunjung</th>
                                    <th scope="col">Nama Perusahaan</th>
                                    <th scope="col">Nomor Kendaraan</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Nomor Telepon</th>
                                    <th scope="col">Keperluan</th>
                                    <th scope="col">Safety Induction</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider" id="isi-tabel">
                                <tr>
                                    <td colspan="9">Memuat Data</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </main>
            </div>
        </div>
        <script src="/assets/scripts/kelola_data.js"></script>
        <script src="/assets/scripts/navigation.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            muatDataPengunjung(0);
        </script>
    </body>
</html>
