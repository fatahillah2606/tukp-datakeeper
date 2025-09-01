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
        <title>Kelola Pengguna - TUKP Data Keeper</title>
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
                        onclick="togglemenu()"
                    >
                        menu
                    </button>
                </div>
                <a href="dashboard.php">
                    <span class="material-symbols-rounded">dashboard</span>
                    <span class="menu-title">Dashboard</span>
                </a>
                <hr />
                <!-- Pencatatan -->
                <a href="catat-data/pengunjung.php">
                    <span class="material-symbols-rounded">person_edit</span>
                    <span class="menu-title">Catat Pengunjung</span>
                </a>
                <a href="catat-data/barang-internal.php">
                    <span class="material-symbols-rounded">note_alt</span>
                    <span class="menu-title">Catat Barang Internal</span>
                </a>
                <a href="catat-data/barang-eksternal.php">
                    <span class="material-symbols-rounded">edit_document</span>
                    <span class="menu-title">Catat Barang Eksternal</span>
                </a>
                <a href="catat-data/mobil.php">
                    <span class="material-symbols-rounded">edit_road</span>
                    <span class="menu-title">Catat Mobil</span>
                </a>
                <hr />
                <!-- Lihat laporan -->
                <a href="lihat-data/pengunjung.php">
                    <span class="material-symbols-rounded">group</span>
                    <span class="menu-title">Lihat Pengunjung</span>
                </a>
                <a href="lihat-data/barang-internal.php">
                    <span class="material-symbols-rounded"
                        >content_paste_search</span
                    >
                    <span class="menu-title">Lihat Barang Internal</span>
                </a>
                <a href="lihat-data/barang-eksternal.php">
                    <span class="material-symbols-rounded">description</span>
                    <span class="menu-title">Lihat Barang Eksternal</span>
                </a>
                <a href="lihat-data/mobil.php">
                    <span class="material-symbols-rounded">speed</span>
                    <span class="menu-title">Lihat Mobil</span>
                </a>
                <hr />
                <a href="pengumuman.php">
                    <span class="material-symbols-rounded">campaign</span>
                    <span class="menu-title">Pengumuman</span>
                </a>
            </aside>
            <div class="main">
                <!-- Navbar -->
                <nav class="navbar px-4 overflow-hidden">
                    <div class="logo d-flex gap-2 align-items-center">
                        <button
                            class="material-symbols-rounded bg-transparent border border-0 p-2"
                            id="menu-btn-mobile"
                            onclick="togglemenu()"
                        >
                            menu
                        </button>
                        <img src="/assets/images/logo.svg" alt="Logo TUKP" />
                        <span>TUKP Data Keeper</span>
                    </div>
                    <!-- button -->
                    <div class="d-flex gap-3 align-items-center">
                        <span class="material-symbols-rounded">
                            notifications
                        </span>
                        <span
                            class="material-symbols-rounded"
                            cursor-pointer
                            id="profile"
                            >account_circle</span
                        >
                    </div>
                    <!-- Tombol trigger (contoh) -->
                    <div class="container mt-5 text-end">
                        <button class="btn btn-primary">Profile</button>
                    </div>
                    <!-- Modal -->
                    <div
                        class="modal fade"
                        id="accountPopup"
                        tabindex="-1"
                        aria-hidden="true"
                        data-bs-backdrop="false"
                    >
                        <div class="modal-dialog modal-dialog-end-top">
                            <div
                                class="modal-content rounded-4 shadow"
                                style="width: 350px"
                            >
                                <div class="modal-header position-relative">
                                    <span
                                        class="fw-bold small position-absolute top-50 start-50 translate-middle"
                                    >
                                        <?php echo $_SESSION["nama_user"]; ?>
                                    </span>
                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                    ></button>
                                </div>

                                <div class="modal-body text-center">
                                    <!-- Avatar -->
                                    <div class="mb-3">
                                        <img
                                            src="https://img.icons8.com/ios-filled/50/user.png"
                                            alt="avatar"
                                            class="rounded-circle p-2 bg-light"
                                            width="70"
                                        />
                                    </div>
                                    <!-- Welcome -->
                                    <h5 class="fw-semibold">
                                        Halo,
                                        <?php echo $_SESSION["nama_user"]; ?>
                                    </h5>
                                    <!-- Action buttons -->
                                    <div
                                        class="d-flex justify-content-center gap-2 mt-3"
                                    >
                                        <a
                                            href="/pages/logout.php"
                                            class="btn btn-light d-flex align-items-center gap-2 px-3 rounded-pill"
                                        >
                                            <i class="bx bx-exit fs-4"></i>
                                            Keluar
                                        </a>
                                    </div>
                                </div>

                                <div class="modal-footer text-center d-block">
                                    <small class="text-muted"
                                        >©2025 - PT Taland Utama Karisma
                                        Perkasa</small
                                    >
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Custom CSS untuk pojok kanan atas -->
                    <style>
                        .modal-dialog.modal-dialog-end-top {
                            position: fixed;
                            top: 40px; /* jarak dari atas */
                            right: 30px; /* jarak dari kanan */
                            margin: 0;
                        }
                    </style>
                </nav>
                <main class="content p-4">
                    <!-- Formulir -->
                    <div class="card overflow-hidden" id="formulir">
                        <h5 class="card-header">Tambah Pengguna</h5>
                        <div class="card-body">
                            <form action="" method="post" id="form-pencatatan">
                                <div class="mb-3">
                                    <label
                                        for="tipe-pengguna"
                                        class="form-label"
                                        >Tipe Pengguna</label
                                    >
                                    <select
                                        class="form-select"
                                        aria-label="Default select example"
                                        id="tipe-pengguna"
                                    >
                                        <option selected>
                                            Pilih jenis pengguna
                                        </option>
                                        <option value="Admin">Admin</option>
                                        <option value="Security">
                                            Security
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label
                                        for="email-pengguna"
                                        class="form-label"
                                        >Id Pengguna</label
                                    >
                                    <input
                                        type="email"
                                        class="form-control"
                                        id="email-pengguna"
                                        placeholder=""
                                    />
                                </div>
                                <div class="mb-3">
                                    <label
                                        for="nama-pengguna"
                                        class="form-label"
                                        >Nama Pengguna</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="nama-pengguna"
                                        placeholder=""
                                    />
                                </div>
                                <div class="mb-3">
                                    <label
                                        for="sandi-pengguna"
                                        class="form-label"
                                        >Sandi</label
                                    >
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="sandi-pengguna"
                                        placeholder=""
                                    />
                                </div>
                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        value=""
                                        id="show-password"
                                    />
                                    <label
                                        class="form-check-label"
                                        for="show-password"
                                    >
                                        Tampilkan sandi
                                    </label>
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
                                            Tambah
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- List pengguna -->
                    <div id="list-pengguna">
                        <h2 class="mb-3 text-center">List Pengguna</h2>
                        <div
                            class="d-flex flex-wrap justify-content-center gap-3"
                        >
                            <div class="card" style="width: 300px">
                                <span class="material-symbols-rounded">
                                    account_circle
                                </span>
                                <div class="card-body">
                                    <h5 class="card-title text-center">
                                        Andika
                                    </h5>
                                    <h6
                                        class="card-subtitle mb-2 text-body-secondary text-center"
                                    >
                                        Admin
                                    </h6>
                                    <div class="row gap-2 mt-3">
                                        <button
                                            type="button"
                                            class="col btn btn-link"
                                        >
                                            Reset Sandi
                                        </button>
                                        <button
                                            type="button"
                                            class="col btn btn-outline-success"
                                        >
                                            Edit
                                        </button>
                                        <button
                                            type="button"
                                            class="col btn btn-danger"
                                        >
                                            Hapus
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="width: 300px">
                                <span class="material-symbols-rounded">
                                    account_circle
                                </span>
                                <div class="card-body">
                                    <h5 class="card-title text-center">
                                        Muhaimin Al Aziz Hasibuan
                                    </h5>
                                    <h6
                                        class="card-subtitle mb-2 text-body-secondary text-center"
                                    >
                                        Security
                                    </h6>
                                    <div class="row gap-2 mt-3">
                                        <button
                                            type="button"
                                            class="col btn btn-link"
                                        >
                                            Reset Sandi
                                        </button>
                                        <button
                                            type="button"
                                            class="col btn btn-outline-success"
                                        >
                                            Edit
                                        </button>
                                        <button
                                            type="button"
                                            class="col btn btn-danger"
                                        >
                                            Hapus
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="/assets/scripts/kelola_data.js"></script>
        <script src="/assets/scripts/navigation.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            muatDataBarangInternal(10);
        </script>
    </body>
</html>
