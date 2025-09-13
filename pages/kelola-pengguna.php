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
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php"; ?>
            <div class="main">
                <!-- Bagian Navbar -->
                <?php include $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php"; ?>
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
                                    <label for="id-pengguna" class="form-label"
                                        >Id Pengguna</label
                                    >
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="id-pengguna"
                                        placeholder=""
                                        maxlength="4"
                                        required
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
                                        maxlength="25"
                                        required
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
                                        maxlength="60"
                                        required
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
                    <div id="list-pengguna" class="mb-5">
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
                                            class="col btn btn-primary"
                                            title="Reset"
                                        >
                                            <span
                                                class="material-symbols-rounded fs-3"
                                                >history</span
                                            >
                                        </button>
                                        <button
                                            type="button"
                                            class="col btn btn-success"
                                            title="Edit"
                                        >
                                            <span
                                                class="material-symbols-rounded fs-3"
                                                >edit</span
                                            >
                                        </button>
                                        <button
                                            type="button"
                                            class="col btn btn-danger"
                                            title="Hapus"
                                        >
                                            <span
                                                class="material-symbols-rounded fs-3"
                                                >delete</span
                                            >
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
                                            class="col btn btn-primary"
                                            title="Reset"
                                        >
                                            <span
                                                class="material-symbols-rounded fs-3"
                                                >history</span
                                            >
                                        </button>
                                        <button
                                            type="button"
                                            class="col btn btn-success"
                                            title="Edit"
                                        >
                                            <span
                                                class="material-symbols-rounded fs-3"
                                                >edit</span
                                            >
                                        </button>
                                        <button
                                            type="button"
                                            class="col btn btn-danger"
                                            title="Hapus"
                                        >
                                            <span
                                                class="material-symbols-rounded fs-3"
                                                >delete</span
                                            >
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
            muatDataPengguna();
        </script>
    </body>
</html>
