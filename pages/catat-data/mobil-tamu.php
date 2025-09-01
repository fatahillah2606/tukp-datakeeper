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
        <title>Catat Mobil - TUKP Data Keeper</title>
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
        <div class="layout">
            <!-- Sidebar -->
            <aside class="sidebar p-2">
            </aside>
            <div class="main">
                <main class="content p-4">
                    <!-- Formulir -->
                    <div class="card overflow-hidden" id="formulir">
                        <h5 class="card-header">Catat Mobil</h5>
                        <div class="card-body">
                            <form action="" method="post" id="form-pencatatan">
                                <div class="mb-3">
                                    <label for="nama-driver" class="form-label"
                                        >Nama Driver</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="nama-driver"
                                        placeholder=""
                                    />
                                </div>
                                <div class="col">
                                        <label
                                            for="merek-kendaraan-"
                                            class="form-label"
                                            >Merek Kendaraan</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="merek-kendaraan"
                                            placeholder=""
                                        />
                                    </div>
                                    <div class="col">
                                        <label
                                            for="nomor-kendaraan"
                                            class="form-label"
                                            >Nomor Kendaraan</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="nomor-kendaraan"
                                            placeholder=""
                                        />
                                    </div>
                                <h5>Kilometer</h5>
                                <div class="row align-items-end">
                                    <div class="col">
                                        <label
                                            for="awal"
                                            class="form-label"
                                            >Awal</label
                                        >
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="awal"
                                            placeholder=""
                                        />
                                    </div>
                                    <div class="col">
                                        <label
                                            for="akhir"
                                            class="form-label"
                                            >Akhir</label
                                        >
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="akhir"
                                            placeholder=""
                                        />
                                    </div>
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label"
                                        >Tanggal</label
                                    >
                                    <input
                                        type="date"
                                        class="form-control"
                                        id="tanggal"
                                        placeholder=""
                                    />
                                </div>
                                <div class="mb-3">
                                    <label for="tujuan" class="form-label"
                                        >Tujuan</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="tujuan"
                                        placeholder=""
                                    />
                                </div>
                                <div class="mb-3">
                                    <label for="keperluan" class="form-label"
                                        >Keperluan</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="keperluan"
                                        placeholder=""
                                    />
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
                </main>
            </div>
        </div>
        <script src="/assets/scripts/kelola_data.js"></script>
        <script src="/assets/scripts/navigation.js"></script>
        <script>
            // muatDataMobil(10);
        </script>
    </body>
</html>
