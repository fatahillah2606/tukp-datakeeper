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
                <a href="kelola-pengguna.php">
                    <span class="material-symbols-rounded"
                        >manage_accounts</span
                    >
                    <span class="menu-title">Kelola Pengguna</span>
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
                        <button
                            type="button"
                            class="btn btn-light"
                            data-bs-toggle="modal"
                            data-bs-target="#accountPopup1"
                        >
                            <span class="material-symbols-rounded" id="notif"
                                >notifications</span
                            >
                        </button>
                        <button
                            type="button"
                            class="btn btn-light"
                            data-bs-toggle="modal"
                            data-bs-target="#accountPopup"
                        >
                            <span class="material-symbols-rounded" id="profile"
                                >account_circle</span
                            >
                        </button>
                    </div>
                    <!-- Tombol trigger (contoh) -->
                    <div class="container mt-5 text-end">
                        <button class="btn btn-primary">Notifications</button>
                    </div>
                    <!-- Modal -->
                    <div
                        class="modal fade"
                        id="accountPopup1"
                        tabindex="-1"
                        aria-hidden="true"
                        data-bs-backdrop="false"
                    >
                        <div
                            class="modal-dialog modal-dialog-end-top notif-dialog"
                        >
                            <div
                                class="modal-content rounded-4 shadow"
                                style="width: 350px"
                            >
                                <div class="modal-header position-relative">
                                    <span
                                        class="fw-bold small position-absolute top-50 start-50 translate-middle"
                                    >
                                        Notifikasi
                                    </span>
                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                    ></button>
                                </div>

                                <div class="modal-body text-center">
                                    <!-- Welcome -->
                                    <h5 class="fw-semibold">
                                        Tidak Ada Notifikasi
                                    </h5>
                                    <!-- Action buttons -->
                                    <div
                                        class="d-flex justify-content-center gap-2 mt-3"
                                    ></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Custom CSS notifikasi untuk pojok kanan atas -->
                    <style>
                        .modal-dialog.modal-dialog-end-top.notif-dialog {
                            position: fixed;
                            top: 60px; /* jarak dari atas */
                            right: 100px; /* jarak dari kanan */
                            margin: 0;
                        }
                    </style>
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
                        <div
                            class="modal-dialog modal-dialog-end-top profile-dialog"
                        >
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
                                            href="/logout.php"
                                            class="btn btn-danger d-flex align-items-center gap-2 px-3 rounded-pill"
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

                    <!-- Custom CSS profile untuk pojok kanan atas -->
                    <style>
                        .modal-dialog.modal-dialog-end-top.profile-dialog {
                            position: fixed;
                            top: 60px; /* jarak dari atas */
                            right: 30px; /* jarak dari kanan */
                            margin: 0;
                        }
                    </style>
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
                                        name="nama_pembawa"
                                        placeholder=""
                                    />
                                </div>
                                <h5>Barang</h5>
                                <div id="form-container">
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
                                                name="nama_barang"
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
                                                name="jumlah_barang"
                                                placeholder=""
                                            />
                                        </div>
                                        <div class="col-2">
                                            <button
                                                class="btn btn-danger btn-hapus"
                                                type="button"
                                            >
                                                <span
                                                    class="material-symbols-rounded"
                                                >
                                                    delete
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <button
                                    type="button"
                                    class="btn btn-outline-success my-3"
                                    id="btn-tambah"
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
                                        name="tanggal"
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
                                        name="keterangan"
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
                                            onclick="simpan(event)"
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            // muatDataBarangInternal(10);
            let counter = 1;

            // Fungsi untuk bikin kolom baru
            function buatKolom(nomor) {
                const div = document.createElement("div");

                div.innerHTML = `
                    <div class="row align-items-end barang-row">
                        <div class="col">
                            <label
                                for="nama-barang-${nomor}"
                                class="form-label"
                                >Nama Barang</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="nama-barang-${nomor}"
                                name="nama_barang[]"
                                placeholder=""
                            />
                        </div>
                        <div class="col">
                            <label
                                for="jumlah-barang-${nomor}"
                                class="form-label"
                                >Jumlah Barang</label
                            >
                            <input
                                type="number"
                                class="form-control"
                                id="jumlah-barang-${nomor}"
                                name="jumlah_barang[]"
                                placeholder=""
                            />
                        </div>
                        <div class="col-2">
                            <button class="btn btn-danger btn-hapus" type="button">
                                <span
                                    class="material-symbols-rounded"
                                >
                                    delete
                                </span>
                            </button>
                        </div>
                    </div>
                `;

                return div;
            }

            // Event tambah
            document
                .getElementById("btn-tambah")
                .addEventListener("click", function () {
                    counter++;
                    const kolomBaru = buatKolom(counter);
                    document
                        .getElementById("form-container")
                        .appendChild(kolomBaru);
                });

            // Event hapus (delegasi ke parent)
            document
                .getElementById("form-container")
                .addEventListener("click", function (e) {
                    if (e.target.closest(".btn-hapus")) {
                        e.target.closest(".align-items-end").remove();
                    }
                });

            // Simpan data ke database
            function simpan(event) {
                event.preventDefault();

                const elmForm = document.getElementById("form-pencatatan");
                const dataForm = new FormData(elmForm);
                dataForm.append("kirim_data_barang_internal", true);

                // for (const [name, value] of dataForm) {
                //     console.log(`${name}: ${value}`);
                // }

                fetch("/backend/kelola_data.php", {
                    method: "POST",
                    body: dataForm,
                })
                    .then(async (respon) => {
                        const data = await respon.json();
                        console.log(data);
                        if (!respon.ok) {
                            throw new Error(
                                data.message || "Terjadi kesalahan"
                            );
                        }
                        return data;
                    })
                    .then((data) => {
                        alert(data.message);
                    })
                    .catch((error) => {
                        console.error(error);
                    });
            }
        </script>
    </body>
</html>
