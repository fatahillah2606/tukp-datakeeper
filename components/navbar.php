<!-- Navbar -->
<?php if ($_SESSION["role"] !== "Tamu") { ?>
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
        <div class="modal-dialog modal-dialog-end-top notif-dialog">
            <div class="modal-content rounded-4 shadow" style="width: 350px">
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
                    <h5 class="fw-semibold">Tidak Ada Notifikasi</h5>
                    <!-- Action buttons -->
                    <div class="d-flex justify-content-center gap-2 mt-3"></div>
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
        <div class="modal-dialog modal-dialog-end-top profile-dialog">
            <div class="modal-content rounded-4 shadow" style="width: 350px">
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
                    <div class="d-flex justify-content-center gap-2 mt-3">
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
                        >©2025 - PT Taland Utama Karisma Perkasa</small
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
<?php } ?>