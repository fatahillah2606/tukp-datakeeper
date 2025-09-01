<?php
// cek sesi 
session_start();
if (isset($_SESSION["role"])) {

    // Pindah user ke halaman login
    header("Location: /pages/dashboard-tamu.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login</title>

        <!-- Style CSS -->
        <link
            rel="stylesheet"
            href="assets/bootstrap-5.3.5-dist/css/bootstrap.min.css"
        />
        <link rel="stylesheet" href="assets/style/login.css" />
    </head>
    <body>
        <!-- Kolom Login -->
        <div class="card">
            <!-- Logo dan Nama Perusahaan -->
            <div class="card-header d-flex align-items-center">
                <img
                    src="assets/images/logo.svg"
                    alt="Logo Taland Utama Karisma Perkasa"
                    class="me-2"
                />
                <p class="h2">PT Taland Utama Karisma Perkasa</p>
            </div>
            <div class="card-body">
                <!-- Form Login -->
                <form action="" method="post" id="login" name="login">
                    <p class="h3">Login</p>

                    <!-- Opsi Pilih Role -->
                    <select
                        class="form-select mb-3"
                        aria-label="Jenis Pengguna"
                        name="pengguna"
                        id="role"
                    >
                        <option value="Admin">Admin</option>
                        <option value="Security">Security</option>
                        <option value="Tamu"selected>Tamu</option>
                    </select>

                    <!-- Kolom email pengguna -->
                    <div class="mb-3">
                        <label for="token" class="form-label"
                            >Token</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            id="token"
                            placeholder="XXX-XXX-XXX-XXX"
                            name="token"
                            required
                        />
                    </div>

                    <!-- Tombol -->
                    <div class="btn-grup">
                        <button
                            type="submit"
                            class="btn btn-success"
                            onclick="TamuLogin(event)"
                        >
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Script Js -->
        <script src="assets/scripts/login.js"></script>
        <script src="assets/bootstrap-5.3.5-dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
