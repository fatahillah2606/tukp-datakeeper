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
        <title>Catat Barang Internal - TUKP Data Keeper</title>
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
                <!-- Navbar -->
                <nav class="navbar px-4 overflow-hidden">
                    <div class="logo d-flex gap-2 align-items-center">
                        <img src="/assets/images/logo.svg" alt="Logo TUKP" />
                        <span>TUKP Data Keeper</span>
                    </div>
                </nav>
                <main class="content p-4">
                    <!-- Formulir -->
                    <div class="card overflow-hidden" id="formulir">
                        <h5 class="card-header">Catat Barang Internal</h5>
                        <div class="card-body">
                            <form action="" method="post" id="form-pencatatan">
                                <div class="mb-3">
                                    <label for="nama-pembawa" class="form-label"
                                        >Nama Pembawa</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="nama-pembawa"
                                        placeholder=""
                                    />
                                </div>
                                <h5>Barang</h5>
                                <div class="row align-items-end">
                                    <div class="col">
                                        <label
                                            for="nama-barang"
                                            class="form-label"
                                            >Nama Barang</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="nama-barang"
                                            placeholder=""
                                        />
                                    </div>
                                    <div class="col">
                                        <label
                                            for="jumlah-barang"
                                            class="form-label"
                                            >Jumlah Barang</label
                                        >
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="jumlah-barang"
                                            placeholder=""
                                        />
                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-danger">
                                            <span
                                                class="material-symbols-rounded"
                                            >
                                                delete
                                            </span>
                                        </button>
                                    </div>
                                </div>
                                <button
                                    type="button"
                                    class="btn btn-outline-success my-3"
                                >
                                    Tambah
                                </button>
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
                                    <label for="keterangan" class="form-label"
                                        >keterangan</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="keterangan"
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
            // muatDataBarangInternal(10);
        </script>
    </body>
</html>
