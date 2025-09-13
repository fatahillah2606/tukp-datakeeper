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
        <title>Kelola Pengumuman - TUKP Data Keeper</title>
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
            <div class="main">
                <!-- Bagian Navbar -->
                <?php include $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php"; ?>
                <main class="content p-4">
                    <!-- Formulir -->
                    <div class="card overflow-hidden" id="formulir">
                        <h5 class="card-header">Buat Pengumuman</h5>
                        <div class="card-body">
                            <form action="" method="post" id="form-pencatatan">
                                <div class="mb-3">
                                    <label
                                        for="judul-pengumuman"
                                        class="form-label"
                                        >Judul Pengumuman</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="judul-pengumuman"
                                        placeholder=""
                                        maxlength="25"
                                        required
                                    />
                                </div>
                                <div class="mb-3">
                                    <label
                                        for="isi-pengumuman"
                                        class="form-label"
                                        >Isi Pengumuman</label
                                    >
                                    <textarea
                                        class="form-control"
                                        id="isi-pengumuman"
                                        rows="3"
                                        required
                                    ></textarea>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button
                                            type="button"
                                            class="btn btn-outline-success my-3 w-100"
                                        >
                                            Bersihkan
                                        </button>
                                    </div>
                                    <div class="col">
                                        <button
                                            type="button"
                                            class="btn btn-success my-3 w-100"
                                        >
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- List pengumuman -->
                    <div id="list-pengumuman">
                        <h2 class="mb-3">List Pengumuman</h2>
                        <div class="alert alert-success" role="alert">
                            <h1 class="fs-3">Pengumuman</h1>
                            <p>
                                Token Untuk Login Tanggal 01 Juli 2025 : JL1225
                            </p>
                            <button type="button" class="btn btn-danger my-2">
                                Hapus
                            </button>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="/assets/scripts/kelola_data.js"></script>
        <script src="/assets/scripts/navigation.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            muatDataPengumuman();
        </script>
    </body>
</html>
