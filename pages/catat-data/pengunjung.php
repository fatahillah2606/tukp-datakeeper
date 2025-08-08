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
        <title>Catat Pengunjung - TUKP Data Keeper</title>
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
            <aside class="sidebar p-2">
                <!-- buttons -->
                <div class="mb-3">
                    <button
                        class="material-symbols-rounded bg-transparent border border-0 p-2"
                        id="menu-btn"
                    >
                        menu
                    </button>
                </div>
                <a href="../dashboard.php">
                    <span class="material-symbols-rounded">dashboard</span>
                    <span class="menu-title">Dashboard</span>
                </a>
                <hr />
                <!-- Pencatatan -->
                <a href="../catat-data/pengunjung.php">
                    <span class="material-symbols-rounded">person_edit</span>
                    <span class="menu-title">Catat Pengunjung</span>
                </a>
                <a href="../catat-data/barang-internal.php">
                    <span class="material-symbols-rounded">note_alt</span>
                    <span class="menu-title">Catat Barang Internal</span>
                </a>
                <a href="../catat-data/barang-eksternal.php">
                    <span class="material-symbols-rounded">edit_document</span>
                    <span class="menu-title">Catat Barang Eksternal</span>
                </a>
                <a href="../catat-data/mobil.php">
                    <span class="material-symbols-rounded">edit_road</span>
                    <span class="menu-title">Catat Mobil</span>
                </a>
                <hr />
                <!-- Lihat laporan -->
                <a href="../lihat-data/pengunjung.php">
                    <span class="material-symbols-rounded">group</span>
                    <span class="menu-title">Lihat Pengunjung</span>
                </a>
                <a href="../lihat-data/barang-internal.php">
                    <span class="material-symbols-rounded"
                        >content_paste_search</span
                    >
                    <span class="menu-title">Lihat Barang Internal</span>
                </a>
                <a href="../lihat-data/barang-eksternal.php">
                    <span class="material-symbols-rounded">description</span>
                    <span class="menu-title">Lihat Barang Eksternal</span>
                </a>
                <a href="../lihat-data/mobil.php">
                    <span class="material-symbols-rounded">speed</span>
                    <span class="menu-title">Lihat Mobil</span>
                </a>
                <hr />
                <a href="../pengumuman.php">
                    <span class="material-symbols-rounded">campaign</span>
                    <span class="menu-title">Pengumuman</span>
                </a>
            </aside>
            <div class="main">
                <!-- Navbar -->
                <nav class="navbar px-4 overflow-hidden">
                    <div class="logo d-flex gap-2 align-items-center">
                        <img src="/assets/images/logo.svg" alt="Logo TUKP" />
                        <span>TUKP Data Keeper</span>
                    </div>
                    <!-- button -->
                    <div class="d-flex gap-3 align-items-center">
                        <span class="material-symbols-rounded">
                            notifications
                        </span>
                        <span class="material-symbols-rounded" id="profile"
                            >account_circle</span
                        >
                    </div>
                </nav>
                <main class="content p-4">
                    <!-- Formulir -->
                    <div class="card overflow-hidden" id="formulir">
                        <h5 class="card-header">Catat Pengunjung</h5>
                        <div class="card-body">
                            <form action="" method="post" id="form-pencatatan">
                                <div class="mb-3">
                                    <label for="nama-pengunjung" class="form-label"
                                        >Nama Pengunjung</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="nama-pengunjung"
                                        placeholder=""
                                    />
                                </div>
                                 <button
                                    type="button"
                                    class="btn btn-outline-success my-3"
                                >
                                    Tambah
                                </button>
                                <div class="mb-3">
                                    <label for="nomor-kendaraan" class="form-label"
                                        >Nomor Kendaraan</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="nomor-kendaraan"
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
                                    <label for="nomor-telepon" class="form-label"
                                        >Nomor Telepon</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="nomor-telepon"
                                        placeholder=""
                                    />
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label"
                                        >Keterangan</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="keterangan"
                                        placeholder=""
                                    />
                                </div>
                                 <div class="safety">
                                    <p>Apakah Sudah Dilakukan Safety Induction Oleh Security ?</p>
                                    <div class="form-radio">
                                    <input
                                        type="radio"
                                        id="ya"
                                        name="safety_induction"
                                        value="Ya"
                                        required
                                    />
                                    <label for="ya">Ya</label>
                                    </div>
                                    <div class="form-radio" style="margin-bottom: 1px">
                                    <input
                                        type="radio"
                                        id="tidak"
                                        name="safety_induction"
                                        value="Tidak"
                                        required
                                    />
                                    <label for="tidak">Tidak</label>
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
