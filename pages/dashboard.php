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
    </head>
    <body>
        <div class="layout default">
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
                            id="profile"
                            data-bs-toggle="modal"
                            data-bs-target="#accountPopup"
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
                    >
                        <div class="modal-dialog modal-dialog-end">
                            <div class="modal-content rounded-4 shadow">
                                <div class="modal-header position-relative">
                                    <!-- Teks di tengah -->
                                    <span
                                        class="fw-bold small position-absolute top-50 start-50 translate-middle"
                                    >
                                        muhaimin@admin
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
                                        Halo, Muhaimin Al Aziz
                                    </h5>

                                    <!-- Kelola akun -->
                                    <button
                                        class="btn btn-outline-dark btn-sm mt-2 rounded-pill"
                                    >
                                        Kelola akun anda
                                    </button>

                                    <!-- Action buttons (Sampingan) -->
                                    <div
                                        class="d-flex justify-content-center gap-2 mt-3"
                                    >
                                        <a
                                            href="/html/account.html"
                                            class="btn btn-light d-flex align-items-center gap-2 px-3 rounded-pill"
                                        >
                                            <i class="bx bx-user-plus fs-4"></i>
                                            Kelola Pengguna
                                        </a>
                                        <a
                                            href="/html/login.html"
                                            class="btn btn-light d-flex align-items-center gap-2 px-3 rounded-pill"
                                        >
                                            <i class="bx bx-exit fs-4"></i>
                                            Keluar
                                        </a>
                                    </div>
                                </div>
                                <div class="modal-footer text-center d-block">
                                    <small class="text-muted"
                                        >©2025 - CV Taketaka Machinery
                                        Sejahtera</small
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <main class="content p-4">
                    <h1 class="display-2 mb-5 ms-3">
                        Selamat Datang,
                        <?php echo $_SESSION["nama_user"]; ?>
                    </h1>

                    <!-- Pengumuman -->
                    <div class="alert alert-success" role="alert">
                        <h1 class="fs-3">Pengumuman</h1>
                        <p>Token Untuk Login Tanggal 01 Juli 2025 : JL1225</p>
                    </div>

                    <!-- Tabel -->
                    <div class="tabel p-4 rounded-4">
                        <div class="tabel-head">
                            <h3>Data Barang Internal</h3>

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
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Pembawa</th>
                                    <th scope="col">Nama dan Jumlah Barang</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider" id="isi-tabel">
                                <tr>
                                    <td cols>Driver_51</td>
                                    <td><li>Minyak, 500</li></td>
                                    <td>2025-03-12</td>
                                    <td>Barang diterima dalam kondisi baik</td>
                                    <td class="action-btn">
                                        <button class="btn btn-success">
                                            <span
                                                class="material-symbols-rounded"
                                            >
                                                edit
                                            </span>
                                        </button>
                                        <button class="btn btn-danger">
                                            <span
                                                class="material-symbols-rounded"
                                            >
                                                delete
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </main>
            </div>
        </div>
        <script src="/assets/scripts/kelola_data.js"></script>
        <script src="/assets/scripts/navigation.js"></script>
        <script>
            muatDataBarangInternal(10);
        </script>
    </body>
</html>
